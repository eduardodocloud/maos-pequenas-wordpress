<?php
/**
 * Importador PHP de artigos do blog
 *
 * Lê data/articles.json e cria os posts via wp_insert_post() — método mais
 * confiável que WP-CLI com STDIN (que tem bugs em algumas versões).
 *
 * Uso:
 *   php import-artigos.php /caminho/do/wordpress
 *
 * Ou via WP-CLI:
 *   wp eval-file import-artigos.php
 */

// Localiza WordPress
$wp_path = $argv[1] ?? getenv('HOME') . '/Sites/larmaospequenas';
if (!file_exists($wp_path . '/wp-load.php')) {
    fwrite(STDERR, "❌ WordPress não encontrado em: $wp_path\n");
    fwrite(STDERR, "   Uso: php import-artigos.php /caminho/do/wordpress\n");
    exit(1);
}

// Boot WordPress
define('WP_USE_THEMES', false);
require_once $wp_path . '/wp-load.php';

// Lê JSON
$json_path = __DIR__ . '/data/articles.json';
if (!file_exists($json_path)) {
    fwrite(STDERR, "❌ data/articles.json não encontrado\n");
    exit(1);
}
$articles = json_decode(file_get_contents($json_path), true);
$total    = count($articles);

echo "📚 Importando $total artigos do blog...\n";
echo "   WordPress: $wp_path\n\n";

// Cria categorias se não existirem
$cats_map = [];
foreach (['Acolhimento','Adoção','Como Ajudar','Desenvolvimento Infantil','Direitos','Notícias'] as $cat_name) {
    $existing = get_term_by('name', $cat_name, 'category');
    if ($existing) {
        $cats_map[$cat_name] = $existing->term_id;
    } else {
        $new = wp_insert_term($cat_name, 'category');
        if (!is_wp_error($new)) {
            $cats_map[$cat_name] = $new['term_id'];
        }
    }
}

// Apaga posts antigos (limpa para reimportar)
$existing_posts = get_posts(['post_type' => 'post', 'posts_per_page' => -1, 'post_status' => 'any', 'fields' => 'ids']);
echo "🧹 Removendo " . count($existing_posts) . " posts antigos...\n";
foreach ($existing_posts as $pid) {
    wp_delete_post($pid, true);
}
echo "\n";

// Helper para importar imagem como anexo
function mp_import_attachment($file_path, $post_id, $title = '') {
    if (!file_exists($file_path)) return null;
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $upload = wp_upload_dir();
    $base = sanitize_file_name(basename($file_path));
    $target = trailingslashit($upload['path']) . wp_unique_filename($upload['path'], $base);
    if (!copy($file_path, $target)) return null;

    $wp_filetype = wp_check_filetype($target, null);
    $attach_id = wp_insert_attachment([
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => $title ?: pathinfo($base, PATHINFO_FILENAME),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ], $target, $post_id);
    if (is_wp_error($attach_id) || !$attach_id) return null;

    $metadata = wp_generate_attachment_metadata($attach_id, $target);
    wp_update_attachment_metadata($attach_id, $metadata);
    return $attach_id;
}

$img_source_dir = __DIR__ . '/data/article-images';

// Importa
$ok = 0;
foreach ($articles as $i => $a) {
    $idx = $i + 1;
    $title_short = mb_substr($a['title'], 0, 60);
    printf("  [%2d/%d] %s — %s\n", $idx, $total, substr($a['date'], 0, 10), $title_short);

    $post_id = wp_insert_post([
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'post_title'     => $a['title'],
        'post_excerpt'   => $a['excerpt'],
        'post_content'   => $a['content'],   // placeholder, atualizado depois com URLs de imagem
        'post_date'      => $a['date'],
        'post_date_gmt'  => get_gmt_from_date($a['date']),
        'post_author'    => 1,
    ], true);

    if (is_wp_error($post_id)) {
        echo "      ⚠️  erro: " . $post_id->get_error_message() . "\n";
        continue;
    }

    // Categoria
    if (isset($cats_map[$a['category']])) {
        wp_set_post_terms($post_id, [$cats_map[$a['category']]], 'category');
    }

    // Importa imagens, define featured e substitui marcadores no content
    if (!empty($a['images'])) {
        $content = $a['content'];
        $first_attach_id = null;
        foreach ($a['images'] as $img_name) {
            $img_path = $img_source_dir . '/' . $img_name;
            if (!file_exists($img_path)) continue;

            $attach_id = mp_import_attachment($img_path, $post_id, $a['title']);
            if (!$attach_id) continue;

            if (!$first_attach_id) $first_attach_id = $attach_id;

            $url = wp_get_attachment_url($attach_id);
            $img_html = '<figure class="wp-block-image size-large"><img src="' .
                        esc_url($url) . '" alt="' . esc_attr($a['title']) .
                        '" loading="lazy" /></figure>';

            // Substitui o primeiro marcador correspondente
            $content = preg_replace(
                '/<!--ARTICLE_IMG:' . preg_quote($img_name, '/') . '-->/',
                $img_html, $content, 1
            );
        }

        // Atualiza content com imagens inline
        wp_update_post(['ID' => $post_id, 'post_content' => $content]);

        // Featured image = primeira imagem
        if ($first_attach_id) {
            set_post_thumbnail($post_id, $first_attach_id);
        }

        echo "         📷 " . count($a['images']) . " imagem(ns) importada(s)\n";
    } else {
        // Remove qualquer marcador residual
        $clean = preg_replace('/<!--ARTICLE_IMG:[^>]+-->/', '', $a['content']);
        if ($clean !== $a['content']) {
            wp_update_post(['ID' => $post_id, 'post_content' => $clean]);
        }
    }

    $ok++;
}

echo "\n✅ $ok/$total artigos importados\n";

// Verifica
$post_count = wp_count_posts('post');
echo "📊 Total no banco: " . $post_count->publish . " posts publicados\n";

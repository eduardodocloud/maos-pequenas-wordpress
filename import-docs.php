<?php
// Importa PDFs/docs de transparência do Desktop/site/ para o WP
$wp_path = '/Users/comunicacaoencantada/Sites/larmaospequenas';
define('WP_USE_THEMES', false);
require_once $wp_path . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$docs_dir = $_SERVER['HOME'] . '/Desktop/site';

// Mapa: caminho-relativo|slug|título
$docs_map = [
    "Estatuto Atual_Novo Endereço.pdf|estatuto-social|Estatuto Social",
    "Ata Atual_Diretoria (2).pdf|ata-diretoria|Ata da Diretoria",
    "Balancetes/Mãos Pequenas - Demonstrações Contábeis Completas (BP-DR-DMPL-FC-NE) 2018.pdf|balancete-2018|Demonstrações Contábeis 2018",
    "Balancetes/Mãos Pequenas - Peças Contábeis - BP-DRE-DMPL-DFI-NE - 2017.pdf|balancete-2017|Peças Contábeis 2017",
    "Balancetes/037 - Lar Assistencial Mãos Pequenas - Demonstrações Contábeis (Notas Explicativas) 2016.pdf|balancete-2016|Demonstrações Contábeis 2016",
    "Balancetes/039 - Demonstrações Contabeis Completas 2015.doc|balancete-2015|Demonstrações Contábeis 2015",
    "Balancetes/039 - Demonstrações Contábeis (BP-DR-DMPL-FC) 2014-2013.xlsx|balancete-2014|Demonstrações Contábeis 2014-2013",
    "Balancetes/039 -Lar Mão Pequenas - Demonstracoes contabeis 2013 - 2012.pdf|balancete-2013|Demonstrações Contábeis 2013-2012",
    "Balancetes/Lar Ass Mãos Pequenas - NOTAS EXPLICATIVAS ÀS DEMONSTRAÇÕES CONTÁBEIS EM 31-12-2012.doc|balancete-2012|Notas Explicativas 2012",
    "Balancetes/Lar Mãos Pequenas - Demonstrações Financeiras 2012 Comparativo 2011.xlsx|balancete-2011|Demonstrações Financeiras 2012-2011",
];

echo "📎 Importando documentos de transparência...\n\n";
$ok = 0;
foreach ($docs_map as $entry) {
    [$rel, $slug, $title] = explode('|', $entry);
    $file = $docs_dir . '/' . $rel;
    if (!file_exists($file)) {
        echo "  ⚠️  $slug — arquivo não encontrado\n";
        continue;
    }
    // Já existe?
    $existing = get_page_by_path($slug, OBJECT, 'attachment');
    if ($existing) {
        echo "  ↻  $slug — já existe (id={$existing->ID})\n";
        $ok++;
        continue;
    }

    // Copia para uploads
    $upload = wp_upload_dir();
    $base = sanitize_file_name(basename($file));
    $target = trailingslashit($upload['path']) . wp_unique_filename($upload['path'], $base);
    copy($file, $target);

    $mime = wp_check_filetype($target, null)['type'];
    $attach_id = wp_insert_attachment([
        'post_mime_type' => $mime,
        'post_title'     => $title,
        'post_content'   => '',
        'post_status'    => 'inherit',
        'post_name'      => $slug,
    ], $target);

    if (is_wp_error($attach_id)) {
        echo "  ❌ $slug — erro: " . $attach_id->get_error_message() . "\n";
        continue;
    }

    $meta = wp_generate_attachment_metadata($attach_id, $target);
    wp_update_attachment_metadata($attach_id, $meta);
    echo "  ✅ $slug — importado (id=$attach_id)\n";
    $ok++;
}

echo "\n✅ $ok docs disponíveis\n";

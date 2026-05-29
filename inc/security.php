<?php
/**
 * Hardening de segurança e produção
 * Incluído via functions.php
 */

// 1. Remove versão WP do <head> e do feed (footprint para ataques)
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');

// 2. Remove RSD link, wlw manifest (raramente usados)
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// 3. Remove emoji bloat
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// 4. Headers de segurança (apenas no front, evita conflito com admin)
add_action('send_headers', function () {
    if (is_admin()) return;
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
});

// 5. Desabilita XML-RPC (vetor comum de ataques de força bruta)
add_filter('xmlrpc_enabled', '__return_false');
add_filter('wp_headers', function ($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});

// 6. Esconder erros de login (não revelar se usuário existe)
add_filter('login_errors', function () {
    return 'Credenciais inválidas. Tente novamente.';
});

// 7. Desabilitar enumeração de usuários via REST API (público)
add_filter('rest_endpoints', function ($endpoints) {
    if (!is_user_logged_in()) {
        unset($endpoints['/wp/v2/users']);
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});

// 8. Bloquear ?author=N (também usado para enumerar usuários)
add_action('template_redirect', function () {
    if (!is_admin() && isset($_GET['author']) && (int) $_GET['author'] > 0) {
        wp_redirect(home_url('/'), 301);
        exit;
    }
});

// 9. Lazy-loading nativo em todas as imagens (perf)
add_filter('wp_lazy_loading_enabled', '__return_true');

// 10. Defer scripts do front-end (não-críticos)
add_filter('script_loader_tag', function ($tag, $handle) {
    if (is_admin() || in_array($handle, ['jquery-core','jquery-migrate'])) return $tag;
    if (strpos($tag, 'defer') === false && strpos($tag, ' src=') !== false) {
        $tag = str_replace(' src=', ' defer src=', $tag);
    }
    return $tag;
}, 10, 2);

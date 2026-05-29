<?php
/**
 * Funções do tema Mãos Pequenas
 */

// Hardening de segurança + perf (produção)
require_once get_theme_file_path('inc/security.php');

// Configurações básicas do tema
function mp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption']);
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('customize-selective-refresh-widgets');
    add_image_size('mp-hero', 920, 620, true);
    add_image_size('mp-card', 600, 400, true);
    add_image_size('mp-thumb', 400, 300, true);

    register_nav_menus([
        'primary' => 'Menu Principal',
        'footer'  => 'Menu Rodapé',
    ]);
}
add_action('after_setup_theme', 'mp_setup');

// Carregar assets
function mp_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style('mp-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Open+Sans:wght@400;600&display=swap',
        [], null
    );
    // CSS principal
    wp_enqueue_style('mp-style', get_stylesheet_uri(), ['mp-fonts'], '1.0.0');
    wp_enqueue_style('mp-main',  get_theme_file_uri('assets/css/main.css'), ['mp-style'], '1.0.0');
    // JS
    wp_enqueue_script('mp-main', get_theme_file_uri('assets/js/main.js'), [], '1.0.0', true);
    wp_localize_script('mp-main', 'mpData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('mp_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'mp_enqueue_assets');

// Widgets
function mp_widgets_init() {
    register_sidebar([
        'name'          => 'Sidebar Blog',
        'id'            => 'sidebar-blog',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
    register_sidebar([
        'name'          => 'Rodapé — Coluna 4',
        'id'            => 'footer-4',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'mp_widgets_init');

// Configurações do tema via Customizer
function mp_customizer($wp_customize) {
    $wp_customize->add_section('mp_opcoes', [
        'title'    => 'Mãos Pequenas — Configurações',
        'priority' => 30,
    ]);

    $campos = [
        'mp_whatsapp'      => ['WhatsApp principal', '(11) 4047-2289'],
        'mp_tel_1'         => ['Telefone 1', '(11) 4047-2167'],
        'mp_tel_2'         => ['Telefone 2', '(11) 4047-2289'],
        'mp_fax'           => ['Fax', '(11) 4049-6305'],
        'mp_tel_3'         => ['Telefone 3', '(11) 4059-6973'],
        'mp_email'         => ['E-mail', 'larmaospequenas@gmail.com'],
        'mp_instagram'     => ['Instagram URL', 'https://instagram.com/larmaospequenas'],
        'mp_facebook'      => ['Facebook URL', ''],
        'mp_youtube'       => ['YouTube URL', ''],
        'mp_cnpj'          => ['CNPJ', '07.679.226/0001-00'],
        'mp_util_publica'  => ['Utilidade Pública Municipal', '2877/09'],
        'mp_endereco'      => ['Endereço', 'Estrada Nova Ipê, 440 — Condomínio Praia Vermelha — Diadema/SP'],
        'mp_horario'       => ['Horário de Atendimento', 'Segunda à sexta-feira, das 9h às 17h'],
        'mp_doare_url'     => ['URL Plataforma Doare', 'https://doare.org/'],
        'mp_hero_titulo_1' => ['Banner 1 — Título', 'Um pequeno gesto pode fazer uma <span>grande diferença</span>'],
        'mp_hero_texto_1'  => ['Banner 1 — Subtítulo', 'Faça sua doação e ajude a transformar a vida de crianças e adolescentes acolhidos no Lar Mãos Pequenas.'],
        'mp_hero_titulo_2' => ['Banner 2 — Título', 'Há 20 anos levando esperança para <span>crianças e adolescentes</span>'],
        'mp_hero_texto_2'  => ['Banner 2 — Subtítulo', 'O Lar Assistencial Mãos Pequenas é um espaço de acolhimento, afeto e dignidade em Diadema/SP.'],
    ];

    foreach ($campos as $id => [$label, $default]) {
        $type = (strpos($id, '_texto') !== false || strpos($id, '_titulo') !== false) ? 'textarea' : 'text';
        $wp_customize->add_setting($id, ['default' => $default, 'sanitize_callback' => 'wp_kses_post']);
        $wp_customize->add_control($id, ['label' => $label, 'section' => 'mp_opcoes', 'type' => $type]);
    }
}

// Handler do formulário de voluntário
function mp_handle_voluntario() {
    check_ajax_referer('mp_nonce', 'nonce');

    $fields = [
        'nome'        => sanitize_text_field($_POST['nome']        ?? ''),
        'rg'          => sanitize_text_field($_POST['rg']          ?? ''),
        'endereco'    => sanitize_text_field($_POST['endereco']    ?? ''),
        'bairro'      => sanitize_text_field($_POST['bairro']      ?? ''),
        'cep'         => sanitize_text_field($_POST['cep']         ?? ''),
        'telefone'    => sanitize_text_field($_POST['telefone']    ?? ''),
        'celular'     => sanitize_text_field($_POST['celular']     ?? ''),
        'email'       => sanitize_email($_POST['email']           ?? ''),
        'profissao'   => sanitize_text_field($_POST['profissao']   ?? ''),
        'experiencia' => sanitize_text_field($_POST['experiencia'] ?? ''),
        'onde'        => sanitize_text_field($_POST['onde']        ?? ''),
        'area'        => sanitize_text_field($_POST['area']        ?? ''),
        'dispon'      => sanitize_textarea_field($_POST['dispon']  ?? ''),
        'fds'         => sanitize_text_field($_POST['fds']         ?? ''),
    ];

    if (!$fields['nome'] || !$fields['email'] || !$fields['celular']) {
        wp_send_json_error('Por favor, preencha nome, e-mail e celular.');
    }

    $to      = mp_opt('mp_email', 'larmaospequenas@gmail.com');
    $subject = "[Voluntário] {$fields['nome']}";
    $body    = "Novo cadastro de voluntário:\n\n";
    foreach ($fields as $k => $v) { $body .= ucfirst($k) . ": $v\n"; }
    $headers = ["Content-Type: text/plain; charset=UTF-8", "Reply-To: {$fields['nome']} <{$fields['email']}>"];

    $sent = wp_mail($to, $subject, $body, $headers);
    $sent ? wp_send_json_success('Cadastro enviado! Em breve entraremos em contato.') : wp_send_json_error('Erro ao enviar.');
}
add_action('wp_ajax_mp_voluntario',        'mp_handle_voluntario');
add_action('wp_ajax_nopriv_mp_voluntario', 'mp_handle_voluntario');

// Handler do formulário de parceiro
function mp_handle_parceiro() {
    check_ajax_referer('mp_nonce', 'nonce');

    $fields = [
        'nome'      => sanitize_text_field($_POST['nome']     ?? ''),
        'empresa'   => sanitize_text_field($_POST['empresa']  ?? ''),
        'cnpj'      => sanitize_text_field($_POST['cnpj']     ?? ''),
        'endereco'  => sanitize_text_field($_POST['endereco'] ?? ''),
        'celular'   => sanitize_text_field($_POST['celular']  ?? ''),
        'email'     => sanitize_email($_POST['email']         ?? ''),
        'tipo'      => sanitize_text_field($_POST['tipo']     ?? ''),
    ];

    if (!$fields['nome'] || !$fields['empresa'] || !$fields['email'] || !$fields['celular']) {
        wp_send_json_error('Preencha nome, empresa, e-mail e celular.');
    }

    $to      = mp_opt('mp_email', 'larmaospequenas@gmail.com');
    $subject = "[Parceria] {$fields['empresa']}";
    $body    = "Nova proposta de parceria:\n\n";
    foreach ($fields as $k => $v) { $body .= ucfirst($k) . ": $v\n"; }
    $headers = ["Content-Type: text/plain; charset=UTF-8", "Reply-To: {$fields['nome']} <{$fields['email']}>"];

    $sent = wp_mail($to, $subject, $body, $headers);
    $sent ? wp_send_json_success('Proposta enviada! Em breve entraremos em contato.') : wp_send_json_error('Erro ao enviar.');
}
add_action('wp_ajax_mp_parceiro',        'mp_handle_parceiro');
add_action('wp_ajax_nopriv_mp_parceiro', 'mp_handle_parceiro');
add_action('customize_register', 'mp_customizer');

// Helper: pega opção do customizer
function mp_opt($key, $default = '') {
    return get_theme_mod($key, $default);
}

// Processar formulário de contato via AJAX
function mp_handle_contact() {
    check_ajax_referer('mp_nonce', 'nonce');

    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $assunto = sanitize_text_field($_POST['assunto'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        wp_send_json_error('Por favor, preencha todos os campos obrigatórios.');
    }

    $to      = mp_opt('mp_email', 'larmaospequenas@gmail.com');
    $subject = "[$assunto] Contato via site — $name";
    $body    = "Nome: $name\nE-mail: $email\nAssunto: $assunto\n\nMensagem:\n$message";
    $headers = ["Content-Type: text/plain; charset=UTF-8", "Reply-To: $name <$email>"];

    $sent = wp_mail($to, $subject, $body, $headers);
    $sent ? wp_send_json_success('Mensagem enviada com sucesso!') : wp_send_json_error('Erro ao enviar mensagem.');
}
add_action('wp_ajax_mp_contact',        'mp_handle_contact');
add_action('wp_ajax_nopriv_mp_contact', 'mp_handle_contact');

// Post type: Depoimentos
function mp_register_testimonials() {
    register_post_type('depoimento', [
        'labels'              => ['name' => 'Depoimentos', 'singular_name' => 'Depoimento'],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'supports'            => ['title', 'editor', 'thumbnail'],
        'menu_icon'           => 'dashicons-format-quote',
        'show_in_rest'        => true,
    ]);
    // Meta: papel/função
    register_post_meta('depoimento', '_mp_role', [
        'show_in_rest' => true, 'single' => true, 'type' => 'string',
    ]);
}
add_action('init', 'mp_register_testimonials');

// Remover barra admin no front-end
add_filter('show_admin_bar', fn($show) => current_user_can('administrator') ? $show : false);

// Excerpt personalizado
function mp_excerpt_length($length) { return 22; }
function mp_excerpt_more($more) { return '…'; }
add_filter('excerpt_length', 'mp_excerpt_length', 999);
add_filter('excerpt_more',   'mp_excerpt_more');

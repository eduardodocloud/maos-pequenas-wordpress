<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
  <div class="container">
    <div class="header-inner">

      <!-- Logo -->
      <?php if (has_custom_logo()) :
        // the_custom_logo() já gera seu próprio <a> com classe .custom-logo-link
        the_custom_logo();
      else : ?>
        <a href="<?= esc_url(home_url('/')); ?>" class="site-logo">
          <img src="<?= esc_url(get_theme_file_uri('assets/images/logo.jpg')); ?>"
               alt="Lar Assistencial Mãos Pequenas"
               class="site-logo-img"
               width="220" height="83">
        </a>
      <?php endif; ?>

      <!-- Navegação (estrutura do briefing) -->
      <nav class="main-nav" id="main-nav" aria-label="Menu principal">
        <a href="<?= home_url('/'); ?>">Home</a>
        <a href="<?= home_url('/quem-somos/'); ?>">Quem Somos</a>
        <a href="<?= home_url('/doacoes/'); ?>">Doações</a>
        <a href="<?= home_url('/seja-voluntario/'); ?>">Seja Voluntário</a>
        <a href="<?= home_url('/parceiros/'); ?>">Parceiros</a>
        <a href="<?= home_url('/transparencia/'); ?>">Transparência</a>
        <a href="<?= home_url('/blog/'); ?>">Blog</a>
        <a href="<?= home_url('/doacoes/'); ?>" class="nav-cta">❤️ Seja um Doador</a>
      </nav>

      <!-- Hambúrguer mobile -->
      <button class="hamburger" id="hamburger" aria-label="Abrir menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>

    </div><!-- .header-inner -->
  </div><!-- .container -->
</header>

<?php get_header(); ?>

<?php while (have_posts()) : the_post();
  $cats     = get_the_category();
  $cat_name = $cats ? $cats[0]->name : '';
  $cat_link = $cats ? get_category_link($cats[0]->term_id) : '';
?>

<div class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?= esc_url(home_url('/')); ?>">Início</a> ›
      <a href="<?= esc_url(home_url('/blog/')); ?>">Blog</a>
      <?php if ($cat_name) : ?> › <a href="<?= esc_url($cat_link); ?>"><?= esc_html($cat_name); ?></a><?php endif; ?>
    </div>
    <h1><?php the_title(); ?></h1>
    <p style="opacity:0.85;font-size:0.95rem;margin-top:8px">
      📅 Publicado em <?php echo esc_html(get_the_date('d/m/Y')); ?>
    </p>
  </div>
</div>

<section class="section">
  <div class="container" style="max-width:820px">

    <!-- IMAGEM (estrutura padrão: Título → Imagem → Texto) -->
    <?php if (has_post_thumbnail()) : ?>
      <figure class="single-featured">
        <?php the_post_thumbnail('large', ['style' => 'width:100%;height:auto;display:block']); ?>
      </figure>
    <?php else : ?>
      <!-- Placeholder elegante com logo + categoria -->
      <div class="single-featured single-featured-placeholder" aria-hidden="true">
        <div class="single-featured-placeholder-inner">
          <img src="<?= esc_url(get_theme_file_uri('assets/images/logo-vertical-web.jpg')); ?>"
               alt="" loading="lazy">
          <?php if ($cat_name) : ?>
            <span class="single-featured-cat"><?= esc_html($cat_name); ?></span>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- TEXTO -->
    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <!-- Navegação entre posts + voltar -->
    <div class="single-nav">
      <a href="<?= esc_url(home_url('/blog/')); ?>" class="btn btn-outline">← Voltar para o Blog</a>
      <?php
      $prev = get_previous_post();
      $next = get_next_post();
      if ($prev) : ?>
        <a href="<?= esc_url(get_permalink($prev)); ?>" class="single-nav-link">
          <small>← Anterior</small>
          <strong><?= esc_html(wp_trim_words(get_the_title($prev), 8)); ?></strong>
        </a>
      <?php endif; ?>
      <?php if ($next) : ?>
        <a href="<?= esc_url(get_permalink($next)); ?>" class="single-nav-link is-right">
          <small>Próximo →</small>
          <strong><?= esc_html(wp_trim_words(get_the_title($next), 8)); ?></strong>
        </a>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>

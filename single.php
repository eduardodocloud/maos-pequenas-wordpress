<?php get_header(); ?>

<div class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?= home_url(); ?>">Início</a> ›
      <a href="<?= home_url('/blog/'); ?>">Blog</a> ›
      <?php the_title(); ?>
    </div>
    <h1><?php the_title(); ?></h1>
    <p style="opacity:0.8">Publicado em <?php the_date('d/m/Y'); ?> <?php the_author_posts_link(); ?></p>
  </div>
</div>

<section class="section">
  <div class="container" style="max-width:800px">
    <?php if (have_posts()) : while (have_posts()) : the_post();
      // Mostra featured SÓ se o conteúdo NÃO já contém qualquer imagem (evita duplicar)
      $has_inline_img = (bool) preg_match('/<(img|figure)\b/i', get_the_content());
      if (has_post_thumbnail() && !$has_inline_img) : ?>
      <div style="margin-bottom:36px;border-radius:var(--radius);overflow:hidden">
        <?php the_post_thumbnail('large', ['style'=>'width:100%;height:auto']); ?>
      </div>
    <?php endif; ?>
      <div class="entry-content" style="color:var(--texto-med);line-height:1.9;font-size:1.05rem">
        <?php the_content(); ?>
      </div>
      <div style="margin-top:40px;padding-top:24px;border-top:1px solid #E2E8F0;display:flex;gap:12px;flex-wrap:wrap">
        <?php the_tags('<span style="font-size:0.85rem;color:var(--cinza)">Tags:</span> ','',  ''); ?>
      </div>
    <?php endwhile; endif; ?>

    <div style="margin-top:48px">
      <a href="<?= home_url('/blog/'); ?>" class="btn btn-outline">← Voltar para o Blog</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>

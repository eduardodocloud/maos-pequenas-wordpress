<?php get_header(); ?>

<div class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?= home_url(); ?>">Início</a> ›
      <a href="<?= home_url('/blog/'); ?>">Notícias</a> ›
      <?php the_title(); ?>
    </div>
    <h1><?php the_title(); ?></h1>
    <p style="opacity:0.8">Publicado em <?php the_date('d/m/Y'); ?> <?php the_author_posts_link(); ?></p>
  </div>
</div>

<section class="section">
  <div class="container" style="max-width:800px">
    <?php if (has_post_thumbnail()) : ?>
      <div style="margin-bottom:36px;border-radius:var(--radius);overflow:hidden">
        <?php the_post_thumbnail('large', ['style'=>'width:100%;height:auto']); ?>
      </div>
    <?php endif; ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="entry-content" style="color:var(--texto-med);line-height:1.9;font-size:1.05rem">
        <?php the_content(); ?>
      </div>
      <div style="margin-top:40px;padding-top:24px;border-top:1px solid #E2E8F0;display:flex;gap:12px;flex-wrap:wrap">
        <?php the_tags('<span style="font-size:0.85rem;color:var(--cinza)">Tags:</span> ','',  ''); ?>
      </div>
    <?php endwhile; endif; ?>

    <div style="margin-top:48px">
      <a href="<?= home_url('/blog/'); ?>" class="btn btn-outline">← Voltar para Notícias</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>

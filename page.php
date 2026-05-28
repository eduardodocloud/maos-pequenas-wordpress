<?php get_header(); ?>

<div class="page-hero">
  <div class="container">
    <div class="breadcrumb"><a href="<?= home_url(); ?>">Início</a> › <?php the_title(); ?></div>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<section class="page-content">
  <div class="container" style="max-width:860px">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>

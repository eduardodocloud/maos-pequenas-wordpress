<?php get_header(); ?>

<div class="page-hero">
 <div class="container">
 <div class="breadcrumb"><a href="<?= home_url(); ?>">Início</a>› Blog</div>
 <h1><?php the_archive_title(); ?></h1>
 <?php if (get_the_archive_description()) : ?>
 <p><?php the_archive_description(); ?></p>
 <?php endif; ?>
 </div>
</div>

<section class="section">
 <div class="container">
 <?php if (have_posts()) : ?>
 <div class="blog-grid">
 <?php while (have_posts()) : the_post(); ?>
 <article <?php post_class('blog-card'); ?>>
 <div class="blog-card-image">
 <?php if (has_post_thumbnail()) : the_post_thumbnail('mp-card',['style'=>'width:100%;height:100%;object-fit:cover']); else : ?>
 <div style="font-size:3rem"></div>
 <?php endif; ?>
 </div>
 <div class="blog-card-body">
 <?php $cats = get_the_category(); ?>
 <?php if ($cats) : ?><span class="blog-cat"><?= esc_html($cats[0]->name); ?></span><?php endif; ?>
 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 <p><?= wp_trim_words(get_the_excerpt(), 18, '…'); ?></p>
 <span class="blog-meta"><?php echo get_the_date('d/m/Y'); ?></span>
 </div>
 </article>
 <?php endwhile; ?>
 </div>
 <div class="text-center" style="margin-top:40px">
 <?php the_posts_pagination(['prev_text'=>'← Anterior','next_text'=>'Próximas →']); ?>
 </div>
 <?php else : ?>
 <p class="text-center">Nenhum post encontrado.</p>
 <?php endif; ?>
 </div>
</section>

<?php get_footer(); ?>

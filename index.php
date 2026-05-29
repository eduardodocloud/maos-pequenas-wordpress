<?php get_header(); ?>

<?php
// Título da página: se for page_for_posts, pega o título da page; senão usa "Blog"
$blog_page_id = (int) get_option('page_for_posts');
$blog_title = $blog_page_id ? get_the_title($blog_page_id) : 'Blog';
$blog_desc = $blog_page_id ? get_post_field('post_excerpt', $blog_page_id) : '';
?>
<div class="page-hero">
 <div class="container text-center">
 <div class="breadcrumb"><a href="<?= esc_url(home_url('/')); ?>">Início</a>› <?= esc_html($blog_title); ?></div>
 <h1><?= esc_html($blog_title); ?></h1>
 <?php if ($blog_desc) : ?><p><?= esc_html($blog_desc); ?></p>
 <?php else : ?><p>Acompanhe nossas histórias, dicas e novidades do Lar Mãos Pequenas.</p><?php endif; ?>
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

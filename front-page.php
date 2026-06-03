<?php get_header(); ?>

<?php
$anos_atuacao = max(20, date('Y') - 2005);
$doare = mp_opt('mp_doare_url', 'https://doare.org/');
$whats_clean = preg_replace('/\D/', '', mp_opt('mp_whatsapp', '1140472289'));
?>

<!-- ==================== HERO ROTATIVO ==================== -->
<section class="hero hero-slider" id="inicio" data-slider>
 <div class="container">
 <div class="hero-inner">
 <div class="hero-content">
 <!-- Slide 1 -->
 <div class="hero-slide is-active" data-slide="0">
 <div class="hero-badge">Faça parte dessa história</div>
 <h1><?= wp_kses_post(mp_opt('mp_hero_titulo_1', 'Um pequeno gesto pode fazer uma <span>grande diferença</span>')); ?></h1>
 <p><?= wp_kses_post(mp_opt('mp_hero_texto_1', 'Faça sua doação e ajude a transformar a vida de crianças e adolescentes acolhidos no Lar Mãos Pequenas.')); ?></p>
 <div class="hero-buttons">
 <a href="<?= home_url('/doacoes/'); ?>" class="btn btn-primary btn-lg">❤️ Faça sua Doação</a>
 <a href="<?= home_url('/quem-somos/'); ?>" class="btn btn-secondary btn-lg">Conheça o Lar</a>
 </div>
 </div>
 <!-- Slide 2 -->
 <div class="hero-slide" data-slide="1">
 <div class="hero-badge">⭐ <?= $anos_atuacao; ?>anos transformando vidas</div>
 <h1><?= wp_kses_post(mp_opt('mp_hero_titulo_2', 'Há 20 anos levando esperança para <span>crianças e adolescentes</span>')); ?></h1>
 <p><?= wp_kses_post(mp_opt('mp_hero_texto_2', 'O Lar Assistencial Mãos Pequenas é um espaço de acolhimento, afeto e dignidade em Diadema/SP.')); ?></p>
 <div class="hero-buttons">
 <a href="<?= home_url('/quem-somos/'); ?>" class="btn btn-primary btn-lg">Conheça Nossa História</a>
 <a href="<?= home_url('/seja-voluntario/'); ?>" class="btn btn-secondary btn-lg">Seja Voluntário</a>
 </div>
 </div>
 <!-- Indicadores -->
 <div class="hero-dots" role="tablist">
 <button type="button" class="hero-dot is-active" data-slide-to="0" aria-label="Banner 1"></button>
 <button type="button" class="hero-dot" data-slide-to="1" aria-label="Banner 2"></button>
 </div>
 </div>
 <div class="hero-image">
 <?php
 $hero_img_id = get_theme_mod('mp_hero_image');
 if ($hero_img_id) :
 echo wp_get_attachment_image($hero_img_id, 'mp-hero', false, ['class'=>'hero-img', 'alt'=>'Crianças do Lar Mãos Pequenas']);
 else : ?>
 <div class="hero-image-placeholder">
 <p>Adicione uma foto das crianças<br>no Customizer do WordPress</p>
 </div>
 <?php endif; ?>
 </div>
 </div>
 </div>
</section>

<!-- ==================== O QUE FAZEMOS ==================== -->
<section class="about-home section">
 <div class="container">
 <div class="about-home-inner">
 <div class="about-home-image">
 <?php $about_img = get_theme_mod('mp_about_image'); ?>
 <?php if ($about_img) : echo wp_get_attachment_image($about_img, 'large', false, ['style'=>'width:100%;border-radius:24px;box-shadow:var(--shadow-lg)']); else : ?>
 <div class="about-home-image-placeholder">
 <span style="font-size:4rem"></span>
 <p style="color:var(--azul);text-align:center">Foto do Lar Mãos Pequenas</p>
 </div>
 <?php endif; ?>
 <div class="years-badge">
 <strong>+<?= $anos_atuacao; ?></strong>
 <span>anos de<br>amor</span>
 </div>
 </div>
 <div class="about-home-content">
 <span class="section-label">O que Fazemos</span>
 <h2 class="section-title">Acolhimento institucional gratuito para crianças e adolescentes</h2>
 <p>O <strong>Lar Assistencial Mãos Pequenas</strong> é uma associação filantrópica que oferece serviço de acolhimento institucional gratuito a crianças e adolescentes encaminhados pelo <strong>Poder Judiciário</strong> e pelos <strong>Conselhos Tutelares</strong>.</p>
 <p>Funcionamos com a característica de <strong>moradia própria</strong>, oferecendo o mesmo ambiente de uma residência comum. Nossos acolhidos têm à disposição escolas, área de lazer, cultura, centros médicos, alimentação saudável e cursos.</p>

 <div class="values-list">
 <div class="value-item">
 <div>
 <strong>Missão</strong>
 <p>Acolher dignamente crianças e adolescentes que estão em situação de risco e/ou exclusão social, preservando os vínculos familiares para a reinserção na família de origem ou substituta, além de fortalecer laços de confiança.</p>
 </div>
 </div>
 <div class="value-item">
 <div>
 <strong>Visão</strong>
 <p>Tornar-se referência em acolhimento para crianças e adolescentes em Diadema e dentro do Estado de São Paulo, evidenciando o serviço como essencial dentro da realidade social atual.</p>
 </div>
 </div>
 <div class="value-item">
 <div>
 <strong>Valores</strong>
 <p>Acolhimento digno e fraternal · Respeito mútuo · Solidariedade · Transparência · Perseverança</p>
 </div>
 </div>
 </div>

 <a href="<?= home_url('/quem-somos/'); ?>" class="btn btn-outline">Conheça nossa história →</a>
 </div>
 </div>
 </div>
</section>

<!-- ==================== NOSSOS NÚMEROS ==================== -->
<section class="impact">
 <div class="container">
 <div class="text-center" style="margin-bottom:24px">
 <span class="section-label" style="color:#FFF">Nossos Números</span>
 <h2 class="section-title" style="color:#FFF">+<?= $anos_atuacao; ?>anos levando esperança</h2>
 </div>
 <div class="impact-grid">
 <div class="impact-item">
 <strong class="impact-number">+<?= $anos_atuacao; ?></strong>
 <span class="impact-label">Anos de Atuação</span>
 </div>
 <div class="impact-item">
 <strong class="impact-number">5</strong>
 <span class="impact-label">Lares em Funcionamento</span>
 </div>
 <div class="impact-item">
 <strong class="impact-number">+85</strong>
 <span class="impact-label">Crianças Atendidas Simultaneamente</span>
 </div>
 <div class="impact-item">
 <strong class="impact-number">+800</strong>
 <span class="impact-label">Pessoas Beneficiadas em Todos Esses Anos</span>
 </div>
 </div>
 </div>
</section>

<!-- ==================== NOSSAS CAMPANHAS ==================== -->
<section class="campanhas section">
 <div class="container text-center">
 <span class="section-label">Nossas Campanhas</span>
 <h2 class="section-title">Junte-se a nós em campanhas que transformam</h2>
 <p class="section-desc">Ao longo do ano realizamos campanhas para arrecadar recursos e alegrar o dia a dia das crianças. Conheça e participe.</p>

 <div class="how-grid">
 <div class="how-card">
 <h3>Campanha do Agasalho</h3>
 <p>Arrecadação de roupas e calçados de inverno para proteger as crianças do frio. Realizada anualmente entre maio e julho.</p>
 </div>
 <div class="how-card">
 <h3>Campanha de Natal</h3>
 <p>Presentes, ceia especial e momentos de alegria para que nossas crianças vivam um Natal cheio de amor.</p>
 </div>
 <div class="how-card">
 <h3>Campanha de Cestas Básicas</h3>
 <p>Arrecadação contínua de alimentos não perecíveis para garantir refeições nutritivas no dia a dia do lar.</p>
 </div>
 <div class="how-card">
 <h3>Nota Fiscal Paulista</h3>
 <p>Doe sem gastar nada! Indique o Lar Mãos Pequenas como entidade favorita e destine os créditos das suas compras para nossas crianças.</p>
 <a href="<?= esc_url(home_url('/doacoes/#nota-fiscal')); ?>" style="display:inline-block;margin-top:8px;color:var(--azul);font-weight:700;font-size:0.85rem;letter-spacing:0.5px">Saiba como participar →</a>
 </div>
 </div>
 </div>
</section>

<!-- ==================== APOIE O LAR MÃOS PEQUENAS ==================== -->
<section class="help-section section">
 <div class="container text-center">
 <span class="section-label">Apoie o Lar Mãos Pequenas</span>
 <h2 class="section-title">Existem 3 formas principais de ajudar</h2>
 <p class="section-desc">Sua contribuição, seja em dinheiro, recorrente ou em suprimentos, faz toda a diferença para as crianças acolhidas.</p>

 <div class="help-grid">
 <!-- 1. DOE DINHEIRO -->
 <div class="help-card">
 <div class="help-card-header">
 <h3>Doe Dinheiro</h3>
 </div>
 <div class="help-card-body">
 <p>Doação única via cartão de crédito, boleto ou PayPal, através da plataforma <strong>Doare</strong>(segura e transparente).</p>
 <ul class="help-list">
 <li>Cartão de crédito</li>
 <li>Boleto bancário</li>
 <li>PayPal</li>
 </ul>
 <a href="<?= esc_url($doare); ?>" target="_blank" rel="noopener" class="btn btn-primary" style="width:100%;justify-content:center">Doar Agora</a>
 </div>
 </div>

 <!-- 2. SÓCIO MANTENEDOR -->
 <div class="help-card">
 <div class="help-card-header">
 <h3>Seja Sócio Mantenedor</h3>
 </div>
 <div class="help-card-body">
 <p>Contribuição mensal fixa para custear despesas correntes: aluguel, IPTU, telefone, material administrativo e contador.</p>
 <ul class="help-list">
 <li>Doação recorrente</li>
 <li>Valor escolhido por você</li>
 <li>Cancele quando quiser</li>
 </ul>
 <a href="<?= home_url('/doacoes/#mantenedor'); ?>" class="btn btn-primary" style="width:100%;justify-content:center">Quero ser Mantenedor</a>
 </div>
 </div>

 <!-- 3. DOE RECURSOS -->
 <div class="help-card">
 <div class="help-card-header">
 <h3>Doe Recursos</h3>
 </div>
 <div class="help-card-body">
 <p>Doação de itens essenciais para o dia a dia das crianças e adolescentes acolhidos (0 a 18 anos).</p>
 <ul class="help-list">
 <li>Alimentos, leites Aptamil/Nan/Ninho</li>
 <li>Roupas, calçados, brinquedos</li>
 <li>Higiene, fraldas, material escolar</li>
 </ul>
 <a href="<?= home_url('/doacoes/#suprimentos'); ?>" class="btn btn-primary" style="width:100%;justify-content:center">Doar Suprimentos</a>
 </div>
 </div>
 </div>
 </div>
</section>

<!-- ==================== CTA DOAÇÃO ==================== -->
<section class="donation-cta">
 <div class="container">
 <h2>Um pequeno gesto seu pode<br>transformar a vida de alguém.</h2>
 <p>Com sua doação, oferecemos esperança, amor e a chance de um futuro brilhante para cada criança acolhida.</p>

 <div class="donation-buttons">
 <a href="<?= esc_url($doare); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-lg">❤️ Doar Agora pela Doare</a>
 <a href="https://wa.me/55<?= $whats_clean; ?>?text=Ol%C3%A1!+Quero+fazer+uma+doa%C3%A7%C3%A3o+para+o+Lar+M%C3%A3os+Pequenas." class="btn btn-secondary btn-lg" target="_blank">Falar no WhatsApp</a>
 </div>

 <div class="pix-box">
 <span class="label">CNPJ — Chave PIX</span>
 <span class="cnpj"><?= esc_html(mp_opt('mp_cnpj','07.679.226/0001-00')); ?></span>
 <span style="font-size:0.8rem;opacity:0.7">Lar Assistencial Mãos Pequenas · Utilidade Pública Municipal<?= esc_html(mp_opt('mp_util_publica','2877/09')); ?></span>
 </div>
 </div>
</section>

<!-- ==================== SEJA UM PARCEIRO ==================== -->
<section class="parceiros-home section">
 <div class="container text-center">
 <span class="section-label">Seja um Parceiro</span>
 <h2 class="section-title">Sua empresa pode transformar vidas</h2>
 <p class="section-desc">Empresas parceiras que nos apoiam ajudam a manter o lar em funcionamento e a ampliar o impacto social.</p>

 <div class="parceiros-grid">
 <div class="parceiro-logo">Mesa Brasil<br><small>SESC SP</small></div>
 <div class="parceiro-logo">Parker</div>
 <div class="parceiro-logo">EMOL<br><small>Escola Monteiro Lobato</small></div>
 <div class="parceiro-logo">Banco de Alimentos<br><small>Diadema</small></div>
 <div class="parceiro-logo">Espacial<br><small>Frangos</small></div>
 <div class="parceiro-logo">Município de<br>Caçapava</div>
 <div class="parceiro-logo">TechSoup<br>Brasil</div>
 <div class="parceiro-logo">Google for<br>Nonprofits</div>
 </div>

 <div style="margin-top:40px">
 <a href="<?= home_url('/parceiros/'); ?>" class="btn btn-outline">Conheça nossos parceiros →</a>
 </div>
 </div>
</section>

<!-- ==================== BLOG ==================== -->
<?php
$blog_posts = new WP_Query([
 'posts_per_page' => 3,
 'post_status' => 'publish',
 'orderby' => 'date',
 'order' => 'DESC',
]);
if ($blog_posts->have_posts()) : ?>
<section class="blog-section section">
 <div class="container">
 <div class="text-center">
 <span class="section-label">Blog</span>
 <h2 class="section-title">Acompanhe nossas histórias</h2>
 <p class="section-desc">Fique por dentro do que acontece no Lar Mãos Pequenas e no mundo da infância.</p>
 </div>
 <div class="blog-grid">
 <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
 <article class="blog-card">
 <div class="blog-card-image">
 <?php if (has_post_thumbnail()) : the_post_thumbnail('mp-card', ['style'=>'width:100%;height:100%;object-fit:cover']); else : ?>
 <div style="font-size:3rem"></div>
 <?php endif; ?>
 </div>
 <div class="blog-card-body">
 <span class="blog-cat"><?php $cats = get_the_category(); echo $cats ? esc_html($cats[0]->name) : 'Notícia'; ?></span>
 <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 <p><?php echo wp_trim_words(get_the_excerpt(), 18, '…'); ?></p>
 <span class="blog-meta"><?php echo get_the_date('d/m/Y'); ?></span>
 </div>
 </article>
 <?php endwhile; wp_reset_postdata(); ?>
 </div>
 <div class="text-center" style="margin-top:40px">
 <a href="<?= home_url('/blog/'); ?>" class="btn btn-outline">Ver todas as notícias →</a>
 </div>
 </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>

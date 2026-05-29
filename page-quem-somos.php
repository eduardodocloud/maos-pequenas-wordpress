<?php
/**
 * Template Name: Quem Somos
 */
get_header(); ?>

<div class="page-hero">
 <div class="container">
 <div class="breadcrumb"><a href="<?= home_url(); ?>">Início</a>› Quem Somos</div>
 <h1>Quem Somos</h1>
 <p>Conheça a história, a missão e as pessoas por trás do Lar Mãos Pequenas</p>
 </div>
</div>

<section class="section">
 <div class="container">
 <div class="about-home-inner">
 <div class="about-home-image">
 <div class="about-home-image-placeholder">
 <span style="font-size:4rem"></span>
 <p style="color:var(--azul)">Foto do Lar</p>
 </div>
 <div class="years-badge">
 <strong>+20</strong>
 <span>anos de<br>amor</span>
 </div>
 </div>
 <div class="about-home-content">
 <span class="section-label">Nossa História</span>
 <h2 class="section-title">Uma história de amor, fé e comprometimento</h2>
 <p>O <strong>Lar Assistencial Mãos Pequenas</strong> nasceu do desejo de transformar a vida de crianças e adolescentes que mais precisam. Localizado em <strong>Diadema, São Paulo</strong>, o lar completa mais de 20 anos de atuação dedicados ao acolhimento digno e transformador.</p>
 <p>Desde a nossa fundação, acreditamos que cada criança, independente de sua história, merece crescer em um ambiente seguro, afetuoso e cheio de possibilidades. Por isso, muito além de oferecer abrigo, trabalhamos para construir <strong>vínculos reais, presença constante e perspectiva de futuro</strong>.</p>
 </div>
 </div>
 </div>
</section>

<!-- Missão, Visão e Valores (texto oficial do briefing) -->
<section class="how-works section">
 <div class="container text-center">
 <span class="section-label">MVV</span>
 <h2 class="section-title">Missão, Visão e Valores</h2>
 <div class="how-grid">
 <div class="how-card">
 <h3>Missão</h3>
 <p>Acolher dignamente crianças e adolescentes que estão em situação de risco e/ou exclusão social, preservando os vínculos familiares para a reinserção na família de origem ou substituta, além de fortalecer laços de confiança.</p>
 </div>
 <div class="how-card">
 <h3>Visão</h3>
 <p>Tornar-se referência em acolhimento para crianças e adolescentes em Diadema e dentro do Estado de São Paulo, evidenciando o serviço como essencial dentro da realidade social atual, utilizado como ferramenta para se chegar às famílias que mais necessitam de apoio, acompanhamento e fortalecimento, para serem reinseridas na comunidade com dignidade.</p>
 </div>
 <div class="how-card">
 <h3>Valores</h3>
 <p>5 fatores essenciais: <strong>Acolhimento digno e fraternal · Respeito Mútuo · Solidariedade · Transparência · Perseverança</strong></p>
 </div>
 </div>
 </div>
</section>

<!-- O que oferecemos -->
<section class="help-section section">
 <div class="container text-center">
 <span class="section-label">Nossos Serviços</span>
 <h2 class="section-title">O que oferecemos às nossas crianças</h2>
 <div class="how-grid" style="grid-template-columns:repeat(3,1fr)">
 <?php
 $services = [
 ['','Abrigo Seguro','Um lar estruturado, limpo e acolhedor, onde cada criança se sente protegida e amada.'],
 ['','Alimentação','Refeições nutritivas e balanceadas que garantem saúde e desenvolvimento.'],
 ['','Educação','Apoio escolar, materiais didáticos e incentivo à aprendizagem e ao desenvolvimento cognitivo.'],
 ['','Saúde','Acompanhamento médico, psicológico e odontológico para cuidar do bem-estar integral.'],
 ['','Lazer e Cultura','Atividades lúdicas, artísticas e esportivas que estimulam a criatividade e o desenvolvimento.'],
 ['','Vínculo Afetivo','Presença constante, escuta ativa e afeto genuíno — porque toda criança precisa se sentir amada.'],
 ];
 foreach ($services as [$icon,$title,$desc]) : ?>
 <div class="how-card">
 <div class="how-icon"><?= $icon; ?></div>
 <h3><?= $title; ?></h3>
 <p><?= $desc; ?></p>
 </div>
 <?php endforeach; ?>
 </div>
 </div>
</section>

<!-- CTA -->
<section class="donation-cta">
 <div class="container text-center">
 <h2>Faça parte dessa história</h2>
 <p>Sua contribuição, seja como voluntário, doador ou parceiro, ajuda a escrever um futuro melhor para cada criança.</p>
 <div class="donation-buttons">
 <a href="<?= home_url('/doacoes/'); ?>" class="btn btn-primary btn-lg">❤️ Quero Doar</a>
 <a href="<?= home_url('/seja-voluntario/'); ?>" class="btn btn-secondary btn-lg">Seja Voluntário</a>
 </div>
 </div>
</section>

<?php get_footer(); ?>

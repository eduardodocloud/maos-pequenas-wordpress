<?php
/**
 * Template Name: Como Acolhemos
 */
get_header(); ?>

<div class="page-hero">
 <div class="container">
 <div class="breadcrumb"><a href="<?= home_url(); ?>">Início</a>› Como Acolhemos</div>
 <h1>Como Acolhemos</h1>
 <p>Entenda o processo de acolhimento e como transformamos histórias de vulnerabilidade em recomeços com amor.</p>
 </div>
</div>

<section class="section">
 <div class="container">
 <div class="text-center">
 <span class="section-label">Nossa Metodologia</span>
 <h2 class="section-title">O acolhimento é um recomeço — não um rótulo</h2>
 <p class="section-desc" style="margin-bottom:0">Cada criança que chega ao Lar Mãos Pequenas chega com uma história. Nosso time recebe todas com paciência, escuta ativa e muito afeto.</p>
 </div>

 <div class="page-como-acolhemos">
 <div class="timeline">
 <?php
 $etapas = [
 ['','Chegada e Acolhida','A criança é recebida com carinho e respeito. Priorizamos criar um ambiente seguro desde o primeiro momento, onde ela se sinta acolhida e protegida.'],
 ['','Avaliação Individualizada','Cada criança é conhecida em sua individualidade — sua história, suas necessidades emocionais, de saúde e de aprendizado — para construir um plano personalizado de cuidado.'],
 ['','Rotina Estruturada','Estabelecemos uma rotina saudável com horários de escola, alimentação, brincadeiras, atividades culturais e momentos de afeto que transmitem segurança e estabilidade.'],
 ['','Trabalho com a Família','Sempre que possível, trabalhamos o vínculo com a família de origem, auxiliando na superação das dificuldades que levaram ao afastamento.'],
 ['','Acompanhamento Judicial','Trabalhamos em conjunto com o Conselho Tutelar, a Vara da Infância e a Juventude para garantir que cada criança tenha seus direitos protegidos e a decisão mais adequada ao seu caso.'],
 ['','Reintegração ou Adoção','Nosso objetivo final é devolver a criança à família de origem de forma segura, ou encaminhá-la para adoção quando for a melhor alternativa para seu futuro.'],
 ];
 foreach ($etapas as $i => [$icon,$title,$desc]) : ?>
 <div class="timeline-item">
 <div class="timeline-dot"><?= $icon; ?></div>
 <div class="timeline-body">
 <h3><?= $title; ?></h3>
 <p><?= $desc; ?></p>
 </div>
 </div>
 <?php endforeach; ?>
 </div>
 </div>
 </div>
</section>

<!-- O que garantimos -->
<section class="how-works section">
 <div class="container text-center">
 <span class="section-label">Cuidado Integral</span>
 <h2 class="section-title">O que garantimos para cada criança</h2>
 <div class="how-grid">
 <?php
 $garantias = [
 ['','Abrigo Seguro','Um lar limpo, organizado e acolhedor, onde cada criança tem seu espaço e privacidade respeitados.'],
 ['','Alimentação Nutritiva','Refeições balanceadas e adequadas à faixa etária de cada acolhido, preparadas com cuidado.'],
 ['','Educação e Apoio Escolar','Garantimos a frequência escolar e oferecemos reforço e estímulo à aprendizagem.'],
 ['','Saúde Integral','Acompanhamento médico, psicológico, odontológico e nutricional para cuidar do bem-estar total.'],
 ['','Lazer e Desenvolvimento','Atividades esportivas, artísticas, culturais e lúdicas que estimulam o desenvolvimento pleno.'],
 ['','Afeto e Vínculo','Presença constante, escuta ativa e demonstrações de carinho — porque toda criança merece amor.'],
 ];
 foreach ($garantias as [$icon,$title,$desc]) : ?>
 <div class="how-card">
 <div class="how-icon"><?= $icon; ?></div>
 <h3><?= $title; ?></h3>
 <p><?= $desc; ?></p>
 </div>
 <?php endforeach; ?>
 </div>
 </div>
</section>

<section class="donation-cta">
 <div class="container text-center">
 <h2>Ajude a continuar esse trabalho</h2>
 <p>Cada criança acolhida precisa de recursos. Sua doação garante que esse ciclo de amor continue.</p>
 <div class="donation-buttons">
 <a href="<?= home_url('/como-ajudar/'); ?>" class="btn btn-primary btn-lg">❤️ Quero Fazer uma Doação</a>
 <a href="<?= home_url('/como-ajudar/#voluntariado'); ?>" class="btn btn-secondary btn-lg">Ser Voluntário</a>
 </div>
 </div>
</section>

<?php get_footer(); ?>

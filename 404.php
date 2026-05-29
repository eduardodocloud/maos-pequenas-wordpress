<?php get_header(); ?>

<section class="section" style="text-align:center;padding:120px 0">
 <div class="container">
 <div style="font-size:6rem;margin-bottom:20px"></div>
 <h1 style="font-size:clamp(3rem,8vw,6rem);color:var(--azul);margin-bottom:12px">404</h1>
 <h2 style="margin-bottom:16px">Página não encontrada</h2>
 <p style="color:var(--texto-med);max-width:480px;margin:0 auto 36px">Parece que essa página não existe ou foi movida. Mas não se preocupe — você ainda pode ajudar nossas crianças!</p>
 <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap">
 <a href="<?= home_url('/'); ?>" class="btn btn-primary">← Voltar ao início</a>
 <a href="<?= home_url('/como-ajudar/'); ?>" class="btn btn-outline">❤️ Quero Ajudar</a>
 </div>
 </div>
</section>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Doações
 */
get_header();
$cnpj  = mp_opt('mp_cnpj', '07.679.226/0001-00');
$end   = mp_opt('mp_endereco', 'Diadema/SP');
$hora  = mp_opt('mp_horario', 'Segunda à sexta-feira, das 9h às 17h');
$whats = preg_replace('/\D/', '', mp_opt('mp_whatsapp', '1140472289'));
$tel   = mp_opt('mp_tel_2', '(11) 4047-2289');
$nfp   = mp_opt('mp_nfp_url', ''); // URL Nota Fiscal Paulista (configurar quando receber)
?>

<section class="page-header section">
 <div class="container text-center">
 <span class="section-label">Doações</span>
 <h1 class="section-title">Sua doação transforma vidas</h1>
 <p class="section-desc">Conheça as formas de contribuir para o Lar Assistencial Mãos Pequenas.</p>
 </div>
</section>

<!-- DOAÇÃO VIA PIX -->
<section class="section" id="pix" style="background:var(--cinza-claro)">
 <div class="container">
 <div class="about-home-inner">
 <div class="about-home-content">
 <span class="section-label">Doação em Dinheiro</span>
 <h2 class="section-title">Faça sua doação via PIX</h2>
 <p>A manutenção das atividades do Lar Assistencial Mãos Pequenas exige recursos financeiros para que o acolhimento seja mantido da forma mais benéfica possível. Custos surgem no decorrer dos dias para atender as necessidades de <strong>saúde, alimentação, educação e bem-estar</strong> de nossos acolhidos.</p>
 <p>Cada contribuição, por menor que seja, faz uma grande diferença na vida das crianças e adolescentes que acolhemos.</p>

 <div class="donation-highlight">
 <div class="donation-highlight-text">
 <strong>Doação direta e segura</strong>
 <p>Use nossa chave PIX para fazer sua doação na hora — sem taxas, sem intermediários. O valor cai direto na conta da instituição.</p>
 </div>
 </div>

 <a href="https://wa.me/55<?= $whats; ?>?text=Ol%C3%A1!+Acabei+de+fazer+uma+doa%C3%A7%C3%A3o+via+PIX+para+o+Lar+M%C3%A3os+Pequenas." target="_blank" rel="noopener" class="btn btn-outline btn-lg">Avisar pelo WhatsApp após doar</a>
 </div>
 <div class="about-home-image">
 <div class="pix-box" style="background:var(--branco);color:var(--texto);border:2px solid var(--azul-pale)">
 <span class="label" style="color:var(--azul)">Chave PIX — CNPJ</span>
 <span class="cnpj" style="color:var(--azul);font-size:1.4rem;font-weight:700;cursor:pointer" title="Clique para copiar"><?= esc_html($cnpj); ?></span>
 <span style="font-size:0.9rem;color:var(--texto-med);margin-top:8px;display:block">👆 Clique no CNPJ para copiar</span>
 <span style="font-size:0.85rem;color:var(--texto-med);margin-top:14px;display:block">Lar Assistencial Mãos Pequenas<br>Utilidade Pública Municipal <?= esc_html(mp_opt('mp_util_publica','2877/09')); ?></span>
 </div>
 </div>
 </div>
 </div>
</section>

<!-- NOTA FISCAL PAULISTA -->
<section class="section" id="nota-fiscal">
 <div class="container">
 <div class="text-center" style="margin-bottom:32px">
 <span class="section-label">Nota Fiscal Paulista</span>
 <h2 class="section-title">Doe sem gastar nada</h2>
 <p class="section-desc" style="max-width:780px;margin:16px auto">Você pode contribuir com o Lar Mãos Pequenas <strong>sem desembolsar nenhum centavo</strong> — basta indicar nossa instituição na hora de pedir Nota Fiscal Paulista.</p>
 </div>

 <div class="about-home-content" style="max-width:840px;margin:0 auto">
 <p>O programa <strong>Nota Fiscal Paulista</strong> do governo de São Paulo permite que você destine parte dos créditos das suas compras para entidades assistenciais cadastradas. O Lar Mãos Pequenas é uma dessas entidades — basta nos indicar quando pedir nota.</p>

 <div class="donation-highlight">
 <div class="donation-highlight-text">
 <strong>Como funciona</strong>
 <p>Toda vez que você fizer uma compra, peça a nota e indique o CPF de doação automática para o Lar Assistencial Mãos Pequenas. Os créditos gerados vêm direto para a instituição, sem custo nenhum para você.</p>
 </div>
 </div>

 <div style="display:flex;gap:14px;flex-wrap:wrap;margin-top:24px;justify-content:center">
 <?php if ($nfp) : ?>
 <a href="<?= esc_url($nfp); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-lg">Cadastrar como entidade favorita</a>
 <?php else : ?>
 <span class="btn btn-outline btn-lg" style="opacity:0.7;cursor:default">Link em breve</span>
 <?php endif; ?>
 <a href="https://wa.me/55<?= $whats; ?>?text=Ol%C3%A1!+Como+fa%C3%A7o+para+destinar+minha+Nota+Fiscal+Paulista+para+o+Lar+M%C3%A3os+Pequenas%3F" target="_blank" rel="noopener" class="btn btn-outline btn-lg">Tirar dúvidas no WhatsApp</a>
 </div>
 </div>
 </div>
</section>

<!-- DOAÇÃO DE SUPRIMENTOS -->
<section class="section" id="suprimentos" style="background:var(--cinza-claro)">
 <div class="container">
 <div class="text-center" style="margin-bottom:32px">
 <span class="section-label">Doação de Suprimentos</span>
 <h2 class="section-title">Ajude com itens essenciais</h2>
 <p class="section-desc" style="max-width:780px;margin:16px auto">O Lar Assistencial Mãos Pequenas precisa de todos os tipos de itens para o dia a dia das nossas crianças e adolescentes (idade entre <strong>0 e 18 anos</strong>).</p>
 </div>

 <div class="help-grid">
 <div class="help-card">
 <div class="help-card-header">
 <h3>Alimentos</h3>
 </div>
 <div class="help-card-body">
 <ul class="help-list">
 <li>Alimentos não perecíveis</li>
 <li>Leites: Aptamil AR, Nan I, Nan II</li>
 <li>Leite Ninho</li>
 <li>Cestas básicas</li>
 </ul>
 </div>
 </div>
 <div class="help-card">
 <div class="help-card-header">
 <h3>Vestuário</h3>
 </div>
 <div class="help-card-body">
 <ul class="help-list">
 <li>Roupas (todos os tamanhos)</li>
 <li>Calçados</li>
 <li>Roupas de cama e banho</li>
 <li>Agasalhos no inverno</li>
 </ul>
 </div>
 </div>
 <div class="help-card">
 <div class="help-card-header">
 <h3>Brinquedos &amp; Lazer</h3>
 </div>
 <div class="help-card-body">
 <ul class="help-list">
 <li>Brinquedos infantis</li>
 <li>Livros e gibis</li>
 <li>Jogos educativos</li>
 <li>Material esportivo</li>
 </ul>
 </div>
 </div>
 <div class="help-card">
 <div class="help-card-header">
 <h3>Higiene</h3>
 </div>
 <div class="help-card-body">
 <ul class="help-list">
 <li>Fraldas (todos os tamanhos)</li>
 <li>Lenços umedecidos</li>
 <li>Produtos de higiene pessoal</li>
 <li>Produtos de limpeza</li>
 </ul>
 </div>
 </div>
 <div class="help-card">
 <div class="help-card-header">
 <h3>Material Escolar</h3>
 </div>
 <div class="help-card-body">
 <ul class="help-list">
 <li>Cadernos e mochilas</li>
 <li>Lápis, canetas, borrachas</li>
 <li>Tintas e materiais artísticos</li>
 <li>Material universitário</li>
 </ul>
 </div>
 </div>
 <div class="help-card">
 <div class="help-card-header">
 <h3>Utensílios</h3>
 </div>
 <div class="help-card-body">
 <ul class="help-list">
 <li>Utensílios domésticos</li>
 <li>Eletro eletrônicos</li>
 <li>Móveis em bom estado</li>
 <li>Itens de cozinha</li>
 </ul>
 </div>
 </div>
 </div>

 <div class="donation-highlight" style="margin-top:40px">
 <div class="donation-highlight-text">
 <strong>Como combinar a entrega</strong>
 <p>Entre em contato pelo <strong>WhatsApp</strong> ou <strong>telefone</strong> para combinarmos a forma de entrega. Em alguns casos, podemos retirar a doação no seu endereço.</p>
 <p style="margin-top:8px"><?= esc_html($hora); ?><br><strong><?= esc_html($tel); ?></strong></p>
 </div>
 </div>

 <div class="text-center" style="margin-top:32px">
 <a href="https://wa.me/55<?= $whats; ?>?text=Ol%C3%A1!+Quero+doar+suprimentos+para+o+Lar+M%C3%A3os+Pequenas." target="_blank" rel="noopener" class="btn btn-primary btn-lg">Combinar Doação no WhatsApp</a>
 </div>
 </div>
</section>

<?php get_footer(); ?>

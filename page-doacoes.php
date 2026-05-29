<?php
/**
 * Template Name: Doações
 */
get_header();
$doare = mp_opt('mp_doare_url', 'https://doare.org/');
$cnpj = mp_opt('mp_cnpj', '07.679.226/0001-00');
$end = mp_opt('mp_endereco', 'Estrada Nova Ipê, 440 — Condomínio Praia Vermelha — Diadema/SP');
$hora = mp_opt('mp_horario', 'Segunda à sexta-feira, das 9h às 17h');
$whats = preg_replace('/\D/', '', mp_opt('mp_whatsapp', '1140472289'));
$tel = mp_opt('mp_tel_2', '(11) 4047-2289');
?>

<section class="page-header section">
 <div class="container text-center">
 <span class="section-label">Doações</span>
 <h1 class="section-title">Sua doação transforma vidas</h1>
 <p class="section-desc">Conheça as 3 formas de contribuir para o Lar Assistencial Mãos Pequenas.</p>
 </div>
</section>

<!-- DOAÇÃO EM DINHEIRO -->
<section class="section" id="dinheiro" style="background:var(--cinza-claro)">
 <div class="container">
 <div class="about-home-inner">
 <div class="about-home-content">
 <span class="section-label">Doação em Dinheiro</span>
 <h2 class="section-title">Doação única através da plataforma Doare</h2>
 <p>A manutenção das atividades do Lar Assistencial Mãos Pequenas exige recursos financeiros para que o acolhimento seja mantido da forma mais benéfica possível. Custos surgem no decorrer dos dias para atender as necessidades de <strong>saúde, alimentação, educação e bem-estar</strong> de nossos acolhidos.</p>
 <p>Por isso contamos muito com a colaboração da sociedade. Para captação de doações financeiras utilizamos a plataforma <strong>Doare</strong>, que permite doar de forma simples e segura via cartão de crédito, boleto bancário ou PayPal.</p>

 <div class="donation-highlight">
 <div class="donation-highlight-text">
 <strong>Plataforma segura</strong>
 <p>A Doare é a maior plataforma de doações financeiras do Brasil, regularizada e auditada.</p>
 </div>
 </div>

 <a href="<?= esc_url($doare); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-lg">❤️ Doar Agora pela Doare</a>
 </div>
 <div class="about-home-image">
 <div class="pix-box" style="background:var(--branco);color:var(--texto);border:2px solid var(--azul-pale)">
 <span class="label" style="color:var(--azul)">Ou via PIX — CNPJ</span>
 <span class="cnpj" style="color:var(--azul)"><?= esc_html($cnpj); ?></span>
 <span style="font-size:0.85rem;color:var(--texto-med)">Lar Assistencial Mãos Pequenas<br>Utilidade Pública Municipal<?= esc_html(mp_opt('mp_util_publica','2877/09')); ?></span>
 </div>
 </div>
 </div>
 </div>
</section>

<!-- SÓCIO MANTENEDOR -->
<section class="section" id="mantenedor">
 <div class="container">
 <div class="text-center" style="margin-bottom:32px">
 <span class="section-label">Sócio Mantenedor</span>
 <h2 class="section-title">Realize uma contribuição mensal fixa</h2>
 <p class="section-desc" style="max-width:780px;margin:16px auto">Para que possamos dar continuidade aos trabalhos que realizamos, precisamos de recursos financeiros que possam custear despesas correntes, como aluguel, IPTU, telefone, material administrativo, contador e outras necessidades do dia a dia.</p>
 </div>

 <div class="about-home-content" style="max-width:840px;margin:0 auto">
 <p>Você pode fazer uma <strong>doação mensal simbólica</strong> que será creditada em nossas contas e contribuirá na garantia do contínuo funcionamento das atividades do Projeto Lar.</p>

 <div class="donation-highlight">
 <div class="donation-highlight-text">
 <strong>Doação recorrente</strong>
 <p>Configure pelo Doare ou entre em contato — você escolhe o valor e pode cancelar a qualquer momento.</p>
 </div>
 </div>

 <div style="display:flex;gap:14px;flex-wrap:wrap;margin-top:24px">
 <a href="<?= esc_url($doare); ?>" target="_blank" rel="noopener" class="btn btn-primary btn-lg">Quero ser Mantenedor</a>
 <a href="https://wa.me/55<?= $whats; ?>?text=Ol%C3%A1!+Quero+me+tornar+s%C3%B3cio+mantenedor+do+Lar+M%C3%A3os+Pequenas." target="_blank" class="btn btn-outline btn-lg">Falar no WhatsApp</a>
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
 <strong>Entrega ou retirada</strong>
 <p>Você pode entrar em contato conosco e solicitar que <strong>retiremos as doações em seu endereço</strong>, ou então realizar a entrega em nossa sede administrativa:</p>
 <p style="margin-top:8px"><strong><?= esc_html($end); ?></strong><br><?= esc_html($hora); ?><br><?= esc_html($tel); ?></p>
 </div>
 </div>

 <div class="text-center" style="margin-top:32px">
 <a href="https://wa.me/55<?= $whats; ?>?text=Ol%C3%A1!+Quero+doar+suprimentos+para+o+Lar+M%C3%A3os+Pequenas." target="_blank" rel="noopener" class="btn btn-primary btn-lg">Combinar Doação no WhatsApp</a>
 </div>
 </div>
</section>

<?php get_footer(); ?>

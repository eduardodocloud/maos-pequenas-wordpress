<?php
/**
 * Template Name: Como Ajudar
 */
get_header();
$cnpj       = mp_opt('mp_cnpj','07.679.226/0001-00');
$whats      = mp_opt('mp_whatsapp','(11) 91630-0915');
$whats_clean= preg_replace('/\D/','',$whats);
?>

<div class="page-hero">
  <div class="container">
    <div class="breadcrumb"><a href="<?= home_url(); ?>">Início</a> › Como Ajudar</div>
    <h1>Como Você Pode Ajudar</h1>
    <p>Existem várias formas de fazer a diferença na vida das nossas crianças. Escolha a que faz mais sentido para você.</p>
  </div>
</div>

<!-- Doação Financeira -->
<section class="section" id="doacao">
  <div class="container">
    <div class="about-home-inner">
      <div>
        <span class="section-label">💙 Doação Financeira</span>
        <h2 class="section-title">Transforme vidas com uma doação</h2>
        <p>Cada contribuição financia diretamente a alimentação, saúde, educação e atividades de nossas crianças. Você pode ser um doador pontual ou um <strong>doador mensal</strong>, que apoia o lar de forma contínua.</p>

        <div class="values-list" style="margin-top:32px">
          <div class="value-item">
            <div class="value-icon">📱</div>
            <div>
              <strong>PIX — Forma mais rápida</strong>
              <p>Chave PIX: CNPJ <strong style="font-family:monospace;font-size:1.05rem"><?= esc_html($cnpj); ?></strong></p>
              <p style="margin-top:6px;font-size:0.85rem;color:var(--cinza)">Lar Assistencial Mãos Pequenas</p>
            </div>
          </div>
          <div class="value-item">
            <div class="value-icon">💬</div>
            <div>
              <strong>WhatsApp</strong>
              <p>Fale conosco para informações sobre depósito ou doação recorrente.</p>
              <a href="https://wa.me/55<?= $whats_clean; ?>?text=Ol%C3%A1!+Gostaria+de+fazer+uma+doa%C3%A7%C3%A3o." class="btn btn-primary" style="margin-top:12px" target="_blank">💬 Chamar no WhatsApp</a>
            </div>
          </div>
          <div class="value-item">
            <div class="value-icon">📊</div>
            <div>
              <strong>Transparência Total</strong>
              <p>Publicamos balancetes financeiros periodicamente. CNPJ: <?= esc_html($cnpj); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div style="background:var(--azul-pale);border-radius:var(--radius);padding:40px;text-align:center">
        <div style="font-size:4rem;margin-bottom:16px">💛</div>
        <h3 style="font-size:1.4rem;margin-bottom:16px">Chave PIX</h3>
        <div style="background:white;border-radius:8px;padding:20px;margin-bottom:20px;border:2px solid var(--azul)">
          <div style="font-size:0.75rem;letter-spacing:1.5px;text-transform:uppercase;color:var(--cinza);margin-bottom:8px">CNPJ · Lar Assistencial Mãos Pequenas</div>
          <div style="font-family:monospace;font-size:1.4rem;font-weight:700;color:var(--azul)"><?= esc_html($cnpj); ?></div>
        </div>
        <p style="color:var(--texto-med);font-size:0.9rem">Após realizar a transferência, guarde o comprovante. Se quiser, nos envie via WhatsApp!</p>
      </div>
    </div>
  </div>
</section>

<!-- Voluntariado -->
<section class="how-works section" id="voluntariado">
  <div class="container text-center">
    <span class="section-label">🙌 Voluntariado</span>
    <h2 class="section-title">Ser voluntário é uma recompensa enorme</h2>
    <p class="section-desc">Principalmente para as crianças! Doe seu tempo, talento e carinho — e receba sorrisos em troca.</p>

    <div class="how-grid">
      <div class="how-card">
        <div class="how-icon">📖</div>
        <h3>Educação</h3>
        <p>Reforço escolar, contação de histórias, musicalização, artes, idiomas e atividades pedagógicas.</p>
      </div>
      <div class="how-card">
        <div class="how-icon">🩺</div>
        <h3>Saúde e Bem-Estar</h3>
        <p>Atendimentos de psicologia, odontologia, nutrição, fisioterapia e outras áreas da saúde.</p>
      </div>
      <div class="how-card">
        <div class="how-icon">⚽</div>
        <h3>Esporte e Lazer</h3>
        <p>Atividades esportivas, oficinas culturais, passeios e dinâmicas recreativas para as crianças.</p>
      </div>
    </div>

    <div style="margin-top:48px;background:white;border-radius:var(--radius);padding:40px;box-shadow:var(--shadow);max-width:700px;margin-left:auto;margin-right:auto;text-align:left" id="form-voluntariado">
      <h3 style="text-align:center;margin-bottom:24px">Quero ser voluntário!</h3>
      <form id="volunteerForm" method="post">
        <?php wp_nonce_field('mp_nonce','mp_volunteer_nonce'); ?>
        <div class="form-row">
          <div class="form-group">
            <label>Nome completo *</label>
            <input type="text" name="nome" required placeholder="Seu nome">
          </div>
          <div class="form-group">
            <label>WhatsApp *</label>
            <input type="tel" name="whatsapp" required placeholder="(11) 99999-9999">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>E-mail *</label>
            <input type="email" name="email" required placeholder="seu@email.com">
          </div>
          <div class="form-group">
            <label>Profissão / Área</label>
            <input type="text" name="profissao" placeholder="Ex: Pedagoga, Médico...">
          </div>
        </div>
        <div class="form-group">
          <label>Área de interesse *</label>
          <select name="area" required>
            <option value="">Selecione...</option>
            <option>Educação e reforço escolar</option>
            <option>Saúde (médico, psicólogo, dentista, etc.)</option>
            <option>Esporte e lazer</option>
            <option>Artes e cultura</option>
            <option>Comunicação e marketing</option>
            <option>Jurídico e administrativo</option>
            <option>Outro</option>
          </select>
        </div>
        <div class="form-group">
          <label>Disponibilidade</label>
          <textarea name="disponibilidade" placeholder="Ex: Sábados pela manhã, fins de semana, etc." style="height:90px"></textarea>
        </div>
        <button type="submit" class="btn btn-primary form-submit">🙌 Enviar Cadastro de Voluntário</button>
      </form>
    </div>
  </div>
</section>

<!-- Doação de Itens -->
<section class="section" id="itens">
  <div class="container text-center">
    <span class="section-label">🎁 Doação de Itens</span>
    <h2 class="section-title">Doe itens e veja a diferença na prática</h2>
    <div class="help-grid">
      <?php
      $itens = [
        ['👕','Roupas e Calçados','Roupas em bom estado para crianças e adolescentes de todas as idades e tamanhos.'],
        ['🥫','Alimentos','Alimentos não perecíveis como arroz, feijão, macarrão, óleo, açúcar, leite, etc.'],
        ['📓','Material Escolar','Cadernos, lápis, canetas, borrachas, mochilas, réguas e tudo que ajuda na escola.'],
        ['🧸','Brinquedos','Brinquedos em bom estado para diferentes idades. Cada brinquedo é uma brincadeira a mais.'],
        ['🧴','Higiene Pessoal','Sabonete, shampoo, condicionador, pasta de dente, escova e creme hidratante.'],
        ['🛏️','Cama e Banho','Lençóis, fronhas, toalhas e cobertores em bom estado.'],
      ];
      foreach ($itens as [$icon,$title,$desc]) : ?>
        <div class="help-card" style="text-align:left">
          <div class="help-card-header">
            <div class="help-card-icon"><?= $icon; ?></div>
            <h3><?= $title; ?></h3>
          </div>
          <div class="help-card-body">
            <p><?= $desc; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div style="margin-top:40px">
      <p style="color:var(--texto-med);margin-bottom:20px">Para combinar a entrega de itens, entre em contato pelo WhatsApp:</p>
      <a href="https://wa.me/55<?= $whats_clean; ?>?text=Ol%C3%A1!+Gostaria+de+doar+itens+para+o+Lar+M%C3%A3os+Pequenas." class="btn btn-primary btn-lg" target="_blank">💬 Combinar Entrega pelo WhatsApp</a>
    </div>
  </div>
</section>

<!-- Parcerias empresariais -->
<section class="donation-cta" id="parceria">
  <div class="container text-center">
    <h2>Seja um Parceiro Empresarial</h2>
    <p>Sua empresa pode apoiar o Lar Mãos Pequenas por meio de projetos, patrocínios ou indicando nosso CNPJ em compras. Cada contribuição empresarial faz uma diferença enorme.</p>
    <div class="donation-buttons">
      <a href="mailto:<?= esc_attr(mp_opt('mp_email','larmaospequenas@larmp.org.br')); ?>" class="btn btn-primary btn-lg">✉️ Enviar E-mail</a>
      <a href="https://wa.me/55<?= $whats_clean; ?>?text=Ol%C3%A1!+Gostaria+de+conversar+sobre+parceria+empresarial." class="btn btn-secondary btn-lg" target="_blank">💬 WhatsApp</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>

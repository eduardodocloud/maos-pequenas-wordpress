<?php
/**
 * Template Name: Parceiros
 */
get_header();
$parceiros = [
    ['nome' => 'Mesa Brasil',           'desc' => 'SESC São Paulo'],
    ['nome' => 'Parker',                'desc' => 'Indústria'],
    ['nome' => 'EMOL',                  'desc' => 'Escola Monteiro Lobato'],
    ['nome' => 'Banco de Alimentos',    'desc' => 'Diadema'],
    ['nome' => 'Espacial',              'desc' => 'Frangos'],
    ['nome' => 'Município de Caçapava', 'desc' => 'Prefeitura'],
    ['nome' => 'Protelim',              'desc' => 'Higiene profissional'],
    ['nome' => 'Nena Pizza',            'desc' => 'Alimentação'],
    ['nome' => 'Poupafarma',            'desc' => 'Farmácia'],
    ['nome' => 'TechSoup Brasil',       'desc' => 'Tecnologia'],
    ['nome' => 'Google for Nonprofits', 'desc' => 'Tecnologia'],
    ['nome' => 'GELC',                  'desc' => 'Educação'],
];
?>

<section class="page-header section">
  <div class="container text-center">
    <span class="section-label">Parceiros</span>
    <h1 class="section-title">Ilumine o futuro de diversas crianças!</h1>
    <p class="section-desc" style="max-width:780px;margin:16px auto">Você sabia que sua empresa pode realizar o bem social com simples gestos? Com o seu apoio, podemos transformar a vida de diversas crianças e adolescentes.</p>
  </div>
</section>

<section class="parceiros-home section" style="background:var(--cinza-claro)">
  <div class="container">
    <div class="text-center">
      <span class="section-label">Conheça Nossos Parceiros</span>
      <h2 class="section-title">Empresas que já fazem parte</h2>
      <p class="section-desc">Agradecemos profundamente a todas as empresas e instituições que apoiam nosso trabalho.</p>
    </div>

    <div class="parceiros-grid">
      <?php foreach ($parceiros as $p) : ?>
        <div class="parceiro-logo">
          <?= esc_html($p['nome']); ?>
          <small><?= esc_html($p['desc']); ?></small>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section" id="cadastro">
  <div class="container">
    <div class="about-home-inner">
      <div class="about-home-content">
        <span class="section-label">Seja um Parceiro</span>
        <h2 class="section-title">Faça sua inscrição agora</h2>
        <p>Sua empresa pode realizar o bem social com simples gestos. Com o seu apoio, podemos transformar a vida de diversas crianças e adolescentes. Faça a inscrição que nossa equipe irá entrar em contato.</p>
        <p><strong>Tipos de parceria:</strong> doação financeira, doação de produtos/serviços, divulgação institucional, voluntariado corporativo, eventos beneficentes.</p>
      </div>

      <div class="about-home-image">
        <form id="parceiroForm" class="contact-form" style="background:var(--branco);padding:32px;border-radius:var(--radius);box-shadow:var(--shadow-lg)">
          <h3 style="margin-top:0;color:var(--azul);font-family:var(--font-head)">🤝 Cadastro de Parceiro</h3>
          <div class="form-grid">
            <div class="form-field field-full">
              <label>Nome do responsável *</label>
              <input type="text" name="nome" required>
            </div>
            <div class="form-field field-full">
              <label>Empresa *</label>
              <input type="text" name="empresa" required>
            </div>
            <div class="form-field">
              <label>CNPJ</label>
              <input type="text" name="cnpj">
            </div>
            <div class="form-field">
              <label>Celular *</label>
              <input type="tel" name="celular" required>
            </div>
            <div class="form-field field-full">
              <label>E-mail *</label>
              <input type="email" name="email" required>
            </div>
            <div class="form-field field-full">
              <label>Endereço</label>
              <input type="text" name="endereco">
            </div>
            <div class="form-field field-full">
              <label>Tipo de parceria desejada</label>
              <select name="tipo">
                <option value="">Selecione</option>
                <option value="Doação Financeira">Doação financeira</option>
                <option value="Doação de Produtos">Doação de produtos/serviços</option>
                <option value="Divulgação">Divulgação institucional</option>
                <option value="Voluntariado Corporativo">Voluntariado corporativo</option>
                <option value="Eventos">Eventos beneficentes</option>
                <option value="Outro">Outro</option>
              </select>
            </div>
          </div>
          <?php wp_nonce_field('mp_nonce', '_mp_nonce'); ?>
          <button type="submit" class="btn btn-primary btn-lg" style="width:100%;margin-top:24px">✓ Enviar Proposta</button>
          <div class="form-feedback"></div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

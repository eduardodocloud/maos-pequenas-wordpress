<?php
$whats   = mp_opt('mp_whatsapp', '(11) 4047-2289');
$tel1    = mp_opt('mp_tel_1',    '(11) 4047-2167');
$tel2    = mp_opt('mp_tel_2',    '(11) 4047-2289');
$fax     = mp_opt('mp_fax',      '(11) 4049-6305');
$tel3    = mp_opt('mp_tel_3',    '(11) 4059-6973');
$email   = mp_opt('mp_email',    'larmaospequenas@gmail.com');
$ig      = mp_opt('mp_instagram','https://instagram.com/larmaospequenas');
$fb      = mp_opt('mp_facebook', '');
$yt      = mp_opt('mp_youtube',  '');
$end     = mp_opt('mp_endereco', 'Estrada Nova Ipê, 440 — Condomínio Praia Vermelha — Diadema/SP');
$horario = mp_opt('mp_horario',  'Segunda à sexta-feira, das 9h às 17h');
$cnpj    = mp_opt('mp_cnpj',     '07.679.226/0001-00');
$upm     = mp_opt('mp_util_publica', '2877/09');
$whats_clean = preg_replace('/\D/', '', $whats);
?>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <!-- Coluna 1: Marca -->
      <div class="footer-brand">
        <a href="<?= home_url('/'); ?>" class="site-logo">
          <?php if (has_custom_logo()) :
            the_custom_logo();
          else : ?>
            <div class="site-logo-text">
              <strong>Mãos Pequenas</strong>
              <span>Lar Assistencial</span>
            </div>
          <?php endif; ?>
        </a>
        <p>Acolhemos crianças e adolescentes em situação de vulnerabilidade com amor, cuidado e comprometimento há mais de 20 anos.</p>
        <div class="footer-social">
          <?php if ($ig) : ?>
            <a href="<?= esc_url($ig); ?>" class="social-link" target="_blank" rel="noopener" aria-label="Instagram">📷</a>
          <?php endif; ?>
          <?php if ($fb) : ?>
            <a href="<?= esc_url($fb); ?>" class="social-link" target="_blank" rel="noopener" aria-label="Facebook">📘</a>
          <?php endif; ?>
          <?php if ($yt) : ?>
            <a href="<?= esc_url($yt); ?>" class="social-link" target="_blank" rel="noopener" aria-label="YouTube">▶️</a>
          <?php endif; ?>
          <a href="https://wa.me/55<?= $whats_clean; ?>" class="social-link" target="_blank" rel="noopener" aria-label="WhatsApp">💬</a>
        </div>
      </div>

      <!-- Coluna 2: Links -->
      <div class="footer-col">
        <h4>Navegação</h4>
        <div class="footer-links">
          <a href="<?= home_url('/'); ?>">Home</a>
          <a href="<?= home_url('/quem-somos/'); ?>">Quem Somos</a>
          <a href="<?= home_url('/doacoes/'); ?>">Doações</a>
          <a href="<?= home_url('/seja-voluntario/'); ?>">Seja Voluntário</a>
          <a href="<?= home_url('/parceiros/'); ?>">Parceiros</a>
          <a href="<?= home_url('/dados-aos-doadores/'); ?>">Dados aos Doadores</a>
          <a href="<?= home_url('/blog/'); ?>">Blog</a>
        </div>
      </div>

      <!-- Coluna 3: Como Ajudar -->
      <div class="footer-col">
        <h4>Como Ajudar</h4>
        <div class="footer-links">
          <a href="<?= home_url('/doacoes/#dinheiro'); ?>">Doação em Dinheiro</a>
          <a href="<?= home_url('/doacoes/#mantenedor'); ?>">Sócio Mantenedor</a>
          <a href="<?= home_url('/doacoes/#suprimentos'); ?>">Doação de Suprimentos</a>
          <a href="<?= home_url('/seja-voluntario/'); ?>">Ser Voluntário</a>
          <a href="<?= home_url('/parceiros/'); ?>">Ser Parceiro</a>
        </div>
      </div>

      <!-- Coluna 4: Contato -->
      <div class="footer-col">
        <h4>Fale Conosco</h4>
        <?php if ($end) : ?>
          <div class="footer-contact-item">
            <span class="footer-contact-icon">📍</span>
            <span><?= esc_html($end); ?></span>
          </div>
        <?php endif; ?>
        <?php if ($horario) : ?>
          <div class="footer-contact-item">
            <span class="footer-contact-icon">🕐</span>
            <span><?= esc_html($horario); ?></span>
          </div>
        <?php endif; ?>
        <?php if ($tel1) : ?>
          <div class="footer-contact-item">
            <span class="footer-contact-icon">📞</span>
            <span>
              <a href="tel:+55<?= preg_replace('/\D/','',$tel1); ?>" style="color:rgba(255,255,255,0.85)"><?= esc_html($tel1); ?></a><br>
              <?php if ($tel2) : ?><a href="tel:+55<?= preg_replace('/\D/','',$tel2); ?>" style="color:rgba(255,255,255,0.85)"><?= esc_html($tel2); ?></a><br><?php endif; ?>
              <?php if ($tel3) : ?><a href="tel:+55<?= preg_replace('/\D/','',$tel3); ?>" style="color:rgba(255,255,255,0.85)"><?= esc_html($tel3); ?></a><br><?php endif; ?>
              <?php if ($fax)  : ?><span style="color:rgba(255,255,255,0.65)"><?= esc_html($fax); ?> (fax)</span><?php endif; ?>
            </span>
          </div>
        <?php endif; ?>
        <?php if ($email) : ?>
          <div class="footer-contact-item">
            <span class="footer-contact-icon">✉️</span>
            <a href="mailto:<?= esc_attr($email); ?>" style="color:rgba(255,255,255,0.85)"><?= esc_html($email); ?></a>
          </div>
        <?php endif; ?>
      </div>

    </div><!-- .footer-grid -->

    <!-- Bottom bar -->
    <div class="footer-bottom">
      <span>© <?= date('Y'); ?> Lar Assistencial Mãos Pequenas · CNPJ <?= esc_html($cnpj); ?> · Utilidade Pública Municipal <?= esc_html($upm); ?></span>
      <span>Desenvolvido com ❤️ pela <a href="https://comunicacaoencantada.com.br" target="_blank" rel="noopener">Comunicação Encantada</a></span>
    </div>
  </div><!-- .container -->
</footer>

<?php wp_footer(); ?>
</body>
</html>

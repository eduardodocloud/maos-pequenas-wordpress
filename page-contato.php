<?php
/**
 * Template Name: Contato
 */
get_header();
$whats      = mp_opt('mp_whatsapp','(11) 91630-0915');
$email_dest = mp_opt('mp_email','larmaospequenas@larmp.org.br');
$whats_clean= preg_replace('/\D/','',$whats);
?>

<div class="page-hero">
  <div class="container">
    <div class="breadcrumb"><a href="<?= home_url(); ?>">Início</a> › Contato</div>
    <h1>Entre em Contato</h1>
    <p>Estamos aqui para conversar, esclarecer dúvidas e receber você de braços abertos!</p>
  </div>
</div>

<section class="contact-section section">
  <div class="container">
    <div class="contact-inner">

      <!-- Informações -->
      <div class="contact-info">
        <h2>Fale com a gente</h2>
        <p>Seja para tirar dúvidas, agendar uma visita, fazer uma doação ou se voluntariar — ficamos felizes em atender você!</p>

        <div class="contact-items">
          <div class="contact-item">
            <div class="contact-icon">📍</div>
            <div class="contact-item-text">
              <strong>Localização</strong>
              <span><?= esc_html(mp_opt('mp_endereco','Diadema — São Paulo, SP')); ?></span>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon">📱</div>
            <div class="contact-item-text">
              <strong>WhatsApp</strong>
              <span><a href="https://wa.me/55<?= $whats_clean; ?>"><?= esc_html($whats); ?></a></span>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon">✉️</div>
            <div class="contact-item-text">
              <strong>E-mail</strong>
              <span><a href="mailto:<?= esc_attr($email_dest); ?>"><?= esc_html($email_dest); ?></a></span>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon">📷</div>
            <div class="contact-item-text">
              <strong>Instagram</strong>
              <span><a href="<?= esc_url(mp_opt('mp_instagram','https://instagram.com/larmaospequenas')); ?>" target="_blank">@larmaospequenas</a></span>
            </div>
          </div>
        </div>

        <div style="margin-top:36px;padding:24px;background:var(--azul-pale);border-radius:var(--radius)">
          <h4 style="margin-bottom:8px">🗓️ Agendamento de Visitas</h4>
          <p style="color:var(--texto-med);font-size:0.95rem">Para conhecer o Lar Mãos Pequenas pessoalmente, entre em contato pelo WhatsApp ou e-mail para agendar sua visita com antecedência.</p>
        </div>
      </div>

      <!-- Formulário -->
      <div class="contact-form">
        <h3>Envie sua mensagem</h3>
        <div id="form-feedback" style="display:none;padding:14px;border-radius:8px;margin-bottom:20px"></div>
        <form id="contactForm">
          <?php wp_nonce_field('mp_nonce','_mp_nonce'); ?>
          <div class="form-row">
            <div class="form-group">
              <label for="contact-name">Nome *</label>
              <input type="text" id="contact-name" name="name" required placeholder="Seu nome completo">
            </div>
            <div class="form-group">
              <label for="contact-email">E-mail *</label>
              <input type="email" id="contact-email" name="email" required placeholder="seu@email.com">
            </div>
          </div>
          <div class="form-group">
            <label for="contact-assunto">Assunto *</label>
            <select id="contact-assunto" name="assunto" required>
              <option value="">Selecione o assunto...</option>
              <option>Quero fazer uma doação</option>
              <option>Quero ser voluntário</option>
              <option>Parceria empresarial</option>
              <option>Agendar visita</option>
              <option>Informações sobre adoção</option>
              <option>Imprensa / Mídia</option>
              <option>Outro</option>
            </select>
          </div>
          <div class="form-group">
            <label for="contact-message">Mensagem *</label>
            <textarea id="contact-message" name="message" required placeholder="Escreva sua mensagem aqui..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary form-submit" id="contact-submit">
            ✉️ Enviar Mensagem
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

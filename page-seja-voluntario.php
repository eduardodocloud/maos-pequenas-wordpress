<?php
/**
 * Template Name: Seja Voluntário
 */
get_header();
$tel = mp_opt('mp_tel_2', '(11) 4047-2289');
?>

<section class="page-header section">
 <div class="container text-center">
 <span class="section-label">Voluntariado</span>
 <h1 class="section-title">Seja um Voluntário</h1>
 <p class="section-desc" style="max-width:780px;margin:16px auto">
 "Voluntário é o jovem ou o adulto que, devido a seu interesse pessoal e ao seu espírito cívico, dedica parte do seu tempo, sem remuneração alguma, a diversas formas de atividades, organizadas ou não, de bem-estar social, ou outros campos..."
 <br><small style="color:var(--texto-med)">— Nações Unidas</small>
 </p>
 </div>
</section>

<section class="section">
 <div class="container">
 <div class="about-home-inner">
 <div class="about-home-content">
 <h2 class="section-title">Com o seu apoio, podemos transformar vidas</h2>
 <p>A satisfação de saber que mesmo um pequeno gesto seu foi capaz de transformar a vida de alguém é indescritível. Faça sua inscrição agora e nossa equipe entrará em contato.</p>

 <div class="donation-highlight">
 <div class="donation-highlight-text">
 <strong>Após enviar o formulário</strong>
 <p>Pedimos que agende uma visita através do telefone <strong><?= esc_html($tel); ?></strong> para conhecer melhor nossos serviços.</p>
 </div>
 </div>

 <div class="regras-list">
 <h3>Regras para Voluntário e Visitação</h3>
 <ul>
 <li>Agendamento por e-mail ou WhatsApp</li>
 <li>Informar nome completo e quantidade de visitantes</li>
 <li>Objetivo da visita</li>
 <li>Grupo máximo de 15 pessoas (caso ultrapasse, solicitar análise prévia)</li>
 <li><strong>O berçário não é visitado</strong></li>
 <li>Proibido tirar fotos</li>
 <li>Evitar preferências e colos</li>
 <li>Oferecer alimentos somente no refeitório ou espaço externo</li>
 <li>Não retirar os brinquedos das prateleiras</li>
 <li>Não perguntar sobre a história de vida das crianças</li>
 <li>Todas as crianças têm famílias — a reinserção familiar é o principal objetivo</li>
 </ul>
 </div>
 </div>

 <div class="about-home-image">
 <form id="voluntarioForm" class="contact-form" style="background:var(--branco);padding:32px;border-radius:var(--radius);box-shadow:var(--shadow-lg)">
 <h3 style="margin-top:0;color:var(--azul);font-family:var(--font-head)">Inscrição de Voluntário</h3>

 <h4 style="margin-top:18px;font-size:0.95rem;text-transform:uppercase;color:var(--texto-med);letter-spacing:1px">Dados Pessoais</h4>
 <div class="form-grid">
 <div class="form-field field-full">
 <label>Nome completo *</label>
 <input type="text" name="nome" required>
 </div>
 <div class="form-field">
 <label>Profissão</label>
 <input type="text" name="profissao">
 </div>
 <div class="form-field field-full">
 <label>Endereço</label>
 <input type="text" name="endereco">
 </div>
 <div class="form-field">
 <label>Bairro</label>
 <input type="text" name="bairro">
 </div>
 <div class="form-field">
 <label>CEP</label>
 <input type="text" name="cep">
 </div>
 <div class="form-field">
 <label>Telefone fixo</label>
 <input type="tel" name="telefone">
 </div>
 <div class="form-field">
 <label>Celular *</label>
 <input type="tel" name="celular" required>
 </div>
 <div class="form-field field-full">
 <label>E-mail *</label>
 <input type="email" name="email" required>
 </div>
 </div>

 <h4 style="margin-top:24px;font-size:0.95rem;text-transform:uppercase;color:var(--texto-med);letter-spacing:1px">Experiência Anterior</h4>
 <div class="form-grid">
 <div class="form-field">
 <label>Já foi voluntário?</label>
 <select name="experiencia">
 <option value="">Selecione</option>
 <option value="Não">Não</option>
 <option value="Sim">Sim</option>
 </select>
 </div>
 <div class="form-field">
 <label>Onde?</label>
 <input type="text" name="onde">
 </div>
 <div class="form-field field-full">
 <label>Área de atuação</label>
 <input type="text" name="area">
 </div>
 </div>

 <h4 style="margin-top:24px;font-size:0.95rem;text-transform:uppercase;color:var(--texto-med);letter-spacing:1px">Disponibilidade</h4>
 <div class="form-field field-full">
 <label>Dias e turnos disponíveis</label>
 <div class="form-checkbox-group">
 <label><input type="checkbox" name="dispon" value="Seg-Manhã">Seg manhã</label>
 <label><input type="checkbox" name="dispon" value="Seg-Tarde">Seg tarde</label>
 <label><input type="checkbox" name="dispon" value="Ter-Manhã">Ter manhã</label>
 <label><input type="checkbox" name="dispon" value="Ter-Tarde">Ter tarde</label>
 <label><input type="checkbox" name="dispon" value="Qua-Manhã">Qua manhã</label>
 <label><input type="checkbox" name="dispon" value="Qua-Tarde">Qua tarde</label>
 <label><input type="checkbox" name="dispon" value="Qui-Manhã">Qui manhã</label>
 <label><input type="checkbox" name="dispon" value="Qui-Tarde">Qui tarde</label>
 <label><input type="checkbox" name="dispon" value="Sex-Manhã">Sex manhã</label>
 <label><input type="checkbox" name="dispon" value="Sex-Tarde">Sex tarde</label>
 </div>
 </div>
 <div class="form-field field-full" style="margin-top:12px">
 <label>Eventos em fins de semana?</label>
 <select name="fds">
 <option value="">Selecione</option>
 <option value="Sim">Sim</option>
 <option value="Não">Não</option>
 </select>
 </div>

 <?php wp_nonce_field('mp_nonce', '_mp_nonce'); ?>
 <button type="submit" class="btn btn-primary btn-lg" style="width:100%;margin-top:24px">Enviar Inscrição</button>
 <div class="form-feedback"></div>
 <p style="font-size:0.78rem;color:var(--texto-med);margin-top:14px;line-height:1.5">
   🔒 Seus dados serão usados apenas para entrarmos em contato sobre voluntariado.
   Nenhuma informação será compartilhada com terceiros (LGPD).
 </p>
 </form>
 </div>
 </div>
 </div>
</section>

<?php get_footer(); ?>

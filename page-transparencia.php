<?php
/**
 * Template Name: Transparência
 *
 * Lista documentos institucionais para download. Os PDFs precisam ser enviados
 * para a Biblioteca de Mídia do WordPress. Quando os anexos não existirem,
 * mostramos um placeholder com a mensagem para envio.
 *
 * Para gerenciar a lista, use o filtro 'mp_documentos_transparencia'.
 */
get_header();

// Documentos esperados (arquivos do Desktop/site/Balancetes + Estatuto + Ata)
$docs_default = [
 [
 'titulo' => 'Estatuto Social',
 'desc' => 'Estatuto atual com novo endereço',
 'slug' => 'estatuto-social',
 'icone' => '',
 'ano' => '2020',
 ],
 [
 'titulo' => 'Ata da Diretoria Atual',
 'desc' => 'Composição da diretoria',
 'slug' => 'ata-diretoria',
 'icone' => '',
 'ano' => '2020',
 ],
 [
 'titulo' => 'Demonstrações Contábeis 2018',
 'desc' => 'BP, DR, DMPL, FC e Notas Explicativas',
 'slug' => 'balancete-2018',
 'icone' => '',
 'ano' => '2018',
 ],
 [
 'titulo' => 'Peças Contábeis 2017',
 'desc' => 'BP, DRE, DMPL, DFI e Notas Explicativas',
 'slug' => 'balancete-2017',
 'icone' => '',
 'ano' => '2017',
 ],
 [
 'titulo' => 'Demonstrações Contábeis 2016',
 'desc' => 'Notas Explicativas',
 'slug' => 'balancete-2016',
 'icone' => '',
 'ano' => '2016',
 ],
 [
 'titulo' => 'Demonstrações Contábeis 2015',
 'desc' => 'Demonstrações completas',
 'slug' => 'balancete-2015',
 'icone' => '',
 'ano' => '2015',
 ],
 [
 'titulo' => 'Demonstrações Contábeis 2014-2013',
 'desc' => 'BP, DR, DMPL, FC e Notas Explicativas',
 'slug' => 'balancete-2014',
 'icone' => '',
 'ano' => '2014',
 ],
 [
 'titulo' => 'Demonstrações Contábeis 2013-2012',
 'desc' => 'Lar Mãos Pequenas',
 'slug' => 'balancete-2013',
 'icone' => '',
 'ano' => '2013',
 ],
 [
 'titulo' => 'Notas Explicativas 2012',
 'desc' => 'Demonstrações Contábeis em 31/12/2012',
 'slug' => 'balancete-2012',
 'icone' => '',
 'ano' => '2012',
 ],
 [
 'titulo' => 'Demonstrações Financeiras 2012/2011',
 'desc' => 'Comparativo entre os exercícios',
 'slug' => 'balancete-2011',
 'icone' => '',
 'ano' => '2011',
 ],
];

$docs = apply_filters('mp_documentos_transparencia', $docs_default);

// Busca anexos com matching slug
function mp_find_doc_url($slug) {
 $attach = get_page_by_path($slug, OBJECT, 'attachment');
 return $attach ? wp_get_attachment_url($attach->ID) : '';
}
?><section class="page-header section">
 <div class="container text-center">
 <div class="breadcrumb"><a href="<?= esc_url(home_url('/')); ?>">Início</a>› Transparência</div>
 <h1>Transparência</h1>
 <p>Transparência com nossos parceiros e doadores em primeiro lugar. Consulte nossos documentos institucionais e prestações de contas.</p>
 </div>
</section>

<section class="section">
 <div class="container">

 <!-- Estatuto + Ata -->
 <h2 class="section-title" style="text-align:center">Documentos Institucionais</h2>
 <div class="docs-grid">
 <?php foreach (array_slice($docs, 0, 2) as $doc) :
   $url       = mp_find_doc_url($doc['slug']);
   $view_url  = home_url('/doc/' . $doc['slug'] . '/');
   $disabled  = !$url;
 ?>
 <button type="button"
         class="doc-card<?= $disabled ? ' is-disabled' : ''; ?>"
         data-doc-url="<?= esc_url($view_url); ?>"
         data-doc-title="<?= esc_attr($doc['titulo']); ?>"
         <?= $disabled ? 'disabled' : ''; ?>>
   <div class="doc-card-body">
     <strong><?= esc_html($doc['titulo']); ?></strong>
     <span><?= esc_html($doc['desc']); ?></span>
     <?php if ($disabled) : ?>
       <span class="doc-card-warn">aguardando upload</span>
     <?php else : ?>
       <span class="doc-card-action">Clique para visualizar</span>
     <?php endif; ?>
   </div>
 </button>
 <?php endforeach; ?>
 </div>

 <!-- Balancetes -->
 <h2 class="section-title" style="text-align:center;margin-top:64px">Balancetes e Prestação de Contas</h2>
 <p style="text-align:center;color:var(--texto-med);margin-bottom:32px">Demonstrações contábeis e notas explicativas dos últimos anos.</p>
 <div class="docs-grid">
 <?php foreach (array_slice($docs, 2) as $doc) :
   $url       = mp_find_doc_url($doc['slug']);
   $view_url  = home_url('/doc/' . $doc['slug'] . '/');
   $disabled  = !$url;
 ?>
 <button type="button"
         class="doc-card<?= $disabled ? ' is-disabled' : ''; ?>"
         data-doc-url="<?= esc_url($view_url); ?>"
         data-doc-title="<?= esc_attr($doc['titulo']); ?>"
         <?= $disabled ? 'disabled' : ''; ?>>
   <div class="doc-card-body">
     <strong><?= esc_html($doc['titulo']); ?></strong>
     <span><?= esc_html($doc['desc']); ?> · <?= esc_html($doc['ano']); ?></span>
     <?php if ($disabled) : ?>
       <span class="doc-card-warn">aguardando upload</span>
     <?php else : ?>
       <span class="doc-card-action">Clique para visualizar</span>
     <?php endif; ?>
   </div>
 </button>
 <?php endforeach; ?>
 </div>

 <!-- Informações legais -->
 <div class="donation-highlight" style="margin-top:48px">
   <div class="donation-highlight-text">
     <strong>Lar Assistencial Mãos Pequenas</strong>
     <p>CNPJ: <strong><?= esc_html(mp_opt('mp_cnpj','07.679.226/0001-00')); ?></strong></p>
     <p>Utilidade Pública Municipal: <strong><?= esc_html(mp_opt('mp_util_publica','2877/09')); ?></strong></p>
     <p>Endereço: <?= esc_html(mp_opt('mp_endereco','Estrada Nova Ipê, 440 — Condomínio Praia Vermelha — Diadema/SP')); ?></p>
   </div>
 </div>

 </div>
</section>

<!-- ===== Modal de visualização de documento (PDF view-only) ===== -->
<div id="docModal" class="doc-modal" aria-hidden="true" role="dialog" aria-labelledby="docModalTitle">
  <div class="doc-modal-backdrop" data-doc-close></div>
  <div class="doc-modal-content" oncontextmenu="return false;">
    <header class="doc-modal-header">
      <h3 id="docModalTitle">Documento</h3>
      <button type="button" class="doc-modal-close" data-doc-close aria-label="Fechar">×</button>
    </header>
    <div class="doc-modal-body">
      <iframe id="docFrame"
              src="about:blank"
              title="Visualizador de documento"
              referrerpolicy="same-origin"
              sandbox="allow-same-origin allow-scripts"></iframe>
    </div>
    <footer class="doc-modal-footer">
      <small>Documento de consulta pública. Para solicitar cópia formal, entre em contato com <a href="mailto:<?= esc_attr(mp_opt('mp_email','larmaospequenas@gmail.com')); ?>"><?= esc_html(mp_opt('mp_email','larmaospequenas@gmail.com')); ?></a>.</small>
    </footer>
  </div>
</div>

<?php get_footer(); ?>

<?php
function montaFormulario()
{
  $idLoja = intval( $_POST['idLoja'] );
  if ( ! $idLoja ) {
    $idLoja = '';
  }
  $telefone = sanitize_text_field( $_POST['telefone'] );
  if ( ! $telefone ) {
    $telefone = '';
  }
  if(!empty($telefone) && !empty($idLoja))
  { 
    $loja_nome = get_field('loja', $idLoja);
    echo do_shortcode("[contact-form-7 id='1092' title='Orçamento Chamada']");   
  }
  else
  {
    echo "Não foi possível encontrar a loja. Os campos estão vazios.";
  }
  wp_die();
}
add_action('wp_ajax_montaFormulario','montaFormulario');
add_action('wp_ajax_nopriv_montaFormulario','montaFormulario');
?>
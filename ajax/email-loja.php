<?php
function emailLoja()
{
  
  $idLoja = intval( $_POST['idLoja'] );
  if ( ! $idLoja ) {
    $idLoja = '';
  }
  
  $telefone = sanitize_text_field( $_POST['telefone'] );
  if ( ! $telefone ) {
    $telefone = '';
  }
  
  if(!empty($idLoja))
  { 
    $email = get_post_field( 'email', $idLoja );    
    if($email){

      // Dados básicos para envio do e-mail
      $to      = $email;
      $subject = "InoveGás: Solicitação de Orçamento pelo Site";
      $message = "Um visitante solicitou orçamento para sua loja\nTelefone do interessado: $telefone\n//--\nEssa é uma nofiticação automática do site da InoveGás\n";
      $message = wordwrap($message, 70);
      $headers = 'From: contato@inovegas.com.br' . "\r\n" .
          'Reply-To: contato@inovegas.com.br' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
          
      // Envio do E-mail
      mail($to, $subject, $message, $headers);
      
    }
    else
    {
      return false;
    }
  }
  else
  {
    echo "Não foi possível encontrar a loja. Os campos estão vazios.";
  }
  wp_die();
}
add_action('wp_ajax_emailLoja','emailLoja');
add_action('wp_ajax_nopriv_emailLoja','emailLoja');
?>
<?php
function emailCallcenter()
{
  /* Consulta se comportamento está ativo no site */
  $notificacao = get_field( 'notifica_callcenter', 'option' );
  if($notificacao == 1){
    
    /* Captura telefone, se houver */
    $telefone = sanitize_text_field( $_POST['telefone'] );
    if ( ! $telefone ) {
      $telefone = '';
    }  
    /* Captura e-mail do callcenter cadastrado no site */
    $email = get_field( 'email_callcenter', 'option' );
    if($email)
    {

      // Dados básicos para envio do e-mail
      $to      = $email;
      $subject = "InoveGás: Solicitação de Orçamento pelo Site";
      $message = "Um visitante solicitou orçamento.\nTelefone do interessado: $telefone\n//--\nEssa é uma nofiticação automática do site da InoveGás\n";
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
  
  wp_die();
  
}
add_action('wp_ajax_emailCallcenter','emailCallcenter');
add_action('wp_ajax_nopriv_emailCallcenter','emailCallcenter');
?>
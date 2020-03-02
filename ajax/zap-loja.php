<?php
function zapLoja()
{  
  $idLoja = intval( $_POST['idLoja'] );
  if ( ! $idLoja ) {
    $idLoja = '';
  }  
  if(!empty($idLoja))
  { 
    // pego arranjo
    $rows = get_field('celulares', $idLoja);
    if($rows)
    {
      // pego linha aleatoria
      $rand_row = $rows[array_rand($rows)];
      // variavel da linha sorteada
      $phone = $rand_row['celular'];
      $phone_r = preg_replace('/\D+/', '', $phone);
      
      $zap_api = get_field('zap_api', 'option');
      $msg_open = get_field('zap_msg_open', 'option');              
      $loja_nome = get_field('loja', $idLoja);
      $loja_nome_clean = str_replace(' ', '%20', $loja_nome);
      $msg_close = get_field('zap_msg_close', 'option');
      
      /* Concatenando */
      $msg_concat .= $zap_api;
      $msg_concat .= $phone_r;
      $msg_concat .= $msg_open;
      $msg_concat .= $loja_nome_clean;
      $msg_concat .= $msg_close;
      
      //return $phone_r;
      echo "<a class='btn btn-primary btn-lg txt-uppercase' id='fazerContato' href='$msg_concat' target='_blank' rel='noopener' title='Peça seu orçamento pelo WhatsApp'>FAZER CONTATO</a>";
    }
    else
    {
      return false;
    }
  }
  else
  {    
  }
  wp_die();
}
add_action('wp_ajax_zapLoja','zapLoja');
add_action('wp_ajax_nopriv_zapLoja','zapLoja');
?>
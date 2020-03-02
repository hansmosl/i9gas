<?php
function consultaLoja()
{
  $idLoja = '';
  $campo = '';
  if(!empty($_POST['idLoja']))
  {
    $idLoja = $_POST['idLoja'];
  }
  if(!empty($_POST['campo']))
  {
    $campo = $_POST['campo'];
  }
  if(!empty($campo) && !empty($idLoja))
  { 
    if($campo=='telefone')
    {
      if(wp_is_mobile())
      {
        // pego arranjo
        $rows = get_field('telefones', $idLoja);
        if($rows)
        {
        // pego linha aleatoria
        $rand_row = $rows[array_rand($rows)];
        // variavel da linha sorteada
        $phone = $rand_row['telefone'];
        $phone_r = preg_replace('/\D+/', '', $phone);
          //return $phone_r;        
          echo "<a class='btn btn-primary btn-lg txt-uppercase' id='fazerContato' href='tel:+55$phone_r' target='_blank' rel='noopener' title='Peça seu orçamento por Telefone'>FAZER CONTATO</a>";
        }
        else
        {
          return false;
        } 
      }
      else
      {
        $loja_nome = get_field('loja', $idLoja);
        $content = "<div class='dados-loja'><h3>Filial $loja_nome</h3>";
        $post_content = get_post($idLoja);
        $content .= $post_content->post_content;
        $content .= "</div>";
        if($content)
        {
          echo apply_filters('the_content',$content);
        }
        else
        {
          return false;
        }        
      }      
    }
    elseif($campo=='whatsapp')
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
    elseif($campo=='email')
    {
      $email = 'mailto:';
      $slug = get_post_field( 'post_name', $idLoja );
      $email .= $slug;
      $email .= '@inovegas.com.br';
      if($slug){
        // return $email
        echo "<a class='btn btn-primary btn-lg txt-uppercase' id='fazerContato' href='$email' rel='noopener' title='Peça seu orçamento por E-mail'>FAZER CONTATO</a>";
      }
      else
      {
        return false;
      }
    }
    elseif($campo=='formulario')
    {
      $loja_nome = get_field('loja', $idLoja);
      echo do_shortcode('[contact-form-7 id="48" title="Orçamento" your-loja="$loja_nome"]');
    }
  }
  else
  {
    echo "Não foi possível encontrar a loja. Os campos estão vazios.";
  }
  wp_die();
}
add_action('wp_ajax_consultaLoja','consultaLoja');
add_action('wp_ajax_nopriv_consultaLoja','consultaLoja');
?>
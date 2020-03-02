<?php
function telefoneLoja()
{
  $idLoja = '';
  if(!empty($_POST['idLoja']))
  {
    $idLoja = $_POST['idLoja'];
  }
  if(!empty($idLoja))
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
          echo "<a class='btn btn-primary btn-lg txt-uppercase' id='fazerContato' href='tel:+55$phone_r' target='_blank' title='Peça seu orçamento por Telefone'>FAZER CONTATO</a>";
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
      $tel_rows = get_field('telefones', $idLoja);
      if($tel_rows)        
      {
        $content .= "<p>Telefone Fixo:</p>";
        foreach($tel_rows as $row){
          $phone = $row['telefone'];          
          $content .= "<p>$phone</p>";
        }        
      }
      $cel_rows = get_field('celulares', $idLoja);
      if($cel_rows)
      {
        $content .= "<p>Celular:</p>";
        foreach($cel_rows as $row){
          $phone = $row['celular'];          
          $content .= "<p>$phone</p>";
        }
      }
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
  else
  {
    echo "Não foi possível encontrar a loja. Os campos estão vazios.";
  }
  wp_die();
}
add_action('wp_ajax_telefoneLoja','telefoneLoja');
add_action('wp_ajax_nopriv_telefoneLoja','telefoneLoja');
?>
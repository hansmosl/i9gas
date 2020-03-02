<?php
function listarLojas(){
  
  (isset($_POST['loja']))? $loja = esc_attr($_POST['loja']) : $loja = '';
  
  $disabled = false;
  
  if(empty($loja)){    
    $the_query = new WP_Query( array(
      'post_type'		=> 'page',
      'order'		=>	'ASC',
      'orderby'  => 'name',
      'post_parent' => 16,
    ) );
    
  }else{
    
    $disabled = true;
    $the_query = new WP_Query( array( 'page_id' => $loja ) );
    
  }
  if ($the_query->have_posts()){    
?>
<?php if($disabled==false) { ?>
<p class="lead text-center bottom-0">
  Escolha a Loja mais próxima de você
</p>
<?php } ?>
<p class="texto <?php if($disabled==true) echo 'sr-only'; ?>">
  <label for="loja" class="sr-only">Loja</label>
  <select name="loja" class="form-control" id="loja" aria-required="true" aria-invalid="false">
  <?php if($disabled==false) { ?>
    <option value="">Escolher Loja</option>
  <?php } ?>
<?php
		while($the_query->have_posts()) : $the_query->the_post();
    $titulo = get_field('loja');
    $slug = get_post_field( 'post_title', get_the_ID() );
?>    
		<option value="<?php echo $slug; ?>" data-id="<?php the_id(); ?>"><?php echo $titulo; ?></option>
<?php
    endwhile;
?>
  </select>
</p>
<?php }else{ ?>
  <div class="alert alert-danger text-center">Nenhum conteúdo encontrado.</div>
<?php } ?>
<?php
	wp_die();
}
add_action('wp_ajax_listarLojas','listarLojas');
add_action('wp_ajax_nopriv_listarLojas','listarLojas');
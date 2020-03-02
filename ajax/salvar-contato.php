<?php
function salvarContato(){
    
  global $wpdb;
  
  // Variáveis passadas por AJAX
  
  $telefone = sanitize_text_field( $_POST['telefone'] );
  if ( ! $telefone ) {
    $telefone = '';
  }
  /*
  * Reduzo o String para 15 caso seja superior
  */
  if ( strlen( $telefone ) > 15 ) {
    $telefone = substr( $telefone, 0, 15 );
  }
  
  $nome = sanitize_text_field( $_POST['nome'] );
  if ( ! $nome ) {
    $nome = '';
  }
  $email = sanitize_email( $_POST['email'] );
  if ( ! $email ){
    $email = '';
  }
  $loja = sanitize_text_field( $_POST['loja'] );
  if ( ! $loja ){
    $loja = '';
  }
  $canal = sanitize_text_field( $_POST['canal'] );
  if ( ! $canal ){
    $canal = '';
  }
  
  // Nome da Tabela
  
  $table = $wpdb->prefix.'orcamentos';
  
  // Array com as variáveis
  
  $data = array( 
    'telefone' => $telefone,
    'nome' => $nome, 
    'email' => $email,
    'loja' => $loja,
    'canal' => $canal,
    'data' => current_time( 'mysql' ),
  );
  
  // Adição do registro no banco e verificação
  
  $wpdb->insert($table,$data);
  $status = $wpdb->insert_id;
  echo $status ? 'ok' : var_dump($wpdb);
  
	wp_die();
  
}
add_action('wp_ajax_salvarContato','salvarContato');
add_action('wp_ajax_nopriv_salvarContato','salvarContato');
?>
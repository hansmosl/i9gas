<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
$id = get_the_ID();
$endereco = get_post_meta( $id,'endereco', true );
$telefone = get_post_meta( $id,'telefone', true );
$bandeira = wp_get_post_terms($id, 'bandeira', array("fields" => "all"));
if( !empty( $bandeira ) ) {
	$bandeira_nome = $bandeira[0]->name;
	$bandeira_link = get_term_link( (int) $bandeira[0]->term_id);
}
$locals = get_the_terms( $id, 'local' );
?>

<?php if ( is_page_template( 'tpl-pdv.php' ) OR is_archive() OR is_seacrh() ) : ?>
	
	<?php
		echo '<tr>';
		
		//Impressão das colunas da tabela
		echo '<td><a href="'.get_the_permalink().'">'.get_the_title().'</a></td>';		
	
	if ( $locals && ! is_wp_error( $locals ) ) : 
				$locals_links = array();
				foreach ( $locals as $local ) {
						$locals_links[] = $local->name;
				}
				$on_local = join( ", ", $locals_links );
	?>
		<td class="local"><?php printf( esc_html__('%s'), esc_html( $on_local ) ); ?></td>
	<?php
		endif;
	?>
		
	<?php
		echo '<td class="endereco">'; if ($endereco){ echo $endereco;} echo '</td>';
		//echo '<td class="cidade">'; if ($cidade){ echo '<a href='.$cidade_link.'>'.$cidade_nome.'</a>'; } echo '</td>';
		//echo '<td class="regiao">'; if ($regiao){ echo '<a href='.$regiao_link.'>'.$regiao_nome.'</a>'; } echo '</td>';
		
		echo '</tr>';

		else : ?>
		
<article id="post-<?php echo $id; ?>" <?php post_class(); ?>>	

	<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' );	?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
		
		<?php
			the_content();
		?>

		<?php 
			if( !empty( $bandeira ) ) {
				echo '<dl><dt>Bandeira:</dt><dd><a class="btn btn-sm btn-default" href='.$bandeira_link.'>'.$bandeira_nome.'</a></dd></dl>';
			}
			if ( $locals && ! is_wp_error( $locals ) ) : 
				$locals_links = array();
				foreach ( $locals as $local ) {
						$locals_links[] = $local->name;
				}
				$on_local = join( ", ", $locals_links );
			?>
			<dl><dt>Localização:</dt><dd><?php printf( esc_html__('%s'), esc_html( $on_local ) ); ?></dd></dl>
		<?php
			endif;

			if ($endereco){echo '<dl><dt>Endereço:</dt><dd>'.$endereco.'</dd></dl>';}
			if ($telefone){echo '<dl><dt>Telefone:</dt><dd>'.$telefone.'</dd></dl>';}
		?>

		</div><!-- .entry-content -->
		
</article><!-- #post-## -->

<?php endif; ?>	
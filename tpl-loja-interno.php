<?php
/**
 * Template Name: Loja
 */

get_header();
?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">			

			<div class="row info-lojas">
				
				<div class="col-md-5 col-sm-12">
					<?php if (has_post_thumbnail()){
						echo '<p>';
						the_post_thumbnail('full', ['class' => 'destaque img-responsive responsive--full center-block']);
						echo '</p>';
					}?>
          <?php the_content(); ?>
				</div>
				<div class="col-md-7 col-sm-12 conteudo">					
          <?php get_template_part('formulario', 'orcamento-miniatura'); ?>
				</div>

			</div>

			<div class="row mapa-lojas">
				<div class="geral-mapa"><?php the_field('mapa_lojas'); ?></div>
			</div>

			<a href="javascript:window.history.go(-1)" class="botao-voltar-lojas">Voltar</a>

	</main><!-- #main -->

<?php
get_footer();
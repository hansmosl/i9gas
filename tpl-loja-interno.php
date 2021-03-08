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
          <?php
            if( have_rows('telefones') ){
              echo '<h2>Telefones</h2><ul class="list-inline">';
              while( have_rows('telefones') ) : the_row();
                $phone = get_sub_field('telefone');
                $phone_r = preg_replace('/\D+/', '', $phone);
                echo '<li><a class="btn btn-primary btn-lg txt-uppercase" href="tel:+55'.$phone_r.'" title="Peça seu orçamento por Telefone">'.$phone.'</a></li>';
              endwhile;
              echo "</ul>";
            }else{
              echo '<p>Nenhum telefone cadastrado</p>';
            }
          ?>
          <?php
            if( have_rows('celulares') ){
              echo '<h2>Celulares (WhatsApp)</h2><ul class="list-inline">';
              while( have_rows('celulares') ) : the_row();
                $phone = get_sub_field('celular');
                $phone_r = preg_replace('/\D+/', '', $phone);
                echo '<li><a class="btn btn-primary btn-lg txt-uppercase" href="tel:+55'.$phone_r.'" title="Peça seu orçamento por Telefone">'.$phone.'</a></li>';
              endwhile;
              echo "</ul>";
            }else{
              echo '<p>Nenhum telefone cadastrado</p>';
            }
          ?>           
				</div>
				<div class="col-md-7 col-sm-12 conteudo">					
          <?php get_template_part('formulario', 'orcamento-miniatura'); ?>
				</div>

			</div>
      <?php if(get_field('mapa_lojas')): ?>
			<div class="row mapa-lojas">
				<div class="geral-mapa"><?php the_field('mapa_lojas'); ?></div>
			</div>
      <?php endif; ?> 
			<a href="javascript:window.history.go(-1)" class="botao-voltar-lojas">Voltar</a>

	</main><!-- #main -->

<?php
get_footer();
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" tabindex="-1" role="main">
		<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'content', 'page' );
			endwhile;
		?>    
		
		<?php 
			# Calculadora retirada no momento
			get_template_part( 'section', 'calculadora' );
		?>

		<section class="banner-lojas">
      <div class="container">
      <h2 class="titulo">Conheça nossas lojas</h2>
      <?php 
        $loja_desc = get_field('lojas');
        if($loja_desc):
          echo "<div class='text-center descricao'>$loja_desc</div>";
        endif;
      ?>
      <?php
				$the_query = new WP_Query( array(
					'post_type'		=> 'page',
					'order'		=>	'ASC',
					'orderby'  => 'name',
          'post_parent' => 16,
				) );

				// The Loop
				if ( $the_query->have_posts() ) {
					echo '<div class="row row-flex row-flex-center btn-alinhado">';
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
      ?>
						<div class="col-sm-3 col-xs-6 loja">
						<?php
							$link = get_permalink();
							$titulo = get_field('loja');
							$link.= "?your-loja=$titulo";
							echo "<p><a class='btn btn-primary btn-lg' href='$link'>$titulo</a></p>";
            ?>
						</div>
      <?php				
					endwhile;
					echo '</div>';
					wp_reset_postdata();
				} else {
					// no posts found
				}
			?>
      </div>
		</section>
		
		<section id="gnv" class="vantagens-gnv">
			<div class="container">
				<h2 class="titulo direita"><b>As vantagens</b> do GNV</h2>
				<div class="row no-gutter lista-vantagens">
					<div class="col-sm-3 col-xs-12">
						<div class="icone icone-seguranca"></div>
						<h3>Segurança</h3>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="icone icone-ecologia"></div>
						<h3>Ecologia</h3>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="icone icone-economia"></div>
						<h3>Economia</h3>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="icone icone-desempenho"></div>
						<h3>Desempenho</h3>
					</div>					
				</div>
				<div class='text-center cta-navegacao'>
					<a href="<?php echo get_permalink(12); ?>" title="Acesso a página de notícias" class='btn btn-lg btn-outline'>Tire suas Dúvidas<br> sobre o GNV</a>		
				</div>
			</div><!--container-->
		</section>
		
		<section class="quem-somos">
			<div class="container">
				<div class='row row-flex row-flex-center'>
					<div class='col-sm-6 col-xs-12'>
						<h2 class="titulo esquerda"><b>Quem</b> somos</h2>
						<?php $texto_quemsomos = get_field('quem_somos'); ?>
						<?php if ($texto_quemsomos) {echo "<p>$texto_quemsomos</p>"; } ?>
						<p class='text-right'>
							<a href="<?php the_permalink(10); ?>" title="Mais sobre nossa Empresa" class='btn btn-lg btn-primary'>Continuar Lendo</a>
						</p>
					</div>
					<div class='col-sm-6 col-xs-12'>
					<?php $image = get_field('quem_somos_img');
						if( !empty($image) ): 
					?>					
							<img src="<?php echo $image['url']; ?>" class='img-responsive center-block' alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		
		<section class="onde-abastecer">
			<div class="container">
				<div class='row row-flex row-flex-center'>
					<div class='col-sm-6 col-xs-12'>
						<?php $image = get_field('onde_abastecer_imagem');
							if( !empty($image) ): 
						?>					
								<img src="<?php echo $image['url']; ?>" class='img-responsive center-block' alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
					</div>
					<div class='col-sm-6 col-xs-12'>
						<h2 class="titulo direita"><b>Onde abastecer</b> no Rio</h2>
						<?php $texto_ondeabastecer = get_field('onde_abastecer'); ?>
						<?php if ($texto_ondeabastecer) {echo "<p>$texto_ondeabastecer</p>"; } ?>
						<p class='text-right'>
							<a href="<?php the_permalink(632); ?>" title="Veja onde abastecer seu carro GNV no Rio" class='btn btn-lg btn-primary'>Onde Abastecer</a>
						</p>
					</div>
				</div>
			</div>
		</section>
			
		<section class="ultimas-noticias">
			<div class="container">
				<h2 class="titulo direita"><b>Últimas</b> Notícias</h2>
									
				<?php	
					$args = array(						
						'posts_per_page' => '4',
					);	
					$the_query = new WP_Query( $args );
						
					if ( $the_query->have_posts() ) :	
					echo '<div class="row">';	
						while ( $the_query->have_posts() ) : $the_query->the_post();		
				?>
					<div class="materia col-sm-6 col-xs-12">
						<div class="row row-flex no-gutter">
							<div class="col-sm-6 col-xs-12">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php echo odin_thumbnail( 300, 300, true, 'img-responsive center-block' ); ?>
								</a>
							</div>					
							<div class="col-sm-6 col-xs-12 texto">
									<h3 class='h4'><?php echo odin_excerpt( 'title', 11 ); ?></h3>
									<?php echo odin_excerpt( 'excerpt', 15 ); ?>
									<p class='text-right'>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											Ler mais...
										</a>
									</p>
									<hr>
									<p><?php odin_posted_on(); ?></p>
							</div>
						</div>
					</div>
				<?php				
						endwhile;		
						echo '</div><!--row-->';
						wp_reset_postdata();
					else :	
						get_template_part( 'content', 'none' );
					endif;
				?>
				<div class='text-center cta-navegacao'>
					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" title="Acesso a página de notícias" class='btn btn-lg btn-outline'>Mais Notícias</a>		
				</div>
			</div><!--container-->
		</section>
		
		<?php 
			# SECTION VIDEOS retirada no momento
			# get_template_part( 'section', 'videos' );
		?>
		
	</main><!-- #main -->

<?php
get_footer();

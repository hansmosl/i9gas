<?php
/**
 * Template Name: Empresa
 */
get_header();
?>
	<main id="content" tabindex="-1" role="main">
	
		<div class='container'>
			<h2 class='titulo esquerda'><b>Quem</b> somos?</h2>
			<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
		</div>
		
		<section class="justificativa">
			<div class='container'>
				<h2 class='titulo direita'><b>Porque</b> Inove Gás</h2>
				<?php the_field('justificativa'); ?>
			</div>
		</section>
			
		<section class="missao-visao-valores">
			<div class='container'>
				<div class='row row-flex'>
					<div class='col-sm-4'>
						<h2 class='titulo'><b>Missão</b></h2>
						<?php the_field('missao'); ?>
					</div>
					<div class='col-sm-4 listras'>
						<h2 class='titulo'><b>Visão</b></h2>
						<?php the_field('visao'); ?>
					</div>
					<div class='col-sm-4'>
						<h2 class='titulo'><b>Valores</b></h2>
						<?php the_field('valores'); ?>
					</div>
				</div>
			</div>
		</section>
			
	</main><!-- #main -->

<?php
get_footer();

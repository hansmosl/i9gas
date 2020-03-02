<?php
/**
 * Template Name: Calculadora
 */
get_header('calculadora');
?>
	<main id="content" tabindex="-1" role="main">	
		<div class='container'>
			<h1><?php get_the_title(); ?></h1>
			<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
		</div>
	</main><!-- #main -->
	<?php 
		# Calculadora retirada no momento
		get_template_part( 'section', 'calculadora' );
	?>

<?php
get_footer('calculadora');

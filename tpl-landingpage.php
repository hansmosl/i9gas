<?php
/**
 * Template Name: Landing Page
 */
get_header('lp');
?>
	<main id="content" tabindex="-1" role="main">
	
		<div class='container'>			
			<?php
				while ( have_posts() ) : the_post();          
					the_content();
				endwhile;
			?>
		</div>
		
    <?php
      # Formulário AJAX para pedido de orçamento
      get_template_part('formulario', 'orcamento');
    ?>
			
	</main><!-- #main -->

<?php
get_footer('lp');

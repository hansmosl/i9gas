<?php
/**
 * Template Name: Pontos de Venda
 */
get_header(); ?>

	<main id="content" tabindex="-1" role="main">

	<?php if ( have_posts() ) : ?>
		
		<div class="container">
			<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args = array(
					'posts_per_page' => '20',
					'paged' => $paged,
					'post_type' => 'pdv',
				);
				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {
				
				get_template_part( 'content', 'pdvfiltro' );
			?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Local</th>
						<th>Endereço</th>
						<!--
						<th>Cidade</th>
						<th>Região</th>
						-->
					</tr>
				</thead>
				
				<?php
					
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						
						get_template_part( 'content', 'pdv' );
						
					endwhile;
				?>
				
			</table>
			
				<?php
					/* Restore original Post Data */
					wp_reset_postdata();
				} else {
					// no posts found
				}
							
				// Page navigation.
				echo odin_pagination( 2, 1, false, $the_query );

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>
		</div>
		
	</main><!-- #main -->

<?php
get_footer();

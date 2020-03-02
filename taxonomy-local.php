<?php
get_header(); ?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						echo '<h1 class="page-title">'.get_the_archive_title().'</h1>';
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->
				
				<?php get_template_part( 'content', 'pdvfiltro' ); ?>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Local</th>
							<th>Endereço</th>
						</tr>
					</thead>
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'content', 'pdv' );
					endwhile;
				echo '</table>';
					odin_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;
			?>

	</main><!-- #main -->

<?php
get_footer();

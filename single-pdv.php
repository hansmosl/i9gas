<?php
get_header(); ?>
	<div id="primary" class="<?php echo odin_classes_page_sidebar(); ?>">
		<main id="main-content" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'pdv' );
				endwhile;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();

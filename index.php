<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">		
			<?php
				if ( have_posts() ) :
				$i=0;
					while ( have_posts() ) : the_post();
					$i++;
          $postid = get_the_ID();
			?>
					<article id="post-<?php echo $postid; ?>" <?php post_class(); ?>>
					<?php if ($i % 2 == 0): ?>
						<div class='row row-flex no-gutter'>
              <div class='col-sm-7 col-sm-push-5 col-xs-12'>
								<?php if (has_post_thumbnail() ) { 
                  echo sprintf( '<a href="%s" title="%s" rel="bookmark" class="post-image" style="background-image:url(%s)"><span class="sr-only">%s</span></a>', esc_url( get_permalink() ), get_the_title(), get_the_post_thumbnail_url(), get_the_title());
								} ?>
							</div>
							<div class='col-sm-5 col-sm-pull-7 col-xs-12 texto'>
								<?php
									the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								?>
								<?php the_excerpt(); ?>
								<hr>
								<?php odin_posted_on(); ?>
							</div>							
						</div>
					<?php else: ?>
						<div class='row row-flex no-gutter'>
							<div class='col-sm-7 col-xs-12'>
								<?php if (has_post_thumbnail() ) {
									echo sprintf( '<a href="%s" title="%s" rel="bookmark" class="post-image" style="background-image:url(%s)"><span class="sr-only">%s</span></a>', esc_url( get_permalink() ), get_the_title(), get_the_post_thumbnail_url(), get_the_title());
								} ?>
							</div>
							<div class='col-sm-5 col-xs-12 texto'>
								<?php
									the_title( '<h2 class="h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								?>
								<?php the_excerpt(); ?>
								<hr>
								<?php odin_posted_on(); ?>
							</div>
						</div>
					<?php endif; ?>
					</article><!-- #post-## -->
				<?php
					endwhile;
					odin_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;
			?>
	</main><!-- #content -->

<?php
get_sidebar();
get_footer();

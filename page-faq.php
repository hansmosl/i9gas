<?php /* Template Name: FAQ */ get_header(); ?>

	<main id="content" tabindex="-1" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content">        
        <?php          
          if( get_field('faq') ) {
            echo '<div class="faq">';
            $i=0;
            while( the_repeater_field('faq') ) {
              $i++;
              echo '<h2 class="h3">'.$i.'. '.get_sub_field('pergunta').'</h2><div class="resposta mb-30">'.get_sub_field('resposta').'</div>';
            }
            echo '</div>';
          }
        ?>
        <hr>
        <?php the_content(); ?>
      </div><!-- .entry-content -->
    </article><!-- #post-## -->        
      <?php
				endwhile;
			?>

	</main><!-- #main -->

<?php get_footer();
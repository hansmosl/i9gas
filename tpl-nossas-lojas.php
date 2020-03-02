<?php
/**
 * Template Name: Nossas Lojas
 */

get_header();
?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

			<h2 class='titulo'><b>Uma Inove Gás</b> sempre perto de você</h2>
			<?php
				$the_query = new WP_Query( array(
					'post_type'		=> 'page',
					'order'		=>	'ASC',
					'orderby'  => 'name',
          'post_parent' => 16,
				) );

				// The Loop
				if ( $the_query->have_posts() ) {
					$i=0;
					echo '<div class="row itens-lojas">';
					while ( $the_query->have_posts() ) {
						$i++;
						$the_query->the_post();
            $link = get_permalink();
            $titulo = get_the_title();            
            $PostID = get_the_ID();
            $link.= "?loja=$PostID";            
					?>
						<div class="col-sm-4">
              <div class="caixa-loja">
                <div class="col-xs-5">
                <?php
                  if (has_post_thumbnail() ) {
                    echo odin_thumbnail( 300, 300, '', true, 'img-responsive center-block' );
                  }else{
                    echo '<img src="//inovegas.com.br/site/wp-content/themes/i9gas/assets/images/foto-loja-peq.jpg" alt="Inove Gás">';
                  }
                ?>
                </div>
                <div class="col-xs-7">
                  <p class="nome-loja"><?php echo $titulo; ?></p>
                  <a href="<?php echo $link; ?>" class="link-loja">Veja a loja</a>
                </div>
              </div>
            </div>
						
					<?php
						if ($i % 3 == 0){ echo "</div><div class='row row-flex btn-alinhado'>"; }
					}
					echo '</div>';
					wp_reset_postdata();
				} else {
					// no posts found
				}
			?>

	</main><!-- #main -->

<?php
get_footer();

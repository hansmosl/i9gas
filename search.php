<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header();
if (isset($_GET['post_type'])){
	$post_type = $_GET['post_type'];
}
if ( isset( $post_type ) && locate_template( 'content-' . $post_type . '.php' ) ){ $tem_filtro=1; }
else{
	$tem_filtro=0;
}
?>

	<main id="content" class="<?php if ($tem_filtro==1) { echo odin_classes_page_full(); } else { echo odin_classes_page_sidebar(); } ?>" tabindex="-1" role="main">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'odin' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->			
				
					<?php if ($tem_filtro==1) { ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Local</th>
									<th>Endereço</th>
								</tr>
							</thead>
						<?php } 
						// Start the Loop.
						while ( have_posts() ) : the_post();
							
							// Testamos se a variável $post_type não é vazia e se existe um arquivo de template relacionado a ela.
							if ( $tem_filtro == 1 ) {
								get_template_part( 'content', $post_type );
							}else{
								get_template_part( 'content', get_post_format() );
							}
							
						endwhile;
						
						if ( $tem_filtro == 1 ) { echo '</table>';}
						
						// Post navigation.
						odin_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

				endif;
			?>

	</main><!-- #main -->

<?php
if ( !$tem_filtro == 1 ) { get_sidebar(); }
get_footer();

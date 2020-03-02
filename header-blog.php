<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
	<a id="skippy" class="sr-only sr-only-focusable" href="#content">
		<div class="container">
			<span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span>
		</div>
	</a>

	<header id="header" role="banner">
	<?php if ( is_singular('page') ) : ?>
		<div class="page-header">
			<div class="container">
			<div class="text-center" style='margin-top:30px;'>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Ir para página inicial"><div class='logo'></div></a>
			</div>
			
			<?php if ( is_front_page() ){ ?>
				<h1 class="site-title">
				<?php bloginfo( 'description' ); ?>
				</h1>
			<?php } ?>
			<?php if ( is_singular('page') ){ ?>
				<h1 class="site-title">
					<?php the_title(); ?>
				</h1>
			<?php } ?>
			
			</div><!-- .container-->
			<?php if ( is_front_page() ){ ?>
			<a href="#orcamento" class='seta' title='Veja as Vantagnes do GNV'><span class='sr-only'>Veja as vantagens do GNV</span></a>
			<?php } ?>
		</div><!-- .page-header-->
	<?php else: ?>
		<div class="page-header">
			<div class="container">
			<div class='text-center'><?php odin_the_custom_logo(); ?></div>
			</div><!-- .container-->
		</div><!-- .page-header-->
	<?php endif; ?>
		<div id="main-navigation">
			<button class="menu-fixo" title="Abrir Menu" data-toggle="modal" data-target="#menuModal">
				<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span><br />
				<span class="hidden-xs">MENU</span>
			</button>
			<!-- Contato -->
			<button class="orcamento" title="Entre em Contato" data-toggle="modal" data-target="#orcamentoModal">
				<span class="hidden-xs">
				Solicite seu<br />
				Orçamento
				</span>
				<span class="visible-xs-block glyphicon glyphicon-map-marker" aria-hidden="true"></span>
			</button>
		</div><!-- #main-navigation-->
		
	</header><!-- #header -->
	
	<div class="modal menu fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<span class="sr-only" id="menuModalLabel">Menu do site</span>
				<div class="text-center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>				
				</div>
					<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
		<div class="modal menu fade" id="orcamentoModal" tabindex="-1" role="dialog" aria-labelledby="orcamentoModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<span class="sr-only" id="menuModalLabel">Lojas</span>
				<div class="text-center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>				
				</div>
					<?php 
						// The Query
						$args = array(
							'post_type' => 'loja',
						);
						$the_query = new WP_Query( $args );

						// The Loop
						if ( $the_query->have_posts() ) {
							echo "<ul class='menu row'>";
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								$link = get_permalink(8);
								$titulo = get_the_title();
								$link.= "?your-loja=$titulo";
								echo "<li class='col-sm-4'><a href='$link'>$titulo</a></li>";
							}
							echo '</ul>';
							/* Restore original Post Data */
							wp_reset_postdata();
						} else {
							// no posts found
						}
					?>				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
<?php if( is_front_page() OR is_page_template( 'tpl-gnv.php' ) ) {
	echo "<div id='wrapper'>";
}else{
	echo "<div id='wrapper' class='container'>";
	echo "<div class='row'>";
} ?>
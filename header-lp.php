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
	<?php
	wp_head();
	$odin_codigos = get_option( 'odin_codigos' );
	if( $odin_codigos['codigo_head_fim'] ){ echo $odin_codigos['codigo_head_fim']; }
	?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php if ( $odin_codigos['codigo_body_inicio'] ){ echo $odin_codigos['codigo_body_inicio']; } ?>
	<a id="skippy" class="sr-only sr-only-focusable" href="#content">
		<div class="container">
			<span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span>
		</div>
	</a>

	<header id="header" role="banner">
		
		<div class="page-header">
			<div class="container">
				<div class="text-center" style='margin-top:30px;'>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Ir para página inicial"><div class='logo'></div></a>
          <?php
            $selo = get_field('selo', 4);
            if( !empty($selo) ):
          ?>
          <img src="<?php echo $selo['url']; ?>" alt="<?php echo $selo['alt']; ?>" class="img-responsive selo" />
          <?php endif; ?>
				</div>

				<h1 class="sr-only">
					<?php the_title(); ?>
				</h1>
			</div><!-- .container-->
		</div><!-- .page-header-->	
		
	</header><!-- #header -->	
	<div id="wrapper">
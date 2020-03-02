<?php
/**
 * The template for displaying Search Form.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="search" class="form-control" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search', 'odin' ); ?>" />
	<button type="submit" class="lupa" value="<?php esc_attr_e( 'Search', 'odin' ); ?>"></button>
	
  
</form><!-- /searchform -->

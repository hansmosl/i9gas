<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				if (has_post_thumbnail() ) {
					echo odin_thumbnail( 900, 450, '', true, 'img-responsive center-block' );
				}
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<?php
				if ( 'loja' == get_post_type() ) {
					$telefone = get_field('telefone');
					echo "<p class='telefone'>Telefones: $telefone</p>";
				} ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
			<?php
			if ( 'loja' == get_post_type() ) {
			$inmetro_codigo = get_field('inmetro_codigo');
			$inmetro_link = get_field('inmetro_link');
			if( !empty($inmetro_codigo) && !empty($inmetro_link) ){
				echo"<div class='well'><h3 class='h4'>Veja registro no INMETRO: <a href='$inmetro_link' title='Acesso ao registro na página do inmetro' target='_blank'>$inmetro_codigo</a></h3></div>";
			}}
			?>
		</div><!-- .entry-content -->		
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="data-postagem">
				<?php odin_posted_on(); ?>
				<hr>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
			<span class="cat-links"><?php echo __( 'Posted in:', 'odin' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'odin' ) ); ?></span>
		<?php endif; ?>
		<?php the_tags( '<span class="tag-links">' . __( 'Tagged as:', 'odin' ) . ' ', ', ', '</span>' ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'odin' ), __( '1 Comment', 'odin' ), __( '% Comments', 'odin' ) ); ?></span>
		<?php endif; ?>
	</footer>
</article><!-- #post-## -->

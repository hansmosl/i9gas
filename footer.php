<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<?php if(
		is_front_page() OR
		is_page_template( 'tpl-gnv.php' ) OR
		is_page_template( 'tpl-empresa.php' ) OR
		is_page_template( 'tpl-pdv.php' ) OR
    is_page_template( 'page-orcamento.php' )
	){
	echo "</div><!--#wrapper-->";
}else{
	echo "</div><!-- .row -->";
	echo "</div><!-- #wrapper -->";
} ?>

	<footer id="footer" role="contentinfo">
		<div class="container-fluid">			
			<?php                       
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu',
								'depth'          => 1,
								'container'      => false,
								'menu_class'     => 'list-inline',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Ir para página inicial" class='text-center'><div class='logo'></div></a></p>
			<div class='row'>
				<div class='col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3'>
					<div class='row'>
						<div class='col-xs-6'>
							<p><div class='mat'></div></p>
							
							    <ul class='list-inline'>
							    <li><a href="https://pt-br.facebook.com/inovegasgnv/" class="facebook-icone" target="_blank"><span class="sr-only">Facebook</span></a></li>
							    <li><a href="https://www.instagram.com/inovegas/" class="instagram-icone" target="_blank"><span class="sr-only">Instragram</span></a></li>
                  <li><a href="https://www.youtube.com/channel/UCaNdpLdeiEsh95FgdxVhyHA" class="youtube-icone" target="_blank"><span class="sr-only">IouTube</span></a></li>
                  <li><a href="https://www.linkedin.com/company/inovegas" class="linkedin-icone" target="_blank"><span class="sr-only">Linkedin</span></a></li>
							    </ul></p>
						</div>
						<div class='col-xs-6 cartoes'>
							<p>Aceitamos Cartões</p>
							<div class='row no-gutter'>
								<div class='col-xs-6 credito'>
									<p><small>Crédito</small></p>
									<img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cartao-visa.png' alt='VISA' width='32px' />
									<img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cartao-mastercard.png' alt='Master Card' width='32px' />
								</div>
								<div class='col-xs-6 debito'>
									<p><small>Débito</small></p>
									<img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cartao-cielo.png' alt='Cielo' width='32px' />
									<img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cartao-maestro.png' alt='Maestro' width='32px' />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #footer -->
  

	<?php wp_footer(); ?>
</body>
</html>

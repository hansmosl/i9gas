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
  </div><!--#wrapper-->
  
	<footer id="footer" role="contentinfo">
		<div class="container-fluid">						
			<div class='row'>
				<div class='col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3'>
					<div class='row'>
						<div class='col-xs-6'>
							<p><div class='mat'></div></p>
							
							    <ul class='list-inline'>
							    <li><a href="https://pt-br.facebook.com/inovegasgnv/" class='facebook-icone'><span class='sr-only'>Facebook</span></a></li>
							    <li><a href="https://www.instagram.com/inovegas/" class='instagram-icone'><span class='sr-only'>Instragram</span></a></li>
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

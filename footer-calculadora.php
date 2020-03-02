</div><!--#wrapper-->
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
						<p><a href="https://pt-br.facebook.com/inovegasgnv/" class='facebook-icone'><span class='sr-only'>Facebook</span></a></p>
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
		<p>Desenvolvido por: <a class='fizzy' href='http://fizzymarketingdigital.com.br' target='_blank' title='Conheça nosso site'><span class='sr-only'>Fizzy 360º</span></a></p>
	</div>
</footer><!-- #footer -->
<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Template Name: GNV
 */
get_header();
?>
	<ul class='menu-fixo-gnv'>
		<li>
			<a href="#vantagens">
				<div class='icone icone-p icone-vantagens-p'></div>
				<span class='hidden-xs'>VANTAGENS DO GNV</span>
			</a>
		</li>
		<li>
			<a href="#perguntas">
				<div class='icone icone-p icone-perguntas-p'></div>
				<span class='hidden-xs'>PERGUNTAS FREQUENTES</span>				
			</a>
		</li>
		<li>
			<a href="#seguranca">
				<div class='icone icone-p icone-seguranca-p'></div>
				<span class='hidden-xs'>O GNV É SEGURO?</span>
			</a>
		</li>
	</ul>

	<main id="content" tabindex="-1" role="main">
	
		<div class='container'>
			<h2 class='titulo'><b>Saiba mais</b> sobre o GNV</h2>
			<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
		</div>
		
		<section id="vantagens" class="vantagens">
			<div class='container'>
				<h2 class='titulo'><b>As vantagens</b> do GNV</h2>
				<?php the_field('gnv_vantagens'); ?>
			</div>
		</section>
			
		<section id="perguntas" class="perguntas">
			<div class='container'>
				<h2 class='titulo'><b>Perguntas</b> Frequentes</h2>
				<?php the_field('gnv_perguntas'); ?>
			</div>
		</section>
		
		<section id="seguranca" class="seguranca">
			<div class='container'>
				<h2 class='titulo'><b>O GNV</b> é seguro?</h2>
				<?php the_field('gnv_seguranca'); ?>
			</div>
		</section>
			
	</main><!-- #main -->

<?php
get_footer();

<?php
/**
 * Modelo de Exibição do Filtro para Pontos de Venda
 */
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#main_cat').change(function() {
		var mainCat = $('#main_cat').val();

		// call ajax
		$("#sub_cat").empty();
		$.ajax({
			url:"<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&main_catid=' + mainCat,
			success:function(results){
				$("#sub_cat").removeAttr("disabled");
				$("#sub_cat").append(results);
			}
		});
	});
});
</script>
<form method="get" id="searchform-pdv" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

<div class='row'>

	<div class='col-sm-10'>
	
		<div class='row'>
		
			<div class='col-sm-6'>
				<div class="form-group">
					<label for="s">Busca</label>
					<input type="search" class="form-control" style='width:100%;' name="s" id="s" placeholder="Busca" />
					<input type="hidden" value="pdv" name="post_type" />
				</div>
			</div><!--.col-sm-6-->
			
			<div class='col-sm-3'>
				<label for="local">Cidade</label>
				<div class="input-group">
					<span class="input-group-addon"><span class='glyphicon glyphicon-filter'></span></span>
					<?php 
							$args = array(
								'show_count' => 0,
								'selected'	=> -1,
								'hierarchical' => 1,
								'child_of' => 9,
								'depth' => 1,
								'hide_empty' => 1,
								'exclude' => 1,
								'show_option_none' => 'Cidade',
								'id' => 'main_cat',
								'class' => 'form-control',
								'name' => 'main_cat',
								'taxonomy' => 'local',
							);
						 wp_dropdown_categories($args);
						?>
				</div><!--.input-group-->
			</div><!--.col-sm-3-->
			
			<div class='col-sm-3'>
				<label for="cidade">Bairro</label>
				<div class="input-group">
					<span class="input-group-addon"><span class='glyphicon glyphicon-filter'></span></span>
					<select class="form-control" name="local" id="sub_cat" disabled="disabled"></select>
				</div><!--.input-group-->
			</div><!--.col-sm-3-->
			
		</div><!--.row-->	
		
	</div><!--.col-sm-10-->		
		
	<div class='col-sm-2'>
		<button type="submit" class="btn btn-primary" style='margin-top:28px;'><span class="glyphicon glyphicon-search"></span><span class="sr-only"><?php esc_attr_e( 'Search', 'odin' ); ?></span></button>	
	</div><!--.col-sm-2-->
		
	</div><!--.row-->
</form>
<hr>

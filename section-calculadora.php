<section class="calculadora">
	<div class="container">
		<h2 class="titulo"><b>Faça os</b> Cálculos</h2>
		
		<div class="collapse" id="exibeTotal">
			<div class='col-md-6 col-md-offset-3 text-center'>
				<div class='well'>
					<p class='text-right'>
						<button class='close' data-toggle="collapse" href="#exibeTotal" aria-expanded="true" aria-controls="exibeTotal">X</button>
					</p>
					<h3>Gasto Mensal <small>(em Reais)</small></h3>
					<ul class='list-inline'>
						<li>
							<label for='economiaGasolina'>Gasolina/Álcool:
								R$ <output name='economiaGasolina' id='economiaGasolina' placeholder='00,00'></output>
							</label>
						</li>
						<li>
							<label for='economiaGnv'>Gás Natural:
								R$ <output name='economiaGnv' id='economiaGnv' placeholder='00,00'></output>
							</label>
						</li>
					</ul>
					<div class='text-center'>
						<p>Em um ano você economizaria:</p>
						<p class='lead destaque'>R$ <output name='economiaTotal' id='economiaTotal' placeholder='00,00'></output> (+ desconto no IPVA)</p>
					</div>
					<p>Obs: Cálculo com base em 10km/litro de consumo de combustível líquido ou 12km/m³ de GNV.</p>
				</div>
			</div>
		</div>
		
		<?php
			$formulario = get_field('calculadora_formulario');
			if ($formulario):
		?>
		<div class='row borda'>
			<div class='col-sm-6 news'>
				<h3>Seus Dados</h3>
				<?php echo $formulario; ?>
			</div>
			<div class='col-sm-6'>
					<h3>Preços dos combustíveis</h3>
					<div class='row'>
						<div class='form-group col-sm-6'>
							<label for='precoGasolina'>Gasolina:</label>
							<input type='number' id='precoGasolina' class='form-control' step='0.1' min='1' max='99' value='4' placeholder='4,10' />
						</div>
						<div class='form-group col-sm-6'>
							<label for='precoGnv'>Gás Natural:</label>
							<input type='number' id='precoGnv' class='form-control' step='0.1' min='1' max='99' value='2' placeholder='1,99' />
						</div>
					</div>
					<h3>Quantos KM você faz por mês?</h3>
					<div class='form-group'>
						<label for='distancia'>Km / Mês:</label>
						<input type='number' id='distancia' class='form-control' />
					</div>
			</div>
		</div>
		
	<?php else: ?>
	
			<div class='col-md-6 col-md-offset-3'>
					<h3>Preços dos combustíveis</h3>
					<div class='row'>
						<div class='form-group col-sm-6'>
							<label for='precoGasolina'>Gasolina:</label>
							<input type='number' id='precoGasolina' class='form-control' step='0.1' min='1' max='99' value='4' placeholder='0,00' />
						</div>
						<div class='form-group col-sm-6'>
							<label for='precoGnv'>Gás Natural:</label>
							<input type='number' id='precoGnv' class='form-control' step='0.1' min='1' max='99' value='2' placeholder='0,00' />
						</div>
					</div>
					<h3>Quantos KM você faz por mês?</h3>
					<div class='form-group'>
						<label for='distancia'>Km / Mês:</label>
						<input type='number' id='distancia' class='form-control' />
					</div>
					<p class='text-right'>
						<button class='botao btn btn-success btn-lg' data-toggle="collapse" href="#exibeTotal" aria-expanded="false" aria-controls="exibeTotal">CALCULAR</button>
					</p>
			</div>
		
	<?php endif; ?>
	
	</div>
</section>
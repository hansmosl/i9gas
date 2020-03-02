function real (value,simbolo) {
    var n = isNaN(value) == false ? parseFloat(value) : parseFloat(value.replace("R$", "").replace(".", "").replace(",", "."));
    var c = 2;
    var d = ',';
    var t = '.';
    var s, i, j;
    c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    if(simbolo === true) {
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }
    return 'R$ ' + s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
function  float(value) {
	var n = isNaN(value) == false ? parseFloat(value) : parseFloat(value.replace("R$", "").replace(".", "").replace(",", "."));
    return n;
}

jQuery(document).ready(function($) {
	$('.botao').click(function(){
		var precoGasolina = $('#precoGasolina').val();
		var precoGnv = $('#precoGnv').val();
		var distancia = $('#distancia').val();
		var rendimentoGasolina = 10;
		var rendimentoGnv = 15;
		var periodo = 12;
		var totalGasolina = precoGasolina*(distancia/rendimentoGasolina);
		var totalGnv = precoGnv*(distancia/rendimentoGnv);
		var totalEconomizado = (totalGasolina-totalGnv)*periodo;
		//alert(totalEconomizado);
			$('#economiaGasolina').val( real ( totalGasolina,true ) );
			$('#economiaGnv').val(real ( totalGnv,true ) );
		$('#economiaTotal').val( real ( totalEconomizado,true ) );
		$('#exibeTotal').collapse();
	})
	
	$("section.calculadora form.mailpoet_form").each(function() { 
		var jqForm = $(this);
		var jsForm = this;
		var action = jqForm.attr("action");
		jqForm.submit(function(event) { // quando alguem envia o formulario
			//event.preventDefault(); // nao envia ainda
			// dispara evento de Conversão
			ga("send", "event", "form", "submit", "calculadora-home");
			//Começa calculadora
			var precoGasolina = $('#precoGasolina').val();
			var precoGnv = $('#precoGnv').val();
			var distancia = $('#distancia').val();
			var rendimentoGasolina = 10;
			var rendimentoGnv = 12;
			var periodo = 12;
			var totalGasolina = precoGasolina*(distancia/rendimentoGasolina);
			var totalGnv = precoGnv*(distancia/rendimentoGnv);
			var totalEconomizado = (totalGasolina-totalGnv)*periodo;
			$('#economiaGasolina').val( real ( totalGasolina,true ) );
			$('#economiaGnv').val(real ( totalGnv,true ) );
			$('#economiaTotal').val( real ( totalEconomizado,true ) );
			//Exibe resultado
			$('#exibeTotal').collapse();
			/*
			setTimeout(function() { // esperar 300 milisegundos
				jsForm.submit(); // ... termina envio do formulario
			},300);
			*/
		});
	});
});




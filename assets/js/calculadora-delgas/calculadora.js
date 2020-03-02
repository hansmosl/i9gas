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
function calcular(){
	var a={gasolina:10,gnv:13},b=document.getElementById("cal-gasolina").value,c=document.getElementById("cal-gnv").value,d=document.getElementById("cal-rodados").value.replace(".","");
	if(w=document.getElementById("cal-nome").value,x=document.getElementById("cal-email").value,""==w?document.getElementById("cal-help-nome").innerHTML="O campo nome nÃ£o pode estar vazio":document.getElementById("cal-help-nome").innerHTML="",""==x?document.getElementById("cal-help-email").innerHTML="O campo e-mail nÃ£o pode estar vazio":document.getElementById("cal-help-email").innerHTML="",""!=d&&""!=w&&""!=x){b=""!=b?float(b):3.89,c=""!=c?float(c):2.24,d=float(d),b=d/a.gasolina*b,c=d/a.gnv*c;var e=12*(b-c);document.getElementById("cal-resultado-gnv").value=real(c),document.getElementById("cal-resultado-gasolina").value=real(b),document.getElementById("cal-resultado-total").innerHTML=real(e)}}


(function($){
	if($('div.calculadora .cal-container button.botao').length) {
		if ((typeof mask !== 'undefined' && $.isFunction(mask))==false) {

    		var jqueryMask = "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.min.js";

            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = jqueryMask;
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
		}
		if(typeof RdIntegration != 'function'){
			var rdstation = "https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js";

            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = rdstation;
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);	
		}
		
		$('div.calculadora .cal-container button.botao').on('click',function(e){
			var form = $('div.calculadora .cal-container');
			var inputNome = form.find('input[name="nome"]');
			var inputEmail = form.find('input[name="email"]');
			var TOKEN = '896b53de5ca0e1ad834ac0fe733afbd8'; // token de exemplo
 			var data_array = [
			    { name: 'email', value: inputEmail.val() },
			    { name: 'identificador', value: 'calculadora-delgas' },
			    { name: 'nome', value: inputNome.val() },
			    { name: 'token_rdstation', value: TOKEN }
			  ];
			  if(inputNome != '' && inputEmail != '') {
			  RdIntegration.post(data_array);	
			  }
			  

			e.preventDefault();
			calcular();
		});
	}
    if($('div#mapa.calcular-rota').length) {
		// var key = 'AIzaSyCNTcTiafAcfwMB4GPH4ejB-h8skJT3-Ag';
		var key = 'AIzaSyDk6CIHTwfFRl6EAO0_PAKJwMkjLXU4FVU';
        if (typeof google == 'undefined') $.getScript('https://maps.googleapis.com/maps/api/js?key='+key+'&libraries=places', function(){
            //Stuff to do after someScript has loaded
            initMap();
        });

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };


        var initMap = function() {
        	$('.resultContainer').hide();
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('et_pb_contact_origem_1')),
                {types: ['geocode']});
            autocomplete2 = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('et_pb_contact_destino_1')),
                {types: ['geocode']});
            var map = new google.maps.Map(document.getElementById('mapa'), {
                zoom: 12,
                center: {lat: -22.916995, lng: -43.2461641}
            });
            directionsDisplay.setMap(map);

            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            };
            $('button.et_pb_contact_submit').on('click',function(e){
            	e.preventDefault();
            	onChangeHandler();
			})
            // document.getElementById('start').addEventListener('change', onChangeHandler);
            // document.getElementById('end').addEventListener('change', onChangeHandler);
        }

        var calculateAndDisplayRoute = function (directionsService, directionsDisplay) {
            directionsService.route({
                origin: $('#et_pb_contact_origem_1').val(),
                destination: $('#et_pb_contact_destino_1').val(),
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);

                    var route = response.routes[0];
                    setResult(route.legs[0].start_address,route.legs[0].end_address,route.legs[0].distance);
                } else {
                    window.alert('Nenhum resultado foi encontrado');
                }
            });
        }

        var setResult = function(from,to,distance) {
        	var from = from.split(',');
        	var to = to.split(',');
        	$('.resultText').html(from[0] + ' X ' + to[0])
            $('.resultKm').html(distance.text)
			var gas = ((distance.value/1000)/10) * 4.10;
			var gnv = ((distance.value/1000)/13) * 1.89;
			$('.resultGas').html(real(gas, 'R$ '));
			$('.resultGnv').html(real(gnv,'R$ '));
            $('.resultContainer').slideDown('slow');
            $('html, body').animate({
                scrollTop: $('.resultContainer').offset().top
            }, 2000);
		}
    }
})(jQuery)

(function($){
	/***************************
	* Listagem de Lojas
	***************************/
  
	/*
	* Requisição de listagem de posts (rlp)
	*/
	var rlp = null;
	
	var listarLojasAjax = function(loja){
		
		rlp = $.ajax({
			url: wp.ajaxurl,
			type: 'POST',
			data: {
				action: 'listarLojas',
        loja: loja
			},
			/*
			* O beforeSend permite exibir conteúdo antes do fim da requisição
			* como uma mensagem de loading.
			*/
			beforeSend: function(){
				$('#ajax-loading').removeClass('d-none');
				if (rlp != null) {
					rlp.abort();
					rlp = null;
				}
			}
		})
		.done(function(resposta){
			$('#ajax-error').addClass('d-none');
			$('#ajax-loading').addClass('d-none');
			$('#passo2').html(resposta);
      // Incluo botão desabilitado
      $('#passo3').html('<button class="btn btn-primary btn-lg txt-uppercase" disabled="disabled">Fazer Contato</button>');
      // Oculto Formulário
      $('#canalFormulario').addClass('d-none');
		})
		.fail(function(){
      $('#ajax-error').html('<p>Nao foi possível recuperar a lista de Lojas</p>');
			$('#ajax-error').removeClass('d-none');
		})
	}
    
	/***************************
	* Salvar Contato
	***************************/
	
	var telefone = '';
  var nome = '';
  var email = '';
  var loja = '';
	var canal = '';
	/*
	* Requisição de listagem de posts (rlp)
	*/
	var rlp = null;
	
	var salvarContatoAjax = function(telefone, nome, email, loja, canal){
		
		rlp = $.ajax({
			url: wp.ajaxurl,
			type: 'POST',
			data: {
				action: 'salvarContato',
				telefone: telefone,
				nome: nome,
				loja: loja,
        canal: canal
			},
			/*
			* O beforeSend permite exibir conteúdo antes do fim da requisição
			* como uma mensagem de loading.
			*/
			beforeSend: function(){
				$('#ajax-loading').removeClass('d-none');
				if (rlp != null) {
					rlp.abort();
					rlp = null;
				}
			}
		})
		.done(function(resposta){
			$('#ajax-loading').addClass('d-none');
      $('#ajax-error').addClass('d-none');
		})
		.fail(function(){
      /*			
      $('#ajax-error').html('<p>Não foi possível salvar o Contato.</p>');
			$('#ajax-error').removeClass('d-none');
      */
		})
	}
  
	/***************************
	* Consultar Email da Loja
	***************************/
	
	var idLoja = '';
  var telefone = '';
	/*
	* Requisição de Email da Loja (rel)
	*/
	var rel = null;
	
	var emailLojaAjax = function(idLoja, telefone){
		
		rel = $.ajax({
			url: wp.ajaxurl,
			type: 'POST',
			data: {
				action: 'emailLoja',
				idLoja: idLoja,
        telefone: telefone
			},
			/*
			* O beforeSend permite exibir conteúdo antes do fim da requisição
			* como uma mensagem de loading.
			*/
			beforeSend: function(){
				$('#ajax-loading').removeClass('d-none');
				if (rel != null) {
					rel.abort();
					rel = null;
				}
			}
		})
		.done(function(resposta){
		})
		.fail(function(){			      
      $('#ajax-error').html('<p>Ocorreu um erro em sua solicitação. Por gentileza notifique nosso sistema de suporte <a href="mailto:contato@inovegas.com.br" title="Enviar e-mail">por aqui</a>.</p>');
			$('#ajax-error').removeClass('d-none');      
		})
	}
  
	/*****************************
	* Consultar WhatsApp da Loja
	*****************************/
	
	var idLoja = '';
	/*
	* Requisição de WhatsApp da Loja (rzl)
	*/
	var rzl = null;
	
	var zapLojaAjax = function(idLoja){
		
		rzl = $.ajax({
			url: wp.ajaxurl,
			type: 'POST',
			data: {
				action: 'zapLoja',
				idLoja: idLoja
			},
			/*
			* O beforeSend permite exibir conteúdo antes do fim da requisição
			* como uma mensagem de loading.
			*/
			beforeSend: function(){
				$('#ajax-loading').removeClass('d-none');
				if (rzl != null) {
					rzl.abort();
					rzl = null;
				}
			}
		})
		.done(function(resposta){
			$('#ajax-loading').addClass('d-none');
      $('#passo3').html(resposta);
      $('#passo4').html('');
		})
		.fail(function(){			      
      $('#ajax-error').html('<p>Ocorreu um erro em sua solicitação. Por gentileza notifique nosso sistema de suporte <a href="mailto:contato@inovegas.com.br" title="Enviar e-mail">por aqui</a>.</p>');
			$('#ajax-error').removeClass('d-none');      
		})
	}  
  
	/*****************************
	* Consultar Telefones da Loja
	*****************************/
	
	var idLoja = '';
	/*
	* Requisição de telefon da Loja (rtl)
	*/
	var rtl = null;
	
	var telefoneLojaAjax = function(idLoja){
		
		rtl = $.ajax({
			url: wp.ajaxurl,
			type: 'POST',
			data: {
				action: 'telefoneLoja',
				idLoja: idLoja
			},
			/*
			* O beforeSend permite exibir conteúdo antes do fim da requisição
			* como uma mensagem de loading.
			*/
			beforeSend: function(){
				$('#ajax-loading').removeClass('d-none');
				if (rtl != null) {
					rtl.abort();
					rtl = null;
				}
			}
		})
		.done(function(resposta){
			$('#ajax-loading').addClass('d-none');
      
      if ((screen.width < 480) || (screen.height < 480))
      {        
        $('#passo3').html(resposta);
        $('#passo4').html('');
      }
      else
      {
        $('#passo4').html(resposta);
        $('#passo3').html('<button class="btn btn-primary btn-lg txt-uppercase">Fazer Contato</button>');
      }                
		})
		.fail(function(){			      
      $('#ajax-error').html('<p>Ocorreu um erro em sua solicitação. Por gentileza notifique nosso sistema de suporte <a href="mailto:contato@inovegas.com.br" title="Enviar e-mail">por aqui</a>.</p>');
			$('#ajax-error').removeClass('d-none');      
		})
	}
  
	/***************************
	* Notificar Callcenter
	***************************/
	
  var telefone = '';
	/*
	* Requisição de Email do Callcenter (rec)
	*/
	var rec = null;
	
	var emailCallcenterAjax = function(telefone){
		
		rec = $.ajax({
			url: wp.ajaxurl,
			type: 'POST',
			data: {
				action: 'emailCallcenter',
        telefone: telefone
			},
			/*
			* O beforeSend permite exibir conteúdo antes do fim da requisição
			* como uma mensagem de loading.
			*/
			beforeSend: function(){
				$('#ajax-loading').removeClass('d-none');
				if (rel != null) {
					rel.abort();
					rel = null;
				}
			}
		})
		.done(function(resposta){
		})
		.fail(function(){			      
      $('#ajax-error').html('<p>Não foi possível notificar nosso callcenter de seu pedido de orçamento. Por gentileza notifique nosso sistema de suporte <a href="mailto:contato@inovegas.com.br" title="Enviar e-mail">por aqui</a>.</p>');
			$('#ajax-error').removeClass('d-none');      
		})
	}  

  /*
  * Limpando campos no carregamento da página
  */
  
  $('#telefone').val('');
  $('#canalAtendimento input:checked').attr('checked', false);
  
     
  /*Seleção de um canal de atendimento*/
  
  $('#canalAtendimento input').click(function(){
    
    let telefone = $('#telefone').val();
    
    telLength = telefone.length;
    
    // Verifico se telefone está vazio
    
    if (telLength==0 || telLength<14)
    {
      $('#telefone').parent().addClass('has-error');
      $('#telefoneMensagem').html('Não esqueça de inserir seu número de telefone');  
    }
    else
    {
      $('#telefone').parent().removeClass('has-error');
      $('#telefoneMensagem').html('');  
      let nome = '';
      let email = '';
      let loja = '';
      let canal = '';
      canal = $(this).val();
      
      // Salvo o telefone no Banco de Dados
      salvarContatoAjax(telefone, nome, email, loja, canal);
      
      // Condicional para loja foi informada na URL
      var url_string = window.location.href;
      var url = new URL(url_string);
      var lojaParam = url.searchParams.get("loja");
      
      emailCallcenterAjax(telefone);
      
      if(lojaParam === "")
      {
        listarLojasAjax();        
      }
      else
      {
        listarLojasAjax(lojaParam);        
        var idLoja = '';
        idLoja = lojaParam;
        // Capturar número de telefone da Loja
        if(canal == 'telefone')
        {
          telefoneLojaAjax(idLoja);
        }
        // Capturar número de WhatsApp da Loja
        else if(canal == 'whatsapp')
        {
          zapLojaAjax(idLoja);
        }
        // Carregar formulário de Contato
        else if(canal == 'email')
        {
          setTimeout(
          function() 
          {            
            $('#passo3').html('');
            $('#canalFormulario').removeClass('d-none');
            let telefone = $('#telefone').val();
            let loja = $('#loja').val();
            $('#canalFormulario #cf7telefone').val(telefone);
            $('#canalFormulario #cf7loja').val(loja).change();
          }, 2000);
          
        }
        else
        {
          console.log('Não foi possível determinar o Canal selecionado');
        }        
        
      }      
      // Meta Evento
      ga( 'gtag_UA_69845920_1.send', 'event', 'orcamento', 'pre-envio', 'captura-telefone' );           
      
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        'event': 'orcamentoPreEnvio'
      })
      
    }
    
  })
  
  /* Seleção de uma Loja */
  
  $('body').on('change', '#loja', function(){
    var idLoja = '';
    idLoja = $(this).find(':selected').attr('data-id');
    
    let canal = '';
    canal = $('#canalAtendimento input:checked').val();
    
    let loja = '';
    loja = $(this).find(':selected').val();
           
    // Capturar número de telefone da Loja
    if(canal == 'telefone')
    {
      telefoneLojaAjax(idLoja);
    }
    // Capturar número de WhatsApp da Loja
    else if(canal == 'whatsapp')
    {
      zapLojaAjax(idLoja);
    }
    // Carregar formulário de Contato
    else if(canal == 'email')
    {
      console.log('canal é email');
      $('#passo3').html('');
      $('#canalFormulario').removeClass('d-none');
      let telefone = $('#telefone').val();
      let loja = $('#loja').find(':selected').val();
      $('#canalFormulario #cf7telefone').val(telefone);
      $('#canalFormulario #cf7loja').val(loja).change();
    }
    else
    {
      console.log('Não foi possível determinar o Canal selecionado');
    }
  })
  
  /* Interação com #passo3 .btn */
  $('body').on('click touch', '#passo3 .btn', function(){
    
    // Salvo Contato no Banco de Dados
    let nome = '';
    let email = '';
    let telefone = $('#telefone').val();
    let canal = $('#canalAtendimento input:checked').val();    
    let loja = $('#loja').find(':selected').val();
    let idLoja = $('#loja').find(':selected').attr('data-id');
    
    salvarContatoAjax(telefone, nome, email, loja, canal);   
    
    if(canal != 'email'){      
      emailLojaAjax(idLoja, telefone);
    }
    
    $('#orcamentoGroup').addClass('d-none');        
    $('#ajax-loading').addClass('d-none');
    
    /*
    * Mensagem de sucesso
    */
    $('#orcamentoEnviado').removeClass('d-none');
    
    /*    
    var urlSucesso = 'http://www.inovegas.com.br/solicitacao-realizada/';
    location.replace(urlSucesso);
    */

    // Meta Evento    
    ga( 'gtag_UA_69845920_1.send', 'event', 'orcamento', 'envio', canal );
    ga( 'gtag_UA_69845920_1.send', 'event', loja, canal );
    gtag('event', 'conversion', {'send_to': 'AW-896596391/lPKnCLqLiKMBEKfzw6sD'});
    
    
    /*
    
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
      'event': 'orcamentoEnviado',
      'canal': canal
    })    
    */
    
  })
    
  document.addEventListener( 'wpcf7mailsent', function( event ) {
      
      // Salvo Contato no Banco de Dados
      let nome = $('#nome').val();
      let email = $('#email').val();
      let telefone = $('#telefone').val();
      let canal = $('#canalAtendimento input:checked').val();    
      let loja = $('#loja').find(':selected').val();
      
      salvarContatoAjax(telefone, nome, email, loja, canal);
      
      // Meta Evento
      ga( 'gtag_UA_69845920_1.send', 'event', 'orcamento', 'envio', canal );
      ga( 'gtag_UA_69845920_1.send', 'event', loja, canal );
      gtag('event', 'conversion', {'send_to': 'AW-896596391/lPKnCLqLiKMBEKfzw6sD'});
      /*
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        'event': 'orcamentoEnviado',
        'canal': canal
      })
      */
      $('#canalFormulario').addClass('d-none');
      $('#orcamentoGroup').addClass('d-none');
      
      
    /*
    * Mensagem de sucesso
    */
    $('#orcamentoEnviado').removeClass('d-none');        
    /*
    var urlSucesso = 'http://www.inovegas.com.br/solicitacao-realizada/';
    location.replace(urlSucesso);
    */  
  }, false );
  
  /*Reset de formulário*/
  $('#orcamentoRestart').click(function(){
    
    location.reload('');
       
  })
  
  /*Máscara de telefone*/  
  $("input.telefone")
  .mask("(99)9999-9999?9")
  .focusout(function (event) {  
      var target, phone, element;  
      target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
      phone = target.value.replace(/\D/g, '');
      element = $(target);  
      element.unmask();  
      if(phone.length > 10)
      {  
        element.mask("(99)99999-999?9");  
      }
      else
      {  
        element.mask("(99)9999-9999?9");  
      }  
  });  

})(jQuery);
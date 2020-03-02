(function($){
  
  //$('#orcamentoForm')[0].reset();
  
     
  /*Seleção de um canal de atendimento*/
  $('#canalAtendimento input').click(function(){ 
    let canal = '';  
    canal = $(this).val();
    if(canal == 'telefone'){
      $('#passo2').text('Telefone');
    }else if(canal == 'whatsapp'){
      $('#passo2').text('Zap');
    }else if(canal == 'email'){
      $('#passo2').text('E-mail');
    }else if(canal == 'formulario'){
      $('#passo2').text('Formulário');
    }else{
      /*nada*/
    }
    $(this).one(function(){
      $('#selecionarLoja').toggleClass('d-none');
    })
  })
  
  /*Submissão de formulário*/
  $('#orcamentoForm').submit(function(e){
    e.preventDefault();
    $(this).toggleClass('d-none');
    $('#orcamentoEnviado').toggleClass('d-none');
  })
  
  /*Reset de formulário*/
  $('#orcamentoRestart').click(function(){
    $('#orcamentoEnviado').toggleClass('d-none');
    //$('#orcamentoForm')[0].reset();
    $('#orcamentoForm').toggleClass('d-none');
  })
  
  /*Máscara de telefone*/  
  $("input.telefone")
  .mask("(99) 9999-9999?9")
  .focusout(function (event) {  
      var target, phone, element;  
      target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
      phone = target.value.replace(/\D/g, '');
      element = $(target);  
      element.unmask();  
      if(phone.length > 10) {  
          element.mask("(99) 99999-999?9");  
      } else {  
          element.mask("(99) 9999-9999?9");  
      }  
  });  
})(jQuery)

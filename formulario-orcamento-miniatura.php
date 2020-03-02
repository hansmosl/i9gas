<?php $formulario_chamada = get_field('formulario_chamada', 'option'); ?>
<div id="orcamento" class="mini">
    
  <h2 class="titulo"><b>Vamos te ajudar a escolher</b><br> o melhor kit gás para o seu carro</h2>
    
  <div id="orcamentoGroup" class="pedido-orcamento">
    <p class="lead text-center bottom-0">
      Fale com um de nossos especialistas
    </p>
    <p class="texto">
      <label for="telefone" class="sr-only">Seu telefone</label>
      <input type="tel" name="telefone" value="" maxlength="11" class="form-control telefone" id="telefone" aria-required="true" aria-invalid="false" aria-describedby="telefoneMensagem" placeholder="Digite seu DDD + Telefone">    
      <span id="telefoneMensagem" class="help-block"></span>
    </p>
    <p id="canalAtendimento">
      <label class="radio-inline">Telefone
        <input type="radio" name="canal" value="telefone"> 
        <span class="checkmark"></span>
      </label>
      <label class="radio-inline">WhatsApp
        <input type="radio" name="canal" value="whatsapp">
        <span class="checkmark"></span>
      </label>
    <?php if( $formulario_chamada ) : ?>
      <label class="radio-inline">E-mail
        <input type="radio" name="canal" value="email">
        <span class="checkmark"></span>
      </label>
    <?php endif; ?>
    </p>            
    
    <div id="passo2"></div>
    
    <div id="passo3">
      <button class="btn btn-primary btn-lg txt-uppercase" disabled="disabled">Fazer Contato</button>
    </div>
  <?php if( $formulario_chamada ) : ?>
    <div id="canalFormulario" class="d-none">
      <?php echo do_shortcode($formulario_chamada); ?>
    </div>
  <?php endif; ?>
  
  </div>

  <div id="orcamentoEnviado" class="d-none">
    <p class="solicitacao-realizada lead">Solicitação Realizada</p>
    <div id="passo4"></div>
    <p class="text-center">
      <button id="orcamentoRestart" class="btn btn-primary btn-lg">Novo contato</button>
    </p>
  </div>
    
  <div class="d-none" id="ajax-error"></div>

  <!-- ajax load -->
  <div class="d-none" id="ajax-loading">  
    <div class="loader" title="Carregando">
      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       width="64px" height="64px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
      <path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
        s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
        c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
      <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
        C22.32,8.481,24.301,9.057,26.013,10.047z">
        <animateTransform attributeType="xml"
          attributeName="transform"
          type="rotate"
          from="0 20 20"
          to="360 20 20"
          dur="0.5s"
          repeatCount="indefinite"/>
        </path>
      </svg>
    </div>
  </div>  
  <!-- /ajax load -->
  
</div>

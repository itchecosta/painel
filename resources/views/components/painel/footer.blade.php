<footer>
  <div class="layer-1">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-2">
          <img src="{{asset('img/logo/logo.webp')}}" alt="painel logo" height="80px" class="logo-footer my-5">
        </div>
  
  
        <div class="col-12 col-md-6 col-lg-3">
          <strong>
            Localização
          </strong>
  
          <p>
            @if(isset($config['endereco']))
              {!!$config['endereco']!!}
            @endif
            <br>
            @if(isset($config['cidade']))
            {!!$config['cidade']!!}
            @endif
          </p>
        </div>
  
        <div class="col-12 col-md-6 col-lg-4">
          <strong>
            Horário de funcionamento
          </strong>
  
          <div class="row">
            <div class="col-12 col-md-6">
              <p>
                <strong>
                  Segunda à sexta
                </strong>
              </p>
  
              <span>
                  @if(isset($config['segunda_sexta']))
                  {!!$config['segunda_sexta']!!}
                  @endif
              </span>
            </div>
  
            <div class="col-12 col-md-6">
              <p>
                <strong>
                  Sábado
                </strong>
              </p>
  
              <span>
                  @if(isset($config['sabado']))
                  {!!$config['sabado']!!}
                  @endif
              </span>
            </div>
          </div> {{-- end row --}}
        </div>
  
        <div class="col-12 col-md-6 col-lg-3">
          
          <strong>
            Telefones para agendamentos
          </strong>
  
          <span>
            @if(isset($config['numero_um']))
            {!!$config['numero_um']!!} 
            @endif 
            @if(isset($config['numero_dois']))
            / {!!$config['numero_dois']!!}
            @endif
          </span>
  
          <br>
          <br>
  
          <strong>
            Estamos nas redes
          </strong>
  
          <div class="social">
            @if(isset($config['instagram']))
             <a href="{{$config['instagram']}}" target="_blank" rel="noopener">
                <img src="{{asset('img/icons/instagram.svg')}}" alt="instagram">
            </a>
            @endif
            
            @if(isset($config['facebook']))
              <a href="{{$config['facebook']}}" target="_blank" rel="noopener">
                <img src="{{asset('img/icons/facebook.svg')}}" alt="facebook">
              </a>
            @endif
  
            @if(isset($config['link_whatsapp']))
            <a href="{{$config['link_whatsapp']}}" target="_blank" rel="noopener">
              <img src="{{asset('img/icons/whatsapp3.svg')}}" width="25px" alt="whatsapp">
            </a>
            @endif
          </div>
  
        </div>
      </div> {{-- end row --}}
    </div> {{-- end container --}}
  </div>
  
  <div class="layer-2">
    <div class="container">
      <div class="wrapper">
        <small>
          Painel Padrão {{ date('Y') }} &copy; - Todos os direitos resevados.
        </small>
  
        <a href="http://www.newboxinfo.com.br/" target="_blank" rel="noopener">
          <small>
            Desenvolvido por - New Box
          </small>
        </a>
      </div>
    </div> {{-- end container --}}
  </div>
  
</footer>

<a class="floating-whatsapp" onclick="ga('send', 'event', 'Action', 'Whatsapp-btn', '/');" href="https://wa.me/5591984091551" title="Agendar consulta pelo WhatsApp" target="_blank"><img src="{{asset('img/icons/whatsapp-4.svg')}}" width="25px" alt="whatsapp"></a>

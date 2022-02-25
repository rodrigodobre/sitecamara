@php

use App\Http\Controllers\Helpers;
use App\Models\Noticia;

    $noticias = Noticia::orderBy('id', 'desc')->where('publicado',true)->take(1)->get();
    $ajuda = new Helpers();

@endphp
<div class="centro" style="max-width: 1215px">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
                @foreach($noticias as $noticia)
                    @php
                        $texto_resumido = $ajuda->resumo($noticia->texto,20);
                    @endphp
                    @if($noticia->publicado == true)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <a href="noticias/{{$noticia->id}}">
                                    <img class="d-block img-fluid w-100 altura_variavel" src="{{ asset($noticia->foto->foto_src) }}" alt="{{ $noticia->titulo }}" style="max-height: 683px;min-height: 250px;height:100%;" />
                                </a>
                            </div>
                    @endif
            @endforeach
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('public/img/banner.png') }}" alt="First slide" style="max-height: 768px;min-height: 250px;height:100%;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('public/img/banner1.png') }}" alt="Second slide" style="max-height: 768px;min-height: 250px;height:100%;">
    </div>
  
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<br />
<br />

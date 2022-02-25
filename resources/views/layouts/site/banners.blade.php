@php
use App\Http\Controllers\Helpers;
use App\Models\Noticia;

    $noticias = Noticia::orderBy('id', 'desc')->where('publicado',true)->take(3)->get();
    $ajuda = new Helpers();

@endphp
<div class="centro" style="max-width: 1215px">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            @foreach( $noticias as $noticia)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner" role="listbox">
            @foreach( $noticias as $noticia)
                    @php
                        $texto_resumido = $ajuda->resumo($noticia->texto,20);
                    @endphp
                    @if($noticia->publicado == true)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <a href="noticias/{{$noticia->id}}">
                                <img class="d-block img-fluid w-100 altura_variavel" src="{{ asset($noticia->foto->foto_src) }}" alt="{{ $noticia->titulo }}" />
                                </a>
                                <div class="carousel-caption">
                                    <h2 class="fonte_variavel" style="color: white; text-shadow: black 0.1em 0.1em 0.2em;">{{ $noticia->titulo }}</h2>
                                </div>
                            </div>
                    @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próxima</span>
        </a>
    </div>
    <br />
</div>

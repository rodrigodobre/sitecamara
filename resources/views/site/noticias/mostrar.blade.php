@php
    use App\Http\Controllers\Helpers;
    $ajuda = new Helpers();
@endphp
@extends('layouts.site')
@section('content')
<div class="centro">
    <div class="relacao"><br />
    @foreach($noticias as $noticia)
            @php
                $texto_sem_tags = strip_tags($noticia->texto);
                $resumo = $ajuda->resumo(($texto_sem_tags), 100);
            @endphp
            <a href="noticias/{{ $noticia->id }}">
                <ul>
                    <li><img alt="foto" src="{{ asset($noticia->foto->foto_src) }}" width="80"/></li>
                    <li>{{ date("d-m-Y", strtotime($noticia->data_n)) }}</li>
                    <li><p>{{ $noticia->titulo }}</p>
                        <p style="font-size: 0.9em;"><?= $resumo ?></p>
                    </li>
                </ul>
            </a>
    @endforeach
        <br />
    </div>
    <div class="pagination" style="margin-left: 40%;">
        {{ $noticias->links() }}
    </div>
</div>
@endsection

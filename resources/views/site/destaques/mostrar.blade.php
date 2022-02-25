@php
    use App\Http\Controllers\Helpers;
    $ajuda = new Helpers();
@endphp
@extends('layouts.site')
@section('content')
<div class="centro">
    <div class="relacao"><br />

    @foreach($destaques as $destaque)
            @php
                $texto_sem_tags = strip_tags($destaque->texto);
                $resumo = $ajuda->resumo(($texto_sem_tags), 100);
            @endphp
            <a href="noticias/{{ $destaque->id }}">
                <ul>
                    <li><img alt="foto" src="{{ $destaque->foto->foto_src }}" width="80"/></li>
                    <li>{{ date("d-m-Y", strtotime($destaque->data_n)) }}</li>
                    <li><p>{{ $destaque->titulo }}</p>
                        <p style="font-size: 0.9em;"><?= $resumo ?></p>
                    </li>
                </ul>
            </a>
    @endforeach
        <br />
    </div>
</div>
@endsection

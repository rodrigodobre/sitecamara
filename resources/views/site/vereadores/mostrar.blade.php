@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row align-items-center">
        @foreach($vereadores as $vereador)
            @if($vereador->ativo == true)
            @foreach($fotos as $foto)
                @if($vereador->fk_foto == $foto->id)
                    <div class="card" style="margin:auto;width: 320px;margin-bottom: 15px;">
                        <img class="card-img-top" src="{{ asset($foto->foto_src) }}" alt="{{ $vereador->partido }}" width="320" height="480" />
                        <div class="card-body">
                            <h6 class="card-title" style="font-size: medium;">{{ $vereador->nome_parlamentar }}</h6>
                            <a href="vereadores/{{ $vereador->id }}" class="btn btn-primary">Ver mais</a>
                        </div>
                    </div>
                @endif
            @endforeach
            @endif
        @endforeach
    </div>
</div>
@endsection

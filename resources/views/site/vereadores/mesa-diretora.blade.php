@extends('layouts.site')
@section('content')
@php
$mesa_diretora = null;
@endphp
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
                                    @if($vereador->mesa_diretora == 1)
                                        @php $mesa_diretora = 'Presidente'; @endphp
                                    @endif
                                    @if($vereador->mesa_diretora == 2)
                                        @php $mesa_diretora = '1º Vice Presidente'; @endphp
                                    @endif
                                    @if($vereador->mesa_diretora == 3)
                                        @php $mesa_diretora = '2ª Vice Presidente'; @endphp
                                    @endif
                                    @if($vereador->mesa_diretora == 4)
                                        @php $mesa_diretora = 'Secretária'; @endphp
                                    @endif
                                    @if($vereador->mesa_diretora == 5)
                                        @php $mesa_diretora = 'Vice Secretário'; @endphp
                                    @endif
                                    <h6 class="card-title" style="font-size: medium;">{{ $mesa_diretora }}</h6>
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

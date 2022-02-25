@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row align-items-top">
        <div class="col-sm-12 col-md-6 col-lg-6 d-inline-block">
            <img src="{{ asset($foto) }}" class="d-inline-block" style="max-width: 640px;min-width: 320px;width: 100%;margin-bottom: 15px;vertical-align: top;" />
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 d-inline-block" style="margin-left: auto;vertical-align: top;text-align: left;">
            <h4>{{ $vereador->nome_parlamentar }}</h4><br /><br />
            <h6>
                <p>Nome Completo:&nbsp;{{ $vereador->nome }}</p>
                <p>Partido:&nbsp;{{ $vereador->partido }}</p>
                <p>Telefone:&nbsp;{{ $vereador->telefone }}</p>
                <p>Email:&nbsp;{{ $vereador->email }}</p>
                <p>Naturalidade:&nbsp;{{ $vereador->naturalidade }}</p>
                <p>Data de nascimento:&nbsp;{{ $vereador->data_nasc }}</p>
                <p>Profissão:&nbsp;{{ $vereador->profissao }}</p>
                <p>
                    @if($vereador->mesa_diretora == 0)
                        Não Pertence a Mesa Diretora
                    @endif
                    @if($vereador->mesa_diretora == 1)
                            Mesa Diretora: Presidente
                    @endif
                    @if($vereador->mesa_diretora == 2)
                            Mesa Diretora: Vice Presidente
                    @endif
                    @if($vereador->mesa_diretora == 3)
                            Mesa Diretora: Segundo Vice Presidente
                    @endif
                    @if($vereador->mesa_diretora == 4)
                            Mesa Diretora: Secretário
                    @endif
                    @if($vereador->mesa_diretora == 5)
                            Mesa Diretora: Segundo Secretário
                    @endif

                </p>
            </h6><br />
            <input class="btn btn-primary" type="button" value="Voltar" onClick="history.go(-1)">
        </div>
    </div>
</div>
@endsection

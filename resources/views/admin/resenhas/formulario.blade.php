<?php

use Carbon\Carbon;
if(isset($resenha)){
$date = Carbon::parse($resenha->data_sessao)->locale('pt_BR')->format('d-m-Y');
}
?>
@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@php $tipo_de_sessao = ['Sessão Ordinária','Sessão Extraordinária','Sessão Solene','Audiência Pública']; @endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Insira as informações da resenha Abaixo
                        <a class="float-right" href="{{ url('admin/resenhas') }}">Listagem resenhas</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                            @if((Request::is('*/editar')) OR (isset($resenha)))
                                {{ Form::model($resenha, ['method' => 'PATCH','url' => 'admin/resenhas/'.$resenha->id, 'enctype' => 'multipart/form-data']) }}
                            @else
                                {{ Form::open(['url' => 'admin/resenhas/salvar', 'enctype' => 'multipart/form-data']) }}
                            @endif
                        <div class="panel-body">
                                @if(isset($resenha->pdf_vinculado))
                                    <img src="{{ asset($resenha->pdf_vinculado) }}" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                @endif
                                {{ Form::label('tipo_de_sessao','Tipo de Sessão') }}
                                {{ Form::select('tipo_de_sessao', $tipo_de_sessao, null, ['class' => 'form-control']) }}<br />
                                {{ Form::label('numero_sessao','Número da Sessão') }}
                                {{ Form::input('text','numero_sessao',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '05']) }}<br />
                                {{ Form::label('data_sessao','Data da Sessão') }}
                                @if(!isset($date))
                                    <?php $date = null;?>
                                @endif
                                {{ Form::date('data_sessao', $date, ['class' => 'form-control funcionardata','locale' => 'pt_BR' ,'format' => 'd-m-Y']) }}<br />
                                {{ Form::label('descritivo','Descrição da Sessão') }}
                                {{ Form::input('text','descritivo',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Ex: Audiência Pública para decidir novo orçamento']) }}<br />
                                {{ Form::label('arquivo','Escolha o Arquivo PDF') }}
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="arquivo" id="validatedCustomFile" accept="application/pdf" onchange="loadFile(event)">
                                    <label class="custom-file-label" for="validatedCustomFile">Escolha o arquivo...</label>
                                </div>
                                <br /><br /><label>Arquivo Selecionado</label><br />
                                <img style="margin-top: 20px;max-width: 360px;min-width: 250px;width: 100%;" id="output" />
                                <script>
                                    var loadFile = function(event) {
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script><br /><br />
                                {{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

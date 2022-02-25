@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $categories = [' ','Banners','Galerias','Notícias','Vereadores']?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Insira as informações das Fotos Abaixo
                        <a class="float-right" href="{{ url('admin/fotos') }}">Listagem Foto</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                            @if(Request::is('*/editar'))
                                {{ Form::model($foto, ['method' => 'PATCH','url' => 'admin/fotos/'.$foto->id, 'enctype' => 'multipart/form-data']) }}
                            @else
                                {{ Form::open(['url' => 'admin/fotos/salvar', 'enctype' => 'multipart/form-data']) }}
                            @endif
                        <div class="panel-body">
                                {{ Form::label('nome','Nome') }}
                                {{ Form::input('text','nome',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) }}
                                {{ Form::label('tipo','Tipo') }}
                                {{ Form::select('tipo', $categories, null, ['class' => 'form-control']) }}<br />
                                <?php
                                if(isset($foto)){
                                ?>
                                <img src="{{ asset($foto->foto_src) }}" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php
                                }
                                ?>
                                {{ Form::label('imagem','Escolha a Imagem') }}
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem" id="validatedCustomFile" accept="image/*" onchange="loadFile(event)">
                                    <label class="custom-file-label" for="validatedCustomFile">Escolha o arquivo...</label>
                                </div>
                                <br /><br /><label>Foto Selecionada</label><br />
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

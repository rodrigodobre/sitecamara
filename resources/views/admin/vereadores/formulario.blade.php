@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
<?php $categories = [' ','Presidente','Vice-Presidente','Segundo Vice-Presidente','Secretário','Segundo Secretário']?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Insira as informações dos Vereadores Abaixo
                        <a class="float-right" href="{{ url('admin/vereadores') }}">Listagem Vereador</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                        @if(Request::is('*/editar'))
                                {{ Form::model($vereador, ['method' => 'PATCH','url' => 'admin/vereadores/'.$vereador->id, 'enctype' => 'multipart/form-data']) }}
                        @else
                                {{ Form::open(['url' => 'admin/vereadores/salvar', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        <div class="panel-body">
                                <?php
                                    if(isset($foto)){
                                ?>
                                    <img src="{{ asset($foto) }}" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php
                                    }
                                ?>
                                {{ Form::label('nome','Nome Completo') }}
                                {{ Form::input('text','nome',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome Completo']) }}
                                {{ Form::label('nome_parlamentar','Nome Parlamentar') }}
                                {{ Form::input('text','nome_parlamentar',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome Parlamentar']) }}
                                {{ Form::label('partido','Partido') }}
                                {{ Form::input('text','partido',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Partido']) }}
                                {{ Form::label('telefone','Telefone') }}
                                {{ Form::input('text','telefone',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '( )    -    ']) }}
                                {{ Form::label('email','Email') }}
                                {{ Form::email('email',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '      @camarapontapora.ms.gov.br']) }}
                                {{ Form::label('naturalidade','Naturalidade') }}
                                {{ Form::input('text','naturalidade',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'brasileiro']) }}
                                {{ Form::label('data_nasc','Data de Nascimento') }}
                                {{ Form::text('data_nasc', null, ['class' => 'form-control', 'id'=>'datepicker']) }}
                                {{ Form::label('profissao','Profissão') }}
                                {{ Form::input('text','profissao', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Profissão']) }}
                                {{ Form::label('mesa_diretora','Mesa Diretora') }}
                                {{ Form::select('mesa_diretora', $categories, null, ['class' => 'form-control']) }}<br />
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

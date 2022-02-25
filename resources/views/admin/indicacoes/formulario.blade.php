@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        INDICAÇÕES
                        <a class="float-right" href="{{ url('admin/indicacoes') }}">Lista de indicações</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                            @if(Request::is('*/editar'))
                                {{ Form::model($indicacao, ['method' => 'PATCH','url' => 'admin/indicacoes/'.$indicacao->id, 'enctype' => 'multipart/form-data']) }}
                            @else
                                {{ Form::open(['url' => 'admin/indicacoes/salvar', 'enctype' => 'multipart/form-data']) }}
                            @endif
                            <div class="panel-body">
                                <?php
                                if(isset($foto)){
                                ?>
                                <img src="{{ asset($foto) }}" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php
                                   $texto = $indicacao->texto_ind;
                                   $sessao = date("d-m-Y", strtotime($indicacao->sessao));
                                }
                                else{
                                    $texto = "";
                                    $sessao = null;
                                }
                                ?>
                                {{ Form::label('titulo_ind','Título') }}
                                {{ Form::input('text','titulo_ind',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Título']) }}<br />
                                {{ Form::label('texto_ind','Texto') }}<br />
                                {{ Form::textarea('texto_ind',$texto, null, ['class' => 'form-control', 'autofocus', 'placeholder' => '', 'id' => 'texto']) }}
                                <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'texto_ind' );
                                        CKEDITOR.editorConfig = function( config ) {
                                            config.language = 'pt-br';
                                            config.uiColor = '#F7B42C';
                                            config.height = 300;
                                            config.toolbarCanCollapse = true;
                                            config.extraPlugins = 'htmlwriter';
                                        };
                                </script>
                                <br />
                                {{ Form::label('sessao','Data da Sessão') }}
                                {{ Form::text('sessao', $sessao, ['class' => 'form-control', 'id'=>'datepicker']) }}
                                {{ Form::label('fk_vereador', 'Defina a qual vereador pertence a indicação') }}
                                <select name="fk_vereador" class="form-control">
                                        @if(isset($indicacao))
                                            @foreach($vereadores as $vereador)
                                               @if($vereador->ativo == true)
                                                   @if($indicacao->fk_vereador == $vereador->id)
                                                    <option value="{{ $indicacao->fk_vereador }}" selected>{{ $vereador->nome_parlamentar }}</option>
                                                   @else
                                                    <option value="{{ $vereador->id }}">{{ $vereador->nome }}</option>
                                                   @endif
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($vereadores as $vereador)
                                                @if($vereador->ativo == true)
                                                    <option value="{{ $vereador->id }}">{{ $vereador->nome_parlamentar }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                </select><br />
                                {{ Form::submit('Salvar',['class' => 'btn btn-primary']) }}
                                {{ Form::close() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

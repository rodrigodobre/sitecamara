@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@php use App\Models\Autor; @endphp
@php $tipo = [' ','Lei','Lei Complementar','Decreto','Resolução']; @endphp
@php $status = [' ','Em Vigor','Sem Efeito','Vigência Esgotada','Revogada','Inconstitucional','Revogada Tacitamente','Repristinada']; @endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Insira as informações da Lei Abaixo
                        <a class="float-right" href="{{ url('admin/leis') }}">Listagem Leis</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                            @if(Request::is('*/editar'))
                                {{ Form::model($lei, ['method' => 'PATCH','url' => 'admin/leis/'.$lei->id, 'enctype' => 'multipart/form-data']) }}
                            @else
                                {{ Form::open(['url' => 'admin/leis/salvar', 'enctype' => 'multipart/form-data']) }}
                            @endif
                        <div class="panel-body">
                                @if(!isset($data_sancao))
                                    <?php $data_sancao = null; ?>
                                @else
                                    <?php $data_sancao = date("d-m-Y", strtotime($lei->data_sancao)); ?>
                                @endif
                                @if(!isset($data_publicacao))
                                    <?php $data_publicacao = null; ?>
                                @else
                                    <?php $data_publicacao = date("d-m-Y", strtotime($lei->data_publicacao)); ?>
                                @endif
                                @if(isset($lei->lei_source))
                                    <img src="{{ asset($lei->lei_source) }}" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                @endif
                                {{ Form::label('tipo','Tipo') }}
                                {{ Form::select('tipo', $tipo, null, ['class' => 'form-control']) }}<br />
                                {{ Form::label('numero','Número') }}
                                {{ Form::input('text','numero',null, ['class' => 'form-control', 'autofocus', 'placeholder' => '123']) }}<br />
                                {{ Form::label('data_sancao','Data da Sanção') }}
                                {{ Form::text('data_sancao', $data_sancao, ['class' => 'form-control funcionardata']) }}<br />
                                {{ Form::label('data_publicacao','Data da Publicação') }}
                                {{ Form::text('data_publicacao', $data_publicacao, ['class' => 'form-control funcionardata']) }}<br />
                                {{ Form::label('ementa','Ementa') }}
                                {{ Form::input('text','ementa', null,['class' => 'form-control']) }}<br />
                                {{ Form::label('palavra_chave','Palavra-Chave') }}
                                {{ Form::input('text','palavra_chave', null,['class' => 'form-control']) }}<br />
                                {{ Form::label('status','Status') }}
                                {{ Form::select('status', $status, null, ['class' => 'form-control']) }}<br />
                                <span style="text-align: left;display: block;">Autores<span/>
                                @if(!isset($lei))
                                    <div id="origem" align="center" style="text-align: left;"> 
                                        <input class="form-control" type="text" id="autores" name="autores[]" />  
                                        <img  src="{{ asset('public/img/add.png') }}" style="cursor: pointer;" onclick="duplicarCampos();" width='28'>  
                                        <img  src="{{ asset('public/img/remove.png') }}" style="cursor: pointer;" onclick="removerCampos(this);" width='32'>   
                                    </div>
                                    <div id="destino">  
                                    </div>  
                                @else
                                    @php
                                        $autores = Autor::where('fk_lei',$lei->id)->get();
                                    @endphp
                                    <div id="destino">  
                                    @foreach($autores as $autor)
                                         <input class="form-control" type="text" id="autores" name="autores[]" value="{{ $autor->nome_autor }}" />   
                                         <img  src="{{ asset('public/img/remove.png') }}" style="cursor: pointer;" onclick="removerCampos(this);" width='32'>
                                    @endforeach
                                    </div>    
                                    <div id="origem1" align="center" style="text-align: left;"> 
                                            <input class="form-control" type="text" id="autores" name="autores[]" />
                                            <img  src="{{ asset('public/img/add.png') }}" style="cursor: pointer;" onclick="duplicarCampos2();" width='28'>  
                                            <img  src="{{ asset('public/img/remove.png') }}" style="cursor: pointer;" onclick="removerCampos2(this);" width='32'> 
                                    </div>
                                    <div id="destino1">  
                                    </div>  
                                @endif 
                                                              
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

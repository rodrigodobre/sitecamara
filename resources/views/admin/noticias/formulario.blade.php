@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <?php
                            if(isset($destaques)){
                                $titulo_superior = "DESTAQUES";
                                $lista = "Lista de destaques";
                                $url = 'admin/destaques';
                            }
                            else{
                                $titulo_superior = "NOTÍCIAS";
                                $lista = "Lista de notícias";
                                $url = "admin/noticias";
                            }
                        ?>
                        {{ $titulo_superior }}
                        <a class="float-right" href="{{ url($url) }}">{{ $lista }}</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                            @if(Request::is('*/editar'))
                                {{ Form::model($noticia, ['method' => 'PATCH','url' => $url.'/'.$noticia->id, 'enctype' => 'multipart/form-data']) }}
                            @else
                                {{ Form::open(['url' => $url.'/salvar', 'enctype' => 'multipart/form-data']) }}
                            @endif
                            <div class="panel-body">
                                <?php
                                if(isset($foto)){
                                ?>
                                <img src="{{ asset($foto) }}" style="max-width: 250px;min-width: 250px;width: 100%;" /><br /><br />
                                <?php
                                   $texto = $noticia->texto;
                                   $data_n = date("d-m-Y", strtotime($noticia->data_n));
                                }
                                else{
                                    $texto = "Digite aqui o texto da matéria";
                                    $data_n = null;
                                }
                                ?>
                                {{ Form::label('titulo','Título') }}
                                {{ Form::input('text','titulo',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Título']) }}<br />
                                {{ Form::label('texto','Texto') }}<br />

                                {{ Form::textarea('texto',$texto, null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Digite a matéria', 'id' => 'texto']) }}
                                    <script>
                                        CKEDITOR.replace( 'texto' );
                                    </script>
                                <br />
                                {{ Form::label('credito','Crédito') }}
                                {{ Form::input('text','credito',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Crédito']) }}
                                {{ Form::label('fotografo','Fotógrafo') }}
                                {{ Form::input('text','fotografo',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Fotógrafo']) }}
                                {{ Form::label('data_n','Data da Notícia') }}
                                {{ Form::text('data_n', $data_n, ['class' => 'form-control', 'id'=>'datepicker']) }}
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

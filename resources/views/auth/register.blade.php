@extends('layouts.app')

@section('content')
@php
$permissao = ['Administrador','Imprensa','Juridico'];
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(isset($usuario))
                    <div class="card-header">Editar Usuário</div>
                @else
                    <div class="card-header">Novo Usuário</div>
                @endif
                <div class="card-body">
                    @if (session('mensagem_sucesso'))
                        <div class="alert alert-success" role="alert">
                            {{ session('mensagem_sucesso') }}
                        </div>
                    @endif
                    @if(Request::is('*/editar'))
                        {{ Form::model($usuario, ['method' => 'PATCH','url' => 'usuarios/'.$usuario->id.'/atualizar', 'enctype' => 'multipart/form-data']) }}
                    @else
                        {{ Form::open(['url' => route('register'), 'enctype' => 'multipart/form-data']) }}
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                @if(isset($usuario->name))
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $usuario->name }}" required autofocus>
                                @else
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @endif
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                @if(isset($usuario->email))
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $usuario->email }}" required>
                                @else
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if(!isset($usuario->id))
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme a Senha</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                        @endif
                        <div class="form-group row">
                            <label for="permissao" class="col-md-4 col-form-label text-md-right">Permissão</label>
                            <div class="col-md-6">
                                {{ Form::select('permissao', $permissao, null, ['class' => 'form-control']) }}
                            </div>
                        </div>
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if(isset($usuario))
                                        Salvar
                                    @else
                                        Registrar
                                    @endif
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

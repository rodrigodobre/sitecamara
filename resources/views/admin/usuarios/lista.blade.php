<?php
$helpers = new \App\Http\Controllers\Helpers();
?>
@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Usuários</b>
                        @if (Route::has('register'))
                                <a class="float-right" href="{{ route('register') }}">Novo Usuário</a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table">
                            <th></th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Permissão</th>
                            <th>Ações</th>
                            @foreach($usuarios as $usuario)
                                <tbody>
                                <tr>
                                    <td>
                                        <img src="{ asset($usuario->foto->fk_foto) }}" width="50" class="img-thumbnail"/></td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }} </td>
                                    <td>{{ $usuario->permissao }}</td>
                                    <td>
                                        <a href="usuarios/{{ $usuario->id }}/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        {{ Form::open(['method' =>'DELETE','url' => 'admin/usuarios/'.$usuario->id, 'style' => 'display:inline']) }}
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

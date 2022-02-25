<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('America/Campo_Grande');

$usuarios = new Controllers\UsuariosController();
$usuarios_lista = DB::table('users')->get();
$alteracoes = DB::table('Alteracoes')->orderBy('updated_at', 'desc')->paginate(10);
$alteracao = null;
?>
@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Últimas alterações feitas no sistema</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <th>Usuário</th>
                            <th>Alteração</th>
                            <th></th>
                            <th>Data</th>
                            <th>Hora</th>
                            @foreach($alteracoes as $alteracao)
                                <tbody>
                                        <tr>
                                            <td>
                                                @if($alteracao->fk_usuario == Auth::user()->id)
                                                    Você
                                                @else
                                                    @foreach($usuarios_lista as $usuario)
                                                        @if($alteracao->fk_usuario == $usuario->id)
                                                            {{ $usuario->name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if($alteracao->operacao == 1)
                                                    Adicionou um(a) novo(a)
                                                @endif
                                                @if($alteracao->operacao == 2)
                                                    Alterou um(a)
                                                @endif
                                                @if($alteracao->operacao == 3)
                                                    Excluíu um(a)
                                                @endif
                                                @if($alteracao->operacao == 4)
                                                    Publicou um(a)
                                                @endif
                                                @if($alteracao->operacao == 5)
                                                    Retirou um(a)
                                                @endif
                                                @if($alteracao->operacao == 6)
                                                    Ativou um(a)
                                                @endif
                                                @if($alteracao->operacao == 7)
                                                    Desativou um(a)
                                                @endif
                                                    @if($alteracao->tabela == 1)
                                                        Notícia
                                                    @endif
                                                    @if($alteracao->tabela == 2)
                                                        Destaque
                                                    @endif
                                                    @if($alteracao->tabela == 3)
                                                        Indicação
                                                    @endif
                                                    @if($alteracao->tabela == 4)
                                                        Foto
                                                    @endif
                                                    @if($alteracao->tabela == 5)
                                                        Lei
                                                    @endif
                                                    @if($alteracao->tabela == 6)
                                                        Usuário
                                                    @endif
                                                    @if($alteracao->tabela == 7)
                                                        Carroussel
                                                    @endif
                                                    @if($alteracao->tabela == 8)
                                                        Galeria
                                                    @endif
                                                    @if($alteracao->tabela == 9)
                                                        Vereador(a)
                                                    @endif
                                                    @if($alteracao->tabela == 10)
                                                        Resenha
                                                    @endif
                                            </td>
                                            <td>
                                                @if($alteracao->operacao == 3)
                                                    id: {{ $alteracao->idtabelaalterada }}
                                                @else
                                                    @if($alteracao->tabela == 1)
                                                        <a href="noticias/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                    @endif
                                                        @if($alteracao->tabela == 2)
                                                            <a href="destaques/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 3)
                                                            <a href="indicacoes/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 4)
                                                            <a href="fotos/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 5)
                                                            <a href="leis/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 6)
                                                            <a href="usuarios/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 7)
                                                            <a href="carroussels/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 8)
                                                            <a href="galerias/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 9)
                                                            <a href="vereadores/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                        @if($alteracao->tabela == 10)
                                                            <a href="resenhas/{{ $alteracao->idtabelaalterada }}/editar" class="btn btn-outline-dark">Veja mais</a>
                                                        @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if($alteracao->updated_at != null)
                                                    {{  date("d-m-Y", strtotime($alteracao->updated_at)) }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($alteracao->updated_at != null)
                                                    {{  date("H:i:s", strtotime($alteracao->updated_at)) }}
                                                @endif
                                            </td>
                            @endforeach
                        </table>
                        {{ $alteracoes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

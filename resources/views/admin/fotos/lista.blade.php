<?php
$helpers = new \App\Http\Controllers\Helpers();
?>
@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Fotos</b>
                        <a class="float-right" href="{{ url('admin/fotos/novo') }}">Nova Foto</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table">
                            <th> </th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Fonte</th>
                            <th>Ações</th>
                            @foreach($fotos as $foto)
                                <tbody>
                                <tr>
                                    <td><img src="{{ asset($foto->foto_src) }}" width="50" class="img-thumbnail" /></td>
                                    @php $nome = $helpers->resumo($foto->nome,40); @endphp
                                    @php $source = $helpers->resumo($foto->foto_src,40); @endphp
                                    <td>{{ $nome }}</td>
                                    <td>
                                        <?php
                                            if ($foto->tipo == 1) {
                                                echo 'Banner';
                                            }
                                            if ($foto->tipo == 2) {
                                                echo 'Galeria';
                                            }
                                            if ($foto->tipo == 3) {
                                                echo 'Noticia';
                                            }
                                            if ($foto->tipo == 4) {
                                                echo 'Vereadores';
                                            }
                                        ?>
                                    </td>
                                    <td>{{ $source }}</td>
                                    <td>
                                        <a href="fotos/{{ $foto->id }}/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        {{ Form::open(['method' =>'DELETE','url' => 'admin/fotos/'.$foto->id, 'style' => 'display:inline']) }}
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{ $fotos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

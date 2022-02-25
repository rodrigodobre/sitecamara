@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Vereadores</b>
                        <a class="float-right" href="{{ url('admin/vereadores/novo') }}">Novo Vereador</a>
                    </div>

                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table table-hover table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nome Parlamentar</th>
                                    <th scope="col">Partido</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            @foreach($vereadores as $vereador)
                            <tbody>
                                <tr>
                                    <td>
                                        @foreach($fotos as $foto)
                                            @if($foto->id == $vereador->fk_foto)
                                                <img src="{{ asset($foto->foto_src) }}" width="50" class="img-thumbnail"/></td>
                                            @endif
                                        @endforeach
                                    <td>{{ $vereador->nome_parlamentar }}</td>
                                    <td>{{ $vereador->partido }}</td>
                                    <td>{{ $vereador->telefone }}</td>
                                    <td>
                                        @if($vereador->ativo == true)
                                            {{ Form::open(['method' =>'PATCH','url' => 'admin/vereadores/ativar/'.$vereador->id, 'style' => 'display:inline']) }}
                                            <button type="submit" class="btn btn-outline-danger">Desativar</button>
                                            <input type="hidden" name="ativo" value="0" />
                                            {{ Form::close() }}
                                        @else
                                            {{ Form::open(['method' =>'PATCH','url' => 'admin/vereadores/ativar/'.$vereador->id, 'style' => 'display:inline']) }}
                                            <button type="submit" class="btn btn-outline-success">Ativar</button>
                                            <input type="hidden" name="ativo" value="1" />
                                            {{ Form::close() }}
                                        @endif
                                        <a href="vereadores/{{ $vereador->id }}/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">Editar</a>
                                        {{ Form::open(['method' =>'DELETE','url' => 'admin/vereadores/'.$vereador->id, 'style' => 'display:inline']) }}
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        {{ $vereadores->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

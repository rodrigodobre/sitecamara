
<?php
$helpers = new \App\Http\Controllers\Helpers();
setlocale(LC_ALL, "pt_BR.utf8");
?>
@extends('layouts.app')
<!-- Nome da pasta (layouts) seguido do nome da página (app) -->
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="card-header">
                        <b>Indicações</b>
                        <a class="float-right" href="{{ url('admin/indicacoes/novo') }}">
                            <span class="d-none d-sm-none d-md-inline-block d-lg-inline-block btn-outline-primary" style="padding: 2px 8px;border-radius:5px;">Nova Indicação</span>
                            <span class="d-block d-sm-block d-md-none d-none btn-outline-primary" style="padding: 2px 8px;border-radius:3px;">+</span>
                        </a>
                    </div>

                    <div class="container col-12">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mensagem_sucesso') }}
                            </div>
                        @endif
                            <ul class="d-block row align-items-center" style="border-bottom: 2px solid lightgrey;padding-bottom: 12px;padding-top: 12px;">
                                <li class="d-lg-inline-block d-md-inline-block d-sm-block d-block col-lg-2 col-md-2 col-sm-12 col-12">Imagem</li>
                                <li class="d-inline-block col-5 col-sm-5 col-md-2 col-lg-2">Título</li>
                                <li class="d-lg-inline-block d-md-inline-block d-sm-none d-none col-lg-2 col-md-3">Texto</li>
                                <li class="d-lg-inline-block d-md-none d-sm-none d-none col-lg-1 col-md-1">Sessão</li>
                                <li class="d-inline-block col-5 col-sm-5 col-md-4 col-lg-4">Ações</li>
                            </ul>

                            @foreach($indicacoes as $indicacao)
                                <ul class="d-block row align-items-center" style="border-bottom: 1px solid #ededed;padding-bottom: 12px;">
                                    <li class="d-lg-inline-block d-md-inline-block d-sm-block d-block col-lg-2 col-md-2 col-sm-12 col-12">
                                           
                                            <img src="{{ asset($indicacao->vereador->foto->foto_src) }}" style="max-width:800px;min-width:0;width: 100%;" />
                                    </li>
                                    <?php
                                    $titulo = $helpers->resumo($indicacao->titulo_ind,15);
                                    $texto = html_entity_decode($indicacao->texto_ind, ENT_QUOTES, 'UTF-8');
                                    $texto = strip_tags($texto);
                                    $texto_grande = $helpers->resumo($texto,100);
                                    $texto = $helpers->resumo($texto,15);

                                    ?>
                                    <li class="d-block d-sm-inline-block d-md-inline-block d-lg-inline-block col-12 col-sm-12 col-md-2 col-lg-2">
                                        <span class="d-none d-sm-none d-md-block d-lg-none">{{ $titulo }}</span>
                                        <span class="d-block d-sm-block d-md-none d-lg-block" style="padding-top: 10px;padding-bottom: 10px;text-align: justify;">{{ $indicacao->titulo_ind }}</span>
                                    </li>
                                    <li class="d-lg-inline-block d-md-inline-block d-sm-none d-none col-lg-2 col-md-3">
                                        <span class="d-none d-sm-none d-md-block d-lg-none">{{ $texto }}</span>
                                        <span class="d-block d-sm-block d-md-none d-lg-block" style="padding-top: 10px;padding-bottom: 10px;text-align: justify;">{{ $texto_grande }}</span>
                                    </li>
                                    <li class="d-lg-inline-block d-md-none d-sm-none d-none col-lg-1 col-md-1">
                                  @php
                                        $dateEN = new \DateTime($indicacao->sessao);
                                        $datePTBR = $dateEN->format('d/m/Y');
                                    @endphp
                                        {{ $datePTBR }}
                                    </li>
                                    <li class="d-block d-sm-inline-block d-md-inline-block d-lg-inline-block col-12 col-sm-12 col-md-4 col-lg-4">
                                        <a href="indicacoes/{{ $indicacao->id }}/editar" class="btn btn-light" style="background-color: #4ea5ff;color:white;">
                                            <span class="d-lg-block d-md-none d-sm-none d-none">Editar</span>
                                            <img class="d-lg-none d-md-block d-sm-block d-block" src="{{ asset('public/img/editar.svg') }}" />
                                        </a>
                                        {{ Form::open(['method' =>'DELETE','url' => 'admin/indicacoes/'.$indicacao->id, 'style' => 'display:inline']) }}
                                        <button type="submit" class="btn btn-danger">
                                            <span class="d-lg-block d-md-none d-sm-none d-none">Excluir</span>
                                            <img class="d-lg-none d-md-block d-sm-block d-block" src="{{ asset('public/img/excluir.svg') }}" />
                                        </button>
                                        {{ Form::close() }}
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
<div class="container">
    <div class="row align-items-center mx-auto">
        {{ $indicacoes->links() }}  
    </div>
</div>    
@endsection

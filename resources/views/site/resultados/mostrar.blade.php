<!-- $resultados_leis, $resultados_indicacoes, $resultados_noticias -->
@php
use App\Http\Controllers\Helpers;
$helpers = new Helpers();
@endphp
@extends('layouts.site')
@section('content')
<div class="centro">
    <div class="container-fluid">
        <h1>Resultados da pesquisa</h1>
        <div class="row">
            <div class="col-12">
                <h2>Leis</h2>
                @if($resultados_leis != null)
                    @foreach($resultados_leis as $res_lei)
                        <br /><p style='padding: 5px;'><a style='margin-left: 10px;color:#47474b;:hover{color:#174d7d;}' target="_blank" href='{{ asset($res_lei->lei_source) }}'>
                                @if ($res_lei->tipo == 1)
                                    Lei nº.
                                @endif
                                @if ($res_lei->tipo == 2)
                                    Lei Complementar nº.
                                @endif
                                @if ($res_lei->tipo == 3)
                                    Decreto Legislativo nº.
                                @endif
                                @if ($res_lei->tipo == 4)
                                    Resolução nº.
                            @endif
                            {{ $res_lei->numero }}
                            @php
                                $data = date("d-m-Y", strtotime($res_lei->data_sancao));
                                echo " de " . $data;
                                $resumir = $helpers->resumo($res_lei->ementa, 100);
                                echo "</a></p><p style='margin-left:15px;font-style: italic;font-size: small;'>" . $resumir . "</p>";
                            @endphp
                    @endforeach
                @else
                    <br /><p style="padding: 5px;">Nenhum resultado para leis foi encontrado</p><br />
                @endif
            </div><!--
            <div class="col-12">
                <h2>Indicações</h2>
                foreach($resultados_indicacoes as $res_ind)
                    <br /><p style='padding: 5px;'><a style='margin-left: 10px;color:#47474b;:hover{color:#174d7d;}' target="_blank" href='/indicacoes/{ $res_ind->id }}'>{ $res_ind->titulo_ind }}</a></p>
                endforeach
            </div>
            <div class="col-12">
                <h2>Notícias</h2>
                foreach($resultados_noticias as $res_not)
                    <br /><p style='padding: 5px;'><a style='margin-left: 10px;color:#47474b;:hover{color:#174d7d;}' target="_blank" href='/noticias/{ $res_not->id }}'>{ $res_not->titulo }}</a></p>
                endforeach
            </div>-->
        </div>
    </div>
</div>
@endsection

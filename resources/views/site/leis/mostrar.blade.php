@extends('layouts.site')
@section('content')
@php
 use App\Http\Controllers\Helpers;
 $helpers = new Helpers();
@endphp
<div class="centro">
<div class="legislativo">
    <br />
    <div class="topo">
        <h2>Legislação Municipal</h2><br />
        <h4>Governo organizado e transparente</h4>
    </div>
    <br />
    <div class="esquerda" style="width: 320px;vertical-align: top;">
        <div class="menu_lateral">
            <ul>
                @foreach($principais as $principal)
                <li id="ml1" style="text-align: justify;">
                    <a style="margin-left:10px;color:white;" target="_blank" href="{{ asset($principal->lei_source) }}">{{ $principal->palavra_chave }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="direita" style="width: auto;vertical-align: top;margin-top: 20px;">
        <div class="leis"><h2>Utilize o campo abaixo para pesquisar as Leis Municipais</h2>
            <br />
                {{ Form::open(['url' => 'legislativo/pesquisar', 'enctype' => 'multipart/form-data', 'class' => 'pesq_legis']) }}
                <div class="check_legis">
                    <ul>
                        <li>{{ Form::checkbox('tipo',1) }}{{ Form::label('tipo', 'Leis') }}</li>
                        <li>{{ Form::checkbox('tipo',2) }}{{ Form::label('tipo', 'Leis Complementares') }}</li>
                        <li>{{ Form::checkbox('tipo',3) }}{{ Form::label('tipo', 'Decretos Legislativos') }}</li>
                        <li>{{ Form::checkbox('tipo',4) }}{{ Form::label('tipo', 'Resoluções') }}</li>
                    </ul>
                </div>
                <br />
                <div class="avancada">
                    <a id="esconder" href="#">+ pesquisa avançada</a>
                    <a id="voltar" class="escondido" href="#">- pesquisa avançada</a>
                    <br />
                    <div class="escondido check_legis">
                        <ul>
                            <li>{{ Form::checkbox('status',1) }}{{ Form::label('status', 'Em Vigor') }}</li>
                            <li>{{ Form::checkbox('status',2) }}{{ Form::label('status', 'Sem Efeito') }}</li>
                            <li>{{ Form::checkbox('status',3) }}{{ Form::label('status', 'Vigência Esgotada') }}</li>
                            <li>{{ Form::checkbox('status',4) }}{{ Form::label('status', 'Revogada') }}</li>
                        </ul>
                        <ul>
                            <li>{{ Form::checkbox('status',5) }}{{ Form::label('status', 'Inconstitucional') }}</li>
                            <li>{{ Form::checkbox('status',6) }}{{ Form::label('status', 'Revogada Tacitamente') }}</li>
                            <li>{{ Form::checkbox('status',7) }}{{ Form::label('status', 'Repristinada') }}</li>
                        </ul>
                    </div>
                </div>
                <div>
                    {{ Form::input('text','pesquisar_leg',null,['id' => 'campo_pesq', 'placeholder' => 'Digite a palavra chave aqui...']) }}
                    {{ Form::submit('Procurar') }}
                </div>
            {{ Form::close() }}
            <div class="mostra_resultado" style="height: 300px;overflow-y: auto;">
                    @if(isset($pesquisa))
                        @foreach($pesquisa as $pesq)
                            <br /><p style='padding: 5px;'><a style='margin-left: 10px;' target="_blank" href='{{ asset($pesq->lei_source) }}'>
                            @if ($pesq->tipo == 1)
                                Lei nº.
                            @endif
                            @if ($pesq->tipo == 2)
                                Lei Complementar nº.
                            @endif
                            @if ($pesq->tipo == 3)
                                Decreto Legislativo nº.
                            @endif
                            @if ($pesq->tipo == 4)
                                Resolução nº.
                            @endif
                            {{ $pesq->numero }}
                            @php
                            $data = date("d-m-Y", strtotime($pesq->data_sancao));
                            echo " de " . $data;
                            $resumir = $helpers->resumo($pesq->ementa, 100);
                            echo "</a></p><p style='margin-left:15px;font-style: italic;font-size: small;'>" . $resumir . "</p>";
                            @endphp
                        @endforeach
                            <br />
                    @endif
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@php
    use App\Http\Controllers\Helpers;
    $ajuda = new Helpers();
@endphp
@extends('layouts.site')
@section('content')
    <div class="centro">
        <div class="relacao"><br />
            @foreach($indicacoes as $indicacao)
                @if($indicacao->vereador->ativo == true)
                        @php
                            $texto_sem_tags = strip_tags($indicacao->texto_ind);
                            $resumo = $ajuda->resumo(($texto_sem_tags), 100);
                        @endphp
                        <a href="indicacoes/{{ $indicacao->id }}">
                            <ul>
                                <li><img alt="foto" src="{{ asset($indicacao->vereador->foto->foto_src) }}" width="80"/></li>
                                <li>{{ date("d-m-Y", strtotime($indicacao->sessao)) }}</li>
                                <li><p>{{ $indicacao->titulo_ind }}</p>
                                    <p style="font-size: 0.9em;"><?= $resumo ?></p>
                                </li>
                            </ul>
                        </a>
                @endif
            @endforeach
            <br />
        </div>
        <div class="pagination" style="margin-left: 40%;">
            {{ $indicacoes->links() }}
        </div>
    </div>
@endsection

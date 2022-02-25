@extends('layouts.site')
@section('content')
    <div class="centro">
        <div class="coordena">
            <div class="esquerda">
                <div class="noticias">
                    <br /><br />
                    <h1>
                        {{ $indicacao->titulo_ind }}
                    </h1><br /><span>Sessão do dia:&nbsp;{{ date("d-m-Y", strtotime($indicacao->sessao)) }}</span>
                    <br />
                    <br />
                    <div style="min-height:450px;">
                        <img class='img-fluid' src="{{ asset($indicacao->vereador->foto->foto_src) }}" />
                        <p><?= $indicacao->texto_ind ?></p>
                    </div>
                    <div>
                        <br />
                        <p>Autor:&nbsp;&nbsp;{{ $indicacao->vereador->nome_parlamentar }}</p>
                        <br />
                        <hr />
                    </div>
                </div>
                <div>
                    <a class="btn btn-primary" href="/vereadores">Vereadores</a>
                    <input class="btn btn-primary" type="button" value="Voltar" onClick="history.go(-1)">
                </div>
            </div>
            <div class="direita">
                <div class="sociais">
                    <button><img src="{{ asset('public/img/printer.png') }}" style="width: 48px;" /></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openPrintDialogue(){
            $('<iframe>', {
                name: 'myiframe',
                class: 'printFrame'
            })
                .appendTo('body')
                .contents().find('body')
                .append(`
                <div class="noticias">
                    <br /><br />
                    <h1>
                        {{ $indicacao->titulo_ind }}
                    </h1><br /><span>Sessão do dia:&nbsp;{{ date("d-m-Y", strtotime($indicacao->sessao)) }}</span>
                    <br />
                    <br />
                    <div style="min-height:450px;">
                        <img class='img-fluid' src="{{ asset($indicacao->vereador->foto->foto_src) }}" />
                        <p><?= $indicacao->texto_ind ?></p>
                    </div>
                    <div>
                        <br />
                        <p>Autor:&nbsp;&nbsp;{{ $indicacao->vereador->nome_parlamentar }}</p>
                        <br />
                        <hr />
                    </div>
                </div>
                `);

            window.frames['myiframe'].focus();
            window.frames['myiframe'].print();
            setTimeout(() => { $(".printFrame").remove(); }, 1000);
        }
        $('button').on('click', openPrintDialogue);
    </script>
@endsection

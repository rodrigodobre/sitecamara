@extends('layouts.site')
@section('content')
<div class="centro">
    <div class="container">
        {{ Form::model(['method' => 'PATCH','url' => '/enviar', 'enctype' => 'multipart/form-data']) }}
        {{ Form::label('nome','Nome') }}
        {{ Form::input('text','nome',null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Digite seu nome']) }}<br />
        {{ Form::label('mensagem','Mensagem') }}
        {{ Form::textarea('mensagem','Mensagem', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Digite sua dúvida', 'id' => 'texto']) }}
        <script>
            CKEDITOR.replace( 'mensagem' );
        </script><br />
        {{ Form::submit('Enviar',['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
</div>
@endsection

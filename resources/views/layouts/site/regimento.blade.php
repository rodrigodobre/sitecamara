@extends('layouts.site')
@section('content')
<div class="centro">
    <div class="regimento">
        <div><h2>REGIMENTO INTERNO</h2></div>
        <div class="pdfs"><br />
            <a href="{{ asset('pdf/regimento.pdf') }}" target="_blank">Regimento Interno Atualizado em 2018<br /><br /><img src="{{ asset('img/pdf.png') }}" /></a>
        </div>
        <div class="pdfs" style="display: block;padding: 10px;">
            <a href="/legislativo">Veja mais em Leis Municipais</a>
        </div>
    </div>
</div>
@endsection























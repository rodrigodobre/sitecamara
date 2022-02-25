@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu endereço de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um link de verificação foi enviado em seu email') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor cheque o seu link no email.') }}
                    {{ __('Se você não recebeu um email') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para receber outro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

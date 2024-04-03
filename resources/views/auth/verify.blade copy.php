@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('login-register-messages.emailVerify.verify_instructions') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('login-register-messages.emailVerify.link_sent_message') }}
                            </div>
                        @endif

                        {{ __('login-register-messages.emailVerify.type_in_email') }}
                        {{ __('login-register-messages.emailVerify.not_receive_email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('login-register-messages.emailVerify.request_another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

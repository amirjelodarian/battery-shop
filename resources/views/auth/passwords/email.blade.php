@extends('layouts.template')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('main')
    <div class="container auth-container">
        <div class="row justify-content-center">

            <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4"></div>
            <div class="auth-row col-xs-10 col-sm-8 col-md-4 col-lg-4">

                <div class="card-header">{{ __('بازیابی رمز') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('آدرس ایمیلتان را وارد کنید') }}</label><br />
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ارسال پیام بازیابی رمز به ایمیل') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4"></div>
        </div>
    </div>
@endsection


@extends('layouts.template')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('main')
    <div class="container auth-container">
        <div class="row justify-content-center">
            <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4"></div>
            <div class="auth-row col-xs-10 col-sm-8 col-md-4 col-lg-4">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('لطفاً قبل از ادامه رمز عبور خود را تأیید کنید') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password">{{ __('رمز عبور') }}</label><br />
                            <input id="password" type="password" name="password" required autocomplete="new-password"><br/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تکرار رمز عبور') }}
                                </button><br />
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('رمز عبور را فراموش کرده اید ؟') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4"></div>
        </div>
    </div>
@endsection



@extends('layouts.template')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('main')
    <div class="container auth-container">
        <div class="row justify-content-center">

            <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4"></div>
            <div class="auth-row col-xs-10 col-sm-8 col-md-4 col-lg-4">

                <div class="card-header">{{ __('ورود به حساب') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('آدرس ایمیل') }}</label><br />
                            <input id="email" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

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
                                    {{ __('ورود') }}
                                </button>
                                <div class="form-check">
                                    <input class="form-check-input remind-me-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label remind-me-label" for="remember">
                                        {{ __('بخاطر سپردن') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('رمز عبور را فراموش کرده اید ؟') }}
                                    </a>
                                @endif
                                <br />
                                <a class="text-primary" href="{{ route('register') }}">
                                    {{ __('ثبت نام') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4"></div>
        </div>
    </div>
@endsection


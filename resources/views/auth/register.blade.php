@extends('layouts.template')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('main')
<div class="container auth-container">
    <div class="row justify-content-center">

        <div class="col-xs-1 col-sm-2 col-md-4 col-lg-4"></div>
        <div class="auth-row col-xs-10 col-sm-8 col-md-4 col-lg-4">

                <div class="card-header">{{ __('ثبت نام') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('نام') }}</label><br />
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('آدرس ایمیل') }}</label><br />
                            <input id="email" type="text" name="email" value="{{ old('email') }}" required autocomplete="email"><br />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('رمز عبور') }}</label><br />
                            <input id="password" type="password" name="password" required autocomplete="new-password"><br />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password-confirm">{{ __('تکرار رمز عبور') }}</label><br />
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>


                        <div class="form-group">
                            <div class="offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ثبت نام') }}
                                </button><hr />
                                <a class="text-primary" href="{{ route('login') }}">
                                    {{ __('ورود') }}
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

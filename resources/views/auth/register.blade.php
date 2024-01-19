@extends('layouts.layout')

@section('content')
    <section class="container">
        <div class="row justify-content-center register__container">
            <div class="col-6">
                <img src="{{ asset('assets/img/register.png') }}" alt="" class="login__img">
            </div>
            <div class="col-6">
                <h1 class="login__title">{{ __('Register') }}</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label text-md-end">{{ __('Name') }}</label>

                        <div class="form-group">
                            <input id="name" type="text"
                                class="form-control input__custom @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="form-group">
                            <input id="email" type="email"
                                class="form-control input__custom @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-md-end">{{ __('Password') }}</label>

                        <div class="form-group">
                            <input id="password" type="password"
                                class="form-control input__custom @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control input__custom"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-auth">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

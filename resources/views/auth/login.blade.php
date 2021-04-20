@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection
@section('content')
    <div class="container mt-15">
        <div class="row">
            <div class="col s12 m10 offset-m1 l8 offset-l3">
                {{-- Card --}}
                <div class="card">
                    <div class="card-content">
                        <div class="card-title center">{{ __('Login') }}</div>
                        {{-- form --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="Placeholder" id="email" type="email" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        class="validate @error('email') is-invalid @enderror">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password"
                                        class="validate @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password">
                                    <label for="password">{{ __('Password') }}</label>
                                </div>
                            </div>


                            <div class="card-action center">
                                <button type="submit" class="btn waves-light blue-grey">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn waves-light blue-grey" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                        </form>
                        {{-- end form --}}
                    </div>
                </div>
                {{-- End card --}}
            </div>
        </div>
    </div>
@endsection

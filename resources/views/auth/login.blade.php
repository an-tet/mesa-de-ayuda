@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col m8">
                <div class="card">
                    <div class="card-title">{{ __('Login') }}</div>

                    <div class="card-content">
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

                            <div class=" row">
                                <label>
                                    <input type="checkbox" id="remember" name="remember"
                                        {{ old('remember') ? 'checked="checked"' : '' }} />
                                    <span for="remember">{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                            {{ old('remember') }}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

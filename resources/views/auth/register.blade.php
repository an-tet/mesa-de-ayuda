@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col s12 m2 offset-m1 l8 offset-l3">
                <div class="card">

                    <div class="card-content">
                        <span class="card-title center-align">{{ __('Register') }}</span>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <input type="hidden" name="idEmple" value="{{ $empleado->IDEMPLEADO }}">

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $empleado->NOMBRE }}" required autocomplete="name" autofocus
                                        readonly>
                                    <label for="name">{{ __('Name') }}</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input d="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $empleado->EMAIL }}" required autocomplete="email"
                                        readonly>
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
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <label for="password">{{ __('Password') }}</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class=" row">
                                <div class="col s12 center">
                                    <button type="submit" class="btn blue-grey">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

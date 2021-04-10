@extends('layouts.base')
@section('title', 'Consultar empleado')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Buscar empleado</h2>
            <div class="row">
                <form action={{ route('empleados.show') }} method="GET" class="col s12">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="IDEMPLEADO" required>
                            <label for="IDEMPLEADO">Id empleado</label>
                        </div>
                        @error('IDEMPLEADO')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="center">
                        <a href={{ route('empleados.index') }} class="btn waves-effect waves-light grey darken-2">
                            <i class="material-icons left">arrow_back</i>Volver
                        </a>
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Buscar
                            <i class="material-icons right">search</i>
                        </button>
                    </div>
                </form>
            </div>
            @if ($errors->any())
                @error('notExist')
                    <div class="alert alert-danger center" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            @endif

        </div>
    </div>
@endsection

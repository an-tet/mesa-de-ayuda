@extends('layouts.app')
@section('title', 'Crear cargos')

@section('content')
    <div class="container">
        <div class="card hiverable mt-18 p-3 hoverable">
            <h2 class="center-align">Crear nuevo cargo</h2>
            <div class="row">
                <form action={{ route('cargos.store') }} method="POST" class="col s12">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="NOMBRE" required>
                            <label for="NOMBRE">Nombre del cargo *</label>
                        </div>
                        @error('NOMBRE')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                        <small class="blue-grey-text right hide-on-med-and-down">Los campos que contengan un <span
                                class="bold">*</span> son
                            obligatorios</small>
                        <small class="blue-grey-text left hide-on-large-only">Los campos que contengan un <span
                                class="bold">*</span> son
                            obligatorios</small>
                    </div>
                    <div class="center">
                        <a href={{ route('cargos.index') }} class="btn waves-effect waves-light grey darken-2">
                            <i class="material-icons left">arrow_back</i>Volver
                        </a>
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Crear
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

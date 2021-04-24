@extends('layouts.app')
@section('title', 'Create areas')

@section('content')
    <div class="container">
        <div class="card hiverable mv-5 p-3 hoverable">
            <h2 class="center-align">Crear nueva área</h2>
            <div class="row">
                <form action={{ route('areas.store') }} method="POST" class="col s12">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="IDAREA" required>
                            <label for="IDAREA">Código del área *</label>
                        </div>
                        @error('IDAREA')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="NOMBRE" required>
                            <label for="NOMBRE">Nombre del área *</label>
                        </div>
                        @error('NOMBRE')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-0">
                        <select name="FKEMPLE">
                            <option value="" disabled selected>Asigne el jefe del área</option>
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->IDEMPLEADO }}">{{ $empleado->NOMBRE }}</option>
                            @endforeach
                        </select>
                    </div>
                    <small class="blue-grey-text right">Los campos que contengan un <span class="bold">*</span> son
                        obligatorios</small>
                    <div class="center mt-5">
                        <a href={{ route('areas.index') }} class="btn waves-effect waves-light grey darken-2">
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

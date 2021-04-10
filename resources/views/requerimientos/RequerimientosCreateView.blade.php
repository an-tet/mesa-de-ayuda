@extends('layouts.base')
@section('title', 'Create requerimiento')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Crear requerimiento</h2>
            <div class="row">
                <form action={{ route('requerimientos.store') }} method="POST" class="col s12">
                    @csrf
                    {{-- <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="IDREQ" required>
                            <label for="IDREQ">Id requerimientos</label>
                        </div>
                        @error('IDREQ')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div> --}}
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="OBSERVACION" required>
                            <label for="OBSERVACION">Observación</label>
                        </div>
                        @error('OBSERVACION')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <select name="fkAREA">
                            <option value="" disabled selected>Elija el area</option>
                            @foreach ($areas as $area)
                                <option value={{ $area->IDAREA }}>{{ $area->NOMBRE }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <select name="fkAREA">
                            <option value="" disabled selected>Asigne el empleado</option>
                            @foreach ($empleados as $empleado)
                                <option value={{ $empleado->IDEMPLEADO }}>{{ $empleado->NOMBRE }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="center">
                        <a href={{ route('requerimientos.index') }} class="btn waves-effect waves-light grey darken-2">
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

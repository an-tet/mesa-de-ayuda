@extends('layouts.app')
@section('title', 'Crear requerimiento')

@section('content')
    <div class="container">
        <div class="card hiverable mt-8 p-3 hoverable">
            <h2 class="center-align">Crear requerimiento</h2>
            <div class="row">
                <form action={{ route('requerimientos.store') }} method="POST" class="col s12">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea class="validate materialize-textarea" name="OBSERVACION" required></textarea>
                            <label for="OBSERVACION">Observación</label>
                            @error('OBSERVACION')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="FKAREA">
                                <option value="" disabled selected>Elija el area</option>
                                @foreach ($areas as $area)
                                    <option value={{ $area->IDAREA }}>{{ $area->NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="input-field col s6">
                            <select name="FKEMPLE">
                                <option value="" disabled selected>Empleado que crea el requerimiento</option>
                                @foreach ($empleados as $empleado)
                                    <option value={{ $empleado->IDEMPLEADO }}>{{ $empleado->NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="row">
                        {{-- <div class="input-field col s6">
                            <select name="
                            0.-
                            ++">
                                <option value="" disabled selected>Asigne el empleado</option>
                                @foreach ($empleados as $empleado)
                                    <option value={{ $empleado->IDEMPLEADO }}>{{ $empleado->NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="input-field col s6">
                            <select name="IDESTADO">
                                <option value="" disabled selected>Asigne el estado</option>
                                @foreach ($estados as $estado)
                                    <option value={{ $estado->IDESTADO }}>{{ $estado->NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div> --}}
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

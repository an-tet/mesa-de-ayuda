@extends('layouts.app')
@section('title', 'Modificar requerimiento')

@section('content')
    <div class="container">
        <div class="card hiverable mt-8 p-3 hoverable">
            <h2 class="center-align">Crear requerimiento</h2>

            <div class="row">
                <form action={{ route('requerimientos.update', $requerimiento->IDREQ) }} method="POST" class="col s12">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea class="validate materialize-textarea" name="OBSERVACION"
                                disabled>{{ $requerimiento->OBSERVACION }}</textarea>
                            <label for="OBSERVACION">Observación</label>
                            @error('OBSERVACION')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="FKAREA" disabled>
                                <option value="" disabled selected>Elija el area</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->IDAREA }}" @if ($requerimiento->FKAREA == $area->IDAREA) selected='selected' @endif>{{ $area->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field col s6">
                            <select name="FKEMPLE" disabled>
                                <option value="" disabled selected>Empleado que crea el requerimiento</option>
                                @foreach ($empleados as $empleado)
                                    <option value={{ $empleado->IDEMPLEADO }} @if ($requerimiento->FKEMPLE == $empleado->IDEMPLEADO) selected='selected' @endif>{{ $empleado->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="FKEMPLEASIGNADO" disabled>
                                <option value="" disabled selected>Asigne el empleado</option>
                                @foreach ($empleados as $empleado)
                                    <option value={{ $empleado->IDEMPLEADO }} @if ($requerimiento->FKEMPLEASIGNADO == $empleado->IDEMPLEADO) selected='selected' @endif>{{ $empleado->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field col s6">
                            <select name="FKESTADO">
                                <option value="" disabled selected>Asigne el estado</option>
                                @foreach ($estados as $estado)
                                    <option value={{ $estado->IDESTADO }} @if ($requerimiento->FKESTADO == $estado->IDESTADO) selected='selected' @endif @if ($estado->IDESTADO == 1)disabled
                                @endif>{{ $estado->NOMBRE }}
                                </option>
                                @endforeach
                            </select>
                            @error('FKESTADO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="center">
                        <a href={{ route('requerimientos.index') }} class="btn waves-effect waves-light grey darken-2">
                            <i class="material-icons left">arrow_back</i>Volver
                        </a>
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Modificar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

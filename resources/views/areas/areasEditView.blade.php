@extends('layouts.app')
@section('title', 'Modificar areas')

@section('content')
    <div class="container">
        <div class="card hiverable mt-13 p-3 hoverable">
            <h2 class="center-align">Modificar área</h2>
            <div class="row">
                <form action="{{ route('areas.update', $area->IDAREA) }}" method="POST" class="col s12">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="NOMBRE" value="{{ $area->NOMBRE }}" required>
                            <label for="NOMBRE">Nombre área *</label>
                            @error('NOMBRE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <select name="FKEMPLE">
                                <option value="" selected>Asigne el jefe del área</option>
                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->IDEMPLEADO }}" @if ($empleado->IDEMPLEADO == $area->FKEMPLE) selected='selected' @endif>{{ $empleado->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <small class="blue-grey-text right">Los campos que contengan un <span class="bold">*</span> son
                            obligatorios</small>
                    </div>
                    <div class="center mt-5">
                        <a href={{ route('areas.index') }} class="btn waves-effect waves-light grey darken-2">
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

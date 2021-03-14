@extends('layouts.base')
@section('title', 'Modificar empleados')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Modificar empleado</h2>
            <div class="row">
                <form action={{ route('empleados.update', $empleado->idEmpleado) }} method="POST" class="col s12">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="nombre" value={{ $empleado->nombre }}>
                            <label for="nombre">Nombre</label>
                            @error('nombre')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" value={{ $empleado->idEmpleado }} name="idEmpleado" required>
                            <label for="idEmpleado">Id Empleado</label>
                            @error('idEmpleado')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="fkIdArea" value={{ $empleado->fkIdArea }}
                                required>
                            <label for="fkIdArea">fkIdArea</label>
                            @error('fkIdArea')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="fkEmple" value={{ $empleado->fkEmple }} required>
                            <label for="fkEmple">fkEmple</label>
                            @error('fkEmple')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="email" class="validate" name="email" value={{ $empleado->email }} required>
                            <label for="email">email</label>
                            @error('email')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="cargo" value={{ $empleado->cargo }} required>
                            <label for="cargo">cargo</label>
                            @error('cargo')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="telefono" value={{ $empleado->telefono }}
                                required>
                            <label for="telefono">telefono</label>
                            @error('telefono')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="center">
                        <a href={{ route('empleados.index') }} class="btn waves-effect waves-light grey darken-2">
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

@extends('layouts.base')
@section('title', 'Crear empleados')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Crear empleado</h2>
            <div class="row">
                <form action={{ route('empleados.store') }} method="POST" class="col s12">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="NOMBRE">
                            <label for="NOMBRE">NOMBRE</label>
                            @error('NOMBRE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="IDEMPLEADO" required>
                            <label for="IDEMPLEADO">Id Empleado</label>
                            @error('IDEMPLEADO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="fkIdArea" required>
                            <label for="fkIdArea">fkIdArea</label>
                            @error('fkIdArea')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="FOTO" required>
                            <label for="FOTO">FOTO</label>
                            @error('FOTO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="HOJAVIDA" required>
                            <label for="HOJAVIDA">HOJAVIDA</label>
                            @error('HOJAVIDA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="TELEFONO" required>
                            <label for="TELEFONO">TELEFONO</label>
                            @error('TELEFONO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="email" class="validate" name="EMAIL" required>
                            <label for="EMAIL">EMAIL</label>
                            @error('EMAIL')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="DIRECCION" required>
                            <label for="DIRECCION">DIRECCION</label>
                            @error('DIRECCION')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="Y" required>
                            <label for="Y">Y</label>
                            @error('Y')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="X" required>
                            <label for="X">X</label>
                            @error('X')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="fkEMPLE_JEFE" required>
                            <label for="fkEMPLE_JEFE">fkEMPLE_JEFE</label>
                            @error('fkEMPLE_JEFE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="email" class="validate" name="fkAREA" required>
                            <label for="fkAREA">fkAREA</label>
                            @error('fkAREA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <select>
                                <option value="" disabled selected>Elija su opción</option>
                                <option value="1">Option 1</option>
                            </select>
                            <label>Cargo</label>
                        </div>
                        <div class="input-field col s4">
                            <select>
                                <option value="" disabled selected>Elija su opción</option>
                                <option value="1">Option 1</option>
                            </select>
                            <label>Area</label>
                        </div>
                    </div>
                    <div class="center">
                        <a href={{ route('empleados.index') }} class="btn waves-effect waves-light grey darken-2">
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

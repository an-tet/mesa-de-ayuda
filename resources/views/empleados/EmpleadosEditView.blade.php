@extends('layouts.base')
@section('title', 'Modificar empleados')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Modificar empleado</h2>
            <div class="row">
                <form action={{ route('empleados.update', $empleado->IDEMPLEADO) }} method="POST" class="col s12">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" value={{ $empleado->IDEMPLEADO }} name="IDEMPLEADO"
                                required>
                            <label for="IDEMPLEADO">Id Empleado</label>
                            @error('IDEMPLEADO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="NOMBRE" value={{ $empleado->NOMBRE }}>
                            <label for="NOMBRE">Nombre</label>
                            @error('NOMBRE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="FOTO" value={{ $empleado->FOTO }} required>
                            <label for="FOTO">FOTO</label>
                            @error('FOTO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="HOJAVIDA" value={{ $empleado->HOJAVIDA }} required>
                            <label for="HOJAVIDA">HOJAVIDA</label>
                            @error('HOJAVIDA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="number" class="validate" name="TELEFONO" value={{ $empleado->TELEFONO }}
                                required>
                            <label for="TELEFONO">TELEFONO</label>
                            @error('TELEFONO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="email" class="validate" name="EMAIL" value={{ $empleado->EMAIL }} required>
                            <label for="EMAIL">EMAIL</label>
                            @error('EMAIL')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="DIRECCION" value={{ $empleado->DIRECCION }}
                                required>
                            <label for="DIRECCION">DIRECCION</label>
                            @error('DIRECCION')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="X" value={{ $empleado->X }} required>
                            <label for="X">X</label>
                            @error('X')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="Y" value={{ $empleado->Y }} required>
                            <label for="Y">Y</label>
                            @error('Y')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="fkEMPLE_JEFE" value={{ $empleado->fkEMPLE_JEFE }}
                                required>
                            <label for="fkEMPLE_JEFE">fkEMPLE_JEFE</label>
                            @error('fkEMPLE_JEFE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="fkAREA" value={{ $empleado->fkAREA }} required>
                            <label for="fkAREA">fkAREA</label>
                            @error('fkAREA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
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

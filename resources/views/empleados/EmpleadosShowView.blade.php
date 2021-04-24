@extends('layouts.app')
@section('title', 'Consultar empleado')

@section('content')
    <div class="container">
        <div class="card hiverable mt-5 p-3 hoverable">
            <h2 class="center-align">Empleado</h2>
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="black-text" disabled value={{ $empleado->IDEMPLEADO }}>
                        <label for="IDEMPLEADO">Código empleado</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <input type="text" class="black-text" disabled value={{ $empleado->NOMBRE }}>
                        <label for="NOMBRE">Nombre</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="text" class="black-text" disabled value={{ $empleado->FOTO }}>
                        <label for="FOTO">Foto</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="text" class="black-text" disabled value={{ $empleado->HOJAVIDA }}>
                        <label for="HOJAVIDA">Hoja de vida</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="number" class="black-text" disabled value={{ $empleado->TELEFONO }}>
                        <label for="TELEFONO">Teléfono</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="email" class="black-text" disabled value={{ $empleado->EMAIL }}>
                        <label for="EMAIL">Correo electrónico</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->DIRECCION }}>
                        <label for="DIRECCION">Direccón</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" class="black-text" disabled value={{ $empleado->X }}>
                        <label for="X">Coordenada X</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" class="black-text" disabled value={{ $empleado->Y }}>
                        <label for="Y">Coordenada Y</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->fkEMPLE_JEFE }}>
                        <label for="fkEMPLE_JEFE">Jefe inmediato</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->fkAREA }}>
                        <label for="fkAREA">Area</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->NOMBRE_CARGO }}>
                        <label for="NOMBRE_CARGO">Cargo</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->FECHAINI }}>
                        <label for="FECHAINI">Fecha de inicio</label>
                    </div>
                </div>
                <div class="center">
                    <a href={{ route('empleados.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                        <i class="material-icons left">arrow_back</i>Volver
                    </a>
                    <a href={{ route('empleados.edit', $empleado->IDEMPLEADO) }}
                        class="btn waves-effect waves-light grey darken-2">
                        <i class="material-icons left">create</i>Modificar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

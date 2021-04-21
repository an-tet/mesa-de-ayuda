@extends('layouts.app')
@section('title', 'Consultar empleado')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Empleado</h2>
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="black-text" disabled value={{ $empleado->IDEMPLEADO }}>
                        <label for="IDEMPLEADO">IDEMPLEADO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" class="black-text" disabled value={{ $empleado->NOMBRE }}>
                        <label for="NOMBRE">NOMBRE</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" class="black-text" disabled value={{ $empleado->FOTO }}>
                        <label for="FOTO">FOTO</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" class="black-text" disabled value={{ $empleado->HOJAVIDA }}>
                        <label for="HOJAVIDA">HOJAVIDA</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="number" class="black-text" disabled value={{ $empleado->TELEFONO }}>
                        <label for="TELEFONO">TELEFONO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="email" class="black-text" disabled value={{ $empleado->EMAIL }}>
                        <label for="EMAIL">EMAIL</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->DIRECCION }}>
                        <label for="DIRECCION">DIRECCION</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" class="black-text" disabled value={{ $empleado->X }}>
                        <label for="X">X</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" class="black-text" disabled value={{ $empleado->Y }}>
                        <label for="Y">Y</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->fkEMPLE_JEFE }}>
                        <label for="fkEMPLE_JEFE">fkEMPLE_JEFE</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" disabled value={{ $empleado->fkAREA }}>
                        <label for="fkAREA">fkAREA</label>
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
                </div>
            </div>
        </div>
    </div>
@endsection

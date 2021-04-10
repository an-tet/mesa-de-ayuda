@extends('layouts.base')
@section('title', 'Consultar empleado')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Crear empleado</h2>
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="black-text" value={{ $empleado->IDEMPLEADO }} disabled>
                        <label for="IDEMPLEADO">IDEMPLEADO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" class="black-text" value={{ $empleado->NOMBRE }} disabled>
                        <label for="NOMBRE">NOMBRE</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" class="black-text" value={{ $empleado->FOTO }} disabled>
                        <label for="FOTO">FOTO</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" class="black-text" value={{ $empleado->HOJAVIDA }} disabled>
                        <label for="HOJAVIDA">HOJAVIDA</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="number" class="black-text" value={{ $empleado->TELEFONO }} disabled>
                        <label for="TELEFONO">TELEFONO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="email" class="black-text" value={{ $empleado->EMAIL }} disabled>
                        <label for="EMAIL">EMAIL</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" value={{ $empleado->DIRECCION }} disabled>
                        <label for="DIRECCION">DIRECCION</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" class="black-text" value={{ $empleado->X }} disabled>
                        <label for="X">X</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" class="black-text" value={{ $empleado->Y }} disabled>
                        <label for="Y">Y</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" value={{ $empleado->fkEMPLE_JEFE }} disabled>
                        <label for="fkEMPLE_JEFE">fkEMPLE_JEFE</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="black-text" value={{ $empleado->fkAREA }} disabled>
                        <label for="fkAREA">fkAREA</label>
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

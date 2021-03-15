@extends('layouts.base')
@section('title', 'Consultar empleado')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Crear empleado</h2>
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="black-text" value={{ $empleado->nombre }} disabled>
                        <label for="nombre">Nombre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" class="black-text" value={{ $empleado->idEmpleado }} disabled>
                        <label for="idEmpleado">Id Empleado</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="number" class="black-text" value={{ $empleado->fkIdArea }} disabled>
                        <label for="fkIdArea">fkIdArea</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" class="black-text" value={{ $empleado->fkEmple }} disabled>
                        <label for="fkEmple">fkEmple</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" class="black-text" value={{ $empleado->email }} disabled>
                        <label for="email">email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" class="black-text" value={{ $empleado->cargo }} disabled>
                        <label for="cargo">cargo</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" class="black-text" value={{ $empleado->telefono }} disabled>
                        <label for="telefono">telefono</label>
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

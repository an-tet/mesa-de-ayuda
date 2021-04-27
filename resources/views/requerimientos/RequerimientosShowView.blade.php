@extends('layouts.app')
@section('title', 'Consultar requerimiento')

@section('content')
    <div class="container">
        <div class="card hiverable mt-5 p-3 hoverable">
            <h2 class="center-align">Requerimiento</h2>
            <div class="row">
                <div class="row">
                    <div class="input-field col s12 m3">
                        <input type="text" class="black-text" disabled value={{ $requerimiento->FKREQ }}>
                        <label for="IDDETALLE">Código requerimiento</label>
                    </div>
                    <div class="input-field col s12 m3">
                        <input type="text" class="black-text" disabled value={{ $requerimiento->FECHA }}>
                        <label for="FECHA">Fecha</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" class="black-text" disabled value={{ $requerimiento->FKESTADO }}>
                        <label for="FKESTADO">Estado</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea class="validate materialize-textarea" name="OBSERVACION"
                            disabled>{{ $requerimiento->OBSERVACION }}</textarea>
                        <label for="OBSERVACION">Observación</label>
                    </div>
                </div>
                <div class="row">

                    <div class="input-field col s12 m6">
                        <input type="text" class="black-text" disabled value={{ $requerimiento->FKEMPLE }}>
                        <label for="FKEMPLE">Creador</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" class="black-text" disabled value={{ $requerimiento->FKEMPLEASIGNADO }}>
                        <label for="FKEMPLEASIGNADO">Empleado asignado</label>
                    </div>
                </div>
                <div class="center">
                    <a href={{ route('requerimientos.show_resource') }}
                        class="btn waves-effect waves-light grey darken-2">
                        <i class="material-icons left">arrow_back</i>Volver
                    </a>
                    <a href={{ route('requerimientos.edit', $requerimiento->FKREQ) }}
                        class="btn waves-effect waves-light grey darken-2" @if ($requerimiento)  @endif>
                        <i class="material-icons left">create</i>Modificar
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection

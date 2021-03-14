@extends('layouts.base')
@section('title', 'Consultar empleados')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col s12">
                    <table class="list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="center-align" scope="col">Id empleado</th>
                                    <th class="center-align" scope="col">nombre</th>
                                    <th class="center-align" scope="col">telefono</th>
                                    <th class="center-align" scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td class="center-align" scope="row">{{ $empleado->idEmpleado }}</td>
                                        <td class="center-align">{{ $empleado->nombre }}</td>
                                        <td class="center-align">{{ $empleado->telefono }}</td>
                                        <td class="center-align">
                                            <a href={{ route('empleados.edit', $empleado->idEmpleado) }}
                                                class="waves-effect waves-light btn-small grey darken-2">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <form style="display: inline-block;"
                                                action={{ route('empleados.destroy', $empleado->idEmpleado) }}
                                                method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="waves-effect waves-light btn-small grey darken-2"
                                                    type="submit">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </table>
                </div>
            </div>
            <div class="center">
                <a href={{ route('index.index') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons left">arrow_back</i>Volver
                </a>
            </div>
        </div>
        <div class="center">
            <a href={{ route('empleados.create') }} class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
@endsection

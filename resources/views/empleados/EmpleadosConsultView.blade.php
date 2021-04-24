@extends('layouts.app')
@section('title', 'Consultar empleados')

@section('content')
    <div class="container">
        <div class="card hiverable mt-15 p-3 hoverable">
            <div class="row">
                <div class="col s12">
                    <table class="list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="center-align" scope="col">Id empleado</th>
                                    <th class="center-align" scope="col">Nombre</th>
                                    <th class="center-align" scope="col">Telefono</th>
                                    <th class="center-align hide-on-med-and-down" scope="col">Email</th>
                                    <th class="center-align" scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td class="center-align" scope="row">{{ $empleado->IDEMPLEADO }}</td>
                                        <td class="center-align">{{ $empleado->NOMBRE }}</td>
                                        <td class="center-align">{{ $empleado->TELEFONO }}</td>
                                        <td class="center-align hide-on-med-and-down">{{ $empleado->EMAIL }}</td>
                                        <td class="inline-flex-w100 center-flex-w">
                                            <a href={{ route('empleados.edit', $empleado->IDEMPLEADO) }}
                                                class="waves-effect waves-light btn-small grey darken-2 mr-2">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <form action={{ route('empleados.destroy', $empleado->IDEMPLEADO) }}
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
                <a href={{ route('home.index') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons left">arrow_back</i>Volver
                </a>
                <a href={{ route('empleados.create') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons left">add</i>Crear
                </a>
                <a href={{ route('empleados.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons right">search</i>Buscar
                </a>
                @error('deleteError')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>
    </div>
@endsection

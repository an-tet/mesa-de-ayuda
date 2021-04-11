@extends('layouts.base')
@section('title', 'Consultar requerimientos')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col s12">
                    <table class="list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="center-align" scope="col">Id Detalle del requerimiento</th>
                                    <th class="center-align" scope="col">Fecha de creación</th>
                                    <th class="center-align" scope="col">Observación</th>
                                    <th class="center-align" scope="col">Area</th>
                                    <th class="center-align" scope="col">Creador</th>
                                    <th class="center-align" scope="col">Encargado</th>
                                    <th class="center-align" scope="col">Estado</th>
                                    <th class="center-align" scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requerimientos as $requerimiento)
                                    <tr>
                                        <td class="center-align" scope="row">{{ $requerimiento->IDDETALLE }}</td>
                                        <td class="center-align" scope="row">{{ $requerimiento->FECHA }}</td>
                                        <td class="center-align">{{ $requerimiento->OBSERVACION }}</td>
                                        <td class="center-align">{{ $requerimiento->FKAREA }}</td>
                                        <td class="center-align">{{ $requerimiento->FKEMPLE }}</td>
                                        <td class="center-align">{{ $requerimiento->FKEMPLEASIGNADO }}</td>
                                        <td class="center-align">{{ $requerimiento->FKESTADO }}</td>

                                        <td class="center-align">
                                            <a href={{ route('requerimientos.index', $requerimiento->IDREQ) }}
                                                class="waves-effect waves-light btn-small grey darken-2">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <form style="display: inline-block;"
                                                action={{ route('requerimientos.destroy', $requerimiento->IDREQ) }}
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
            @error('errorEliminar')
                <div class="alert alert-danger center" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="center">
                <a href={{ route('index.index') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons left">arrow_back</i>Volver
                </a>
                <a href={{ route('areas.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons right">search</i>Buscar
                </a>
            </div>
        </div>
        <div class="center">
            <a href={{ route('requerimientos.create') }} class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
@endsection

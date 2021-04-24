@extends('layouts.app')
@section('title', 'Consultar requerimientos')

@section('content')
    <div class="container">
        <div class="card hiverable mt-15 p-3 hoverable">
            <div class="row">
                <div class="col s12">
                    <table class="list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="center-align" scope="col">Código</th>
                                    <th class="center-align" scope="col">Fecha de creación</th>
                                    <th class="center-align" scope="col">Observación</th>
                                    <th class="center-align hide-on-med-and-down" scope="col">Area</th>
                                    <th class="center-align hide-on-med-and-down" scope="col">Creador</th>
                                    <th class="center-align hide-on-med-and-down" scope="col">Encargado</th>
                                    <th class="center-align hide-on-med-and-down" scope="col">Estado</th>
                                    <th class="center-align" scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requerimientos as $requerimiento)
                                    <tr>
                                        <td class="center-align" scope="row">{{ $requerimiento->IDDETALLE }}</td>
                                        <td class="center-align" scope="row">
                                            {{ date('d-m-Y', strtotime($requerimiento->FECHA)) }}</td>
                                        <td class="center-align">{{ substr($requerimiento->OBSERVACION, 0, 20) }}....</td>
                                        <td class="center-align hide-on-med-and-down">{{ $requerimiento->FKAREA }}</td>
                                        <td class="center-align hide-on-med-and-down">{{ $requerimiento->FKEMPLE }}</td>
                                        <td class="center-align hide-on-med-and-down">
                                            {{ $requerimiento->FKEMPLEASIGNADO }}</td>
                                        <td class="center-align hide-on-med-and-down">{{ $requerimiento->FKESTADO }}</td>

                                        <td class="center-align">
                                            <a href={{ route('requerimientos.edit', $requerimiento->IDREQ) }}
                                                class="waves-effect waves-light btn-small grey darken-2">
                                                <i class="material-icons">create</i>
                                            </a>
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
                <a href={{ route('home.index') }} class="btn waves-effect waves-light grey darken-2">
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

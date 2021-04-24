@extends('layouts.app')
@section('title', 'Consultar areas')

@section('content')
    <div class="container">
        <div class="card hiverable mt-15 pv-3 hoverable">
            <div class="row">
                <div class="col s12">
                    <table class="list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="center-align" scope="col">Código</th>
                                    <th class="center-align" scope="col">Nombre</th>
                                    <th class="center-align" scope="col">Jefe de área</th>
                                    <th class="center-align" scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($areas as $area)
                                    <tr>
                                        <td class="center-align" scope="row">{{ $area->IDAREA }}</td>
                                        <td class="center-align">{{ $area->NOMBRE }}</td>
                                        <td class="center-align">{{ $area->FKEMPLE }}</td>
                                        <td class="center-align">
                                            <a href={{ route('areas.edit', $area->IDAREA) }}
                                                class="waves-effect waves-light btn-small grey darken-2">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <form style="display: inline-block;"
                                                action={{ route('areas.destroy', $area->IDAREA) }} method="POST">
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
                <a href={{ route('areas.create') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons left">add</i>Crear
                </a>
                <a href={{ route('areas.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons left">search</i>Buscar
                </a>
                @error('errorEliminar')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
@endsection

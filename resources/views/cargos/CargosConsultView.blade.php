@extends('layouts.app')
@section('title', 'Consultar cargos')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col s12">
                    <table class="list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="center-align" scope="col">Id area</th>
                                    <th class="center-align" scope="col">Nombre</th>
                                    <th class="center-align" scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargos as $cargo)
                                    <tr>
                                        <td class="center-align" scope="row">{{ $cargo->IDCARGO }}</td>
                                        <td class="center-align">{{ $cargo->NOMBRE }}</td>
                                        <td class="center-align">
                                            <a href={{ route('cargos.edit', $cargo->IDCARGO) }}
                                                class="waves-effect waves-light btn-small grey darken-2">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <form style="display: inline-block;"
                                                action={{ route('cargos.destroy', $cargo->IDCARGO) }} method="POST">
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
            {{-- @error('errorEliminar')
                <div class="alert alert-danger center" role="alert">
                    {{ $message }}
                </div>
            @enderror --}}
            <div class="center">
                <a href={{ route('home.index') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons left">arrow_back</i>Volver
                </a>
                <a href={{ route('cargos.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                    <i class="material-icons right">search</i>Buscar
                </a>
            </div>
        </div>
        <div class="center">
            <a href={{ route('cargos.create') }} class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
@endsection

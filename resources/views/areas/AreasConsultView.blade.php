@extends('layouts.base')
@section('title', 'Consultar areas')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col s12">
                    <table class="list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id area</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">fkRmple</th>
                                    <th scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($areas as $area)
                                    <tr>
                                        <th scope="row">{{ $area->idArea }}</th>
                                        <td>{{ $area->nombreArea }}</td>
                                        <td>{{ $area->fkRmple }}</td>
                                        <td>
                                            <a href={{ route('areas.edit', $area->idArea) }}
                                                class="waves-effect waves-light btn-small white-text">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <form style="display: inline-block;"
                                                action={{ route('areas.destroy', $area->idArea) }} method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="waves-effect waves-light btn-small white-text" type="submit">
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
        </div>
        <div class="center">
            <a href={{ route('areas.create') }} class="btn-floating btn-large waves-effect waves-light red">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
@endsection

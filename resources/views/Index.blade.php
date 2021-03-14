@extends('layouts.base')
@section('title', 'Inicio')


@section('content')

    <div class="jumbotron">
        <div class="row">
            <div class="col s12 m4 offset-m3">
                <a class="waves-effect waves-light btn-large grey darken-2" href={{ route('areas.index') }}>Areas</a>
            </div>
            <div class="col s12 m5">
                <a class="waves-effect waves-light btn-large grey darken-2"
                    href={{ route('empleados.index') }}>Empleados</a>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.base')

@section('content')

    <div class="jumbotron">
        <div class="row">
            <div class="col s12 m3 offset-m1">
                <a class="waves-effect waves-light btn-large grey darken-2" href={{ route('areas.index') }}>Areas</a>
            </div>
            <div class="col s12 m3 offset-m1">
                <a class="waves-effect waves-light btn-large grey darken-2"
                    href={{ route('empleados.index') }}>Empleados</a>
            </div>
            <div class="col s12 m3 offset-m1">
                <a class="waves-effect waves-light btn-large grey darken-2" href={{ route('cargos.index') }}>Cargos</a>
            </div>
        </div>
    </div>
@endsection

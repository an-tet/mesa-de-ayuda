@extends('layouts.base')
@section('title', 'Consultar area')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Modificar area</h2>
            <div class="row">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="nombreArea" value={{ $area->nombreArea }}
                            disabled>
                        <label for="nombreArea">Nombre area</label>
                    </div>
                    @error('nombreArea')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="fkRmple" value={{ $area->fkRmple }} disabled>
                        <label for="fkRmple">fkRmple</label>
                    </div>
                    @error('fkRmple')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="center">
                    <a href={{ route('areas.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                        <i class="material-icons left">arrow_back</i>Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection()

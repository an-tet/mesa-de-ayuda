@extends('layouts.base')
@section('title', 'Consultar area')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Modificar area</h2>
            <div class="row">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="IDAREA" value={{ $area->IDAREA }} disabled>
                        <label for="IDAREA">IDAREA</label>
                    </div>
                    @error('IDAREA')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="NOMBRE" value={{ $area->NOMBRE }} disabled>
                        <label for="NOMBRE">Nombre area</label>
                    </div>
                    @error('NOMBRE')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="FKEMPLE" disabled value={{ $area->FKEMPLE }}>
                        <label for="FKEMPLE">FKEMPLE</label>
                    </div>
                    @error('FKEMPLE')
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
@endsection

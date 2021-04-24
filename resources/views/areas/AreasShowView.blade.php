@extends('layouts.app')
@section('title', 'Consultar area')

@section('content')
    <div class="container">
        <div class="card hiverable mt-10 p-3 hoverable">
            <h2 class="center-align">Area</h2>
            <div class="row">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="IDAREA" value={{ $area->IDAREA }} disabled>
                        <label for="IDAREA">Código del area</label>
                    </div>
                    @error('IDAREA')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="NOMBRE" value={{ $area->NOMBRE }} disabled>
                        <label for="NOMBRE">Nombre del area</label>
                    </div>
                    @error('NOMBRE')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="FKEMPLE" disabled value={{ $area->FKEMPLE }}>
                        <label for="FKEMPLE">Jefe del area</label>
                    </div>
                    @error('FKEMPLE')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="center">
                    <a href={{ route('areas.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                        <i class="material-icons left">arrow_back</i>Volver
                    </a>
                    <a href={{ route('areas.edit', $area->IDAREA) }} class="btn waves-effect waves-light grey darken-2">
                        <i class="material-icons left">create</i>Modificar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

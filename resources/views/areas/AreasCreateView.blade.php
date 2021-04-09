@extends('layouts.base')
@section('title', 'Create areas')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Modificar area</h2>
            <div class="row">
                <form action={{ route('areas.store') }} method="POST" class="col s12">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="IDAREA" required>
                            <label for="IDAREA">IDAREA</label>
                        </div>
                        @error('IDAREA')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="NOMBRE" required>
                            <label for="NOMBRE">Nombre area</label>
                        </div>
                        @error('NOMBRE')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="FKEMPLE">
                            <label for="FKEMPLE">FKEMPLE</label>
                        </div>
                        @error('FKEMPLE')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="center">
                        <a href={{ route('areas.index') }} class="btn waves-effect waves-light grey darken-2">
                            <i class="material-icons left">arrow_back</i>Volver
                        </a>
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Crear
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

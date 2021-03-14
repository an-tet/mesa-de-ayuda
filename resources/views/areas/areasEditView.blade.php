@extends('layouts.base')
@section('title', 'Editar areas')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Modificar area</h2>
            <div class="row">
                <form action={{ route('areas.update', $area->idArea) }} method="POST" class="col s12">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="nombreArea" value={{ $area->nombreArea }} required>
                            <label for="nombreArea">Nombre area</label>
                        </div>
                        @error('nombreArea')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="fkRmple" value={{ $area->fkRmple }} required>
                            <label for="fkRmple">fkRmple</label>
                        </div>
                        @error('fkRmple')
                            <small class="red-text">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="center">
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Modificar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()

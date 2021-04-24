@extends('layouts.app')
@section('title', 'Consultar area')

@section('content')
    <div class="container">
        <div class="card hiverable mt-10 p-3 hoverable">
            <h2 class="center-align">Buscar cargo</h2>
            <div class="row">

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="IDCARGO" value={{ $cargo->IDCARGO }}
                            disabled>
                        <label for="IDCARGO">Id cargo</label>
                    </div>
                    @error('IDCARGO')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="validate black-text" name="NOMBRE" value={{ $cargo->NOMBRE }} disabled>
                        <label for="NOMBRE">Nombre cargo</label>
                    </div>
                    @error('NOMBRE')
                        <small class="red-text">{{ $message }}</small>
                    @enderror
                </div>
                <div class="center">
                    <a href={{ route('cargos.show_resource') }} class="btn waves-effect waves-light grey darken-2">
                        <i class="material-icons left">arrow_back</i>Volver
                    </a>
                    <a href={{ route('cargos.edit', $cargo->IDCARGO) }}
                        class="btn waves-effect waves-light grey darken-2">
                        <i class=" material-icons left">create</i>Modificar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('title', 'Modificar empleados')
@section('scripts')
    <script src={{ asset('/js/empleado.js') }}></script>
@endsection
@section('content')
    <div class="container">
        <div class="card hiverable mt-5 p-3 hoverable">
            <h2 class="center-align">Modificar empleado</h2>
            <div class="row">
                <form action={{ route('empleados.update', $empleado->IDEMPLEADO) }} method="POST" class="col s12"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="NOMBRE" value="{{ $empleado->NOMBRE }}">
                            <label for="NOMBRE">Nombre *</label>
                            @error('NOMBRE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="datepicker validate" name="FECHAINI" required
                                value="{{ $empleado->FECHAINI }}">
                            <label for="FECHAINI">Fecha de inicio *</label>
                            @error('FECHAINI')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="input-field col s12 m6">
                            <div class="file-field">
                                <div class="btn grey darken-2">
                                    <span>Foto</span>
                                    <input type="file" id="foto" name="FOTO">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value="{{ $empleado->FOTO }}">
                                </div>
                                @error('FOTO')
                                    <small class="red-text">{{ $message }}</small>
                                @enderror
                                <div id="foto-preview">

                                </div>
                            </div>
                        </div>
                        <div class="input-field col s12 m6">
                            <div class="file-field">
                                <div class="btn grey darken-2">
                                    <span>Hoja de vida</span>
                                    <input type="file" id="hv" name="HOJAVIDA">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value="{{ $empleado->HOJAVIDA }}">
                                </div>
                                @error('HOJAVIDA')
                                    <small class="red-text">{{ $message }}</small>
                                @enderror
                                <div id="hv-preview">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="TELEFONO" required
                                value={{ $empleado->TELEFONO }}>
                            <label for="TELEFONO">Teléfono *</label>
                            @error('TELEFONO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="email" class="validate" name="EMAIL" required value="{{ $empleado->EMAIL }}">
                            <label for="EMAIL">Correo electrónico *</label>
                            @error('EMAIL')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="DIRECCION" required
                                value={{ $empleado->DIRECCION }}>
                            <label for="DIRECCION">Dirección *</label>
                            @error('DIRECCION')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="Y" min="-90" max="90" required
                                value="{{ $empleado->Y }}">
                            <label for="Y">Coordenada Y</label>
                            @error('Y')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="X" min="-180" max="180" required
                                value="{{ $empleado->X }}">
                            <label for="X">Coordenada X</label>
                            @error('X')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <select name="FKCARGO">
                                <option value="" disabled>Elija su opción</option>
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->IDCARGO }}" @if ($empleado->IDCARGO == $cargo->IDCARGO) selected='selected' @endif>{{ $cargo->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Cargo</label>
                            @error('FKCARGO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <select name="fkAREA">
                                <option value="" disabled>Elija su opción</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->IDAREA }}" @if ($area->IDAREA == $empleado->fkAREA) selected='selected' @endif> {{ $area->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Area *</label>
                            @error('fkAREA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="center">
                        <a href={{ route('empleados.index') }} class="btn waves-effect waves-light grey darken-2">
                            <i class="material-icons left">arrow_back</i>Volver
                        </a>
                        <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Modificar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

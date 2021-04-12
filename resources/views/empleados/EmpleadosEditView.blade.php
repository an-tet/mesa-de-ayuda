@extends('layouts.base')
@section('title', 'Modificar empleados')
@section('scripts')
    <script src={{ asset('/js/empleado.js') }}></script>
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="center-align">Modificar empleado</h2>
            <div class="row">
                <form action={{ route('empleados.update', $empleado->IDEMPLEADO) }} method="POST" class="col s12"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="IDEMPLEADO" value={{ $empleado->IDEMPLEADO }}
                                required>
                            <label for="IDEMPLEADO">Id Empleado</label>
                            @error('IDEMPLEADO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="NOMBRE" value={{ $empleado->NOMBRE }}>
                            <label for="NOMBRE">NOMBRE</label>
                            @error('NOMBRE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="text" class="datepicker" name="FECHAINI" required
                                value={{ $empleado->FECHAINI }}>
                            @error('FECHAINI')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn grey darken-2">
                                    <span>Foto</span>
                                    <input type="file" name="FOTO">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value={{ $empleado->FOTO }}>
                                </div>
                            </div>
                            @error('FOTO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <div class="file-field input-field">
                                <div class="btn grey darken-2">
                                    <span>Hoja de vida</span>
                                    <input type="file" name="HOJAVIDA">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" value={{ $empleado->HOJAVIDA }}>
                                </div>
                            </div>
                            @error('HOJAVIDA')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number" class="validate" name="TELEFONO" required
                                value={{ $empleado->TELEFONO }}>
                            <label for="TELEFONO">TELEFONO</label>
                            @error('TELEFONO')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s6">
                            <input type="email" class="validate" name="EMAIL" required value={{ $empleado->EMAIL }}>
                            <label for="EMAIL">EMAIL</label>
                            @error('EMAIL')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="DIRECCION" required
                                value={{ $empleado->DIRECCION }}>
                            <label for="DIRECCION">DIRECCION</label>
                            @error('DIRECCION')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="Y" required value={{ $empleado->Y }}>
                            <label for="Y">Y</label>
                            @error('Y')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="X" required value={{ $empleado->X }}>
                            <label for="X">X</label>
                            @error('X')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="input-field col s4">
                            <input type="number" class="validate" name="fkEMPLE_JEFE"
                                value={{ $empleado->fkEMPLE_JEFE }}>
                            <label for="fkEMPLE_JEFE">fkEMPLE_JEFE</label>
                            @error('fkEMPLE_JEFE')
                                <small class="red-text">{{ $message }}</small>
                            @enderror
                        </div> --}}
                        {{ $empleado->IDEMPLEADO }}
                        {{-- <div class="input-field col s4">
                            <select name="fkEMPLE_JEFE">
                                <option value="" disabled>fkEMPLE_JEFE</option>
                                @foreach ($empleados as $empleadose)
                                    <option value={{ $empleadose->IDEMPLEADO }} @if ($empleado->IDEMPLEADO == $empleadose->fkEMPLE_JEFE) selected='selected' @endif>
                                        {{ $empleadose->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="input-field col s4">
                            <select name="FKCARGO">
                                <option value="" disabled>Elija su opción</option>
                                @foreach ($cargos as $cargo)
                                    {{ $cargos[0]->IDCARGO }}
                                    <option value={{ $cargo->IDCARGO }} @if ($empleado->IDCARGO == $cargo->IDCARGO) selected='selected' @endif>
                                        {{ $cargo->NOMBRE }}
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
                                    <option value={{ $area->IDAREA }} @if ($area->IDAREA == $empleado->fkAREA) selected='selected' @endif> {{ $area->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Area</label>
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

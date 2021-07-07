<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\CargoPorEmpleado;
use App\Models\Empleado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        $empleadosUsers = DB::table('empleado')
            ->join('users', 'users.fkEMPLEADO', '=', 'empleado.IDEMPLEADO')
            ->select('users.fkEMPLEADO')
            ->get();
        // return is_array($empleadosUsers = DB::table('empleado')
        // ->join('users', 'users.fkEMPLEADO', '=', 'empleado.IDEMPLEADO')
        // ->select('users.id', 'users.fkEMPLEADO')
        // ->get()) ?  'true' : 'false';
        return view('empleados.EmpleadosConsultView', ['empleados' => $empleados,  'empleadosUsers' => $empleadosUsers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        $cargos = Cargo::all();
        $empleados = Empleado::all();
        return view('empleados.EmpleadosCreateView', ['areas' => $areas, 'cargos' => $cargos, 'empleados' => $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'IDEMPLEADO' => 'required|numeric|max:20|unique:empleado',
            'NOMBRE' => 'required|max:100',
            'FOTO' => 'sometimes|mimes:jpg,png',
            'HOJAVIDA' => 'sometimes|mimes:pdf',
<<<<<<< HEAD
            'TELEFONO' => 'required|numeric|digits_between:7,10',
=======
            'TELEFONO' => 'required|numeric|digits:10',
>>>>>>> 001a6daaeeffe68f4ce8fb027f0863315ce9d654
            'EMAIL' => 'required|email|max:100|unique:empleado',
            'DIRECCION' => 'required|max:100',
            'X' => 'sometimes|numeric|min:-180|max:180',
            'Y' => 'sometimes|numeric|min:-90|max:90',
            'FECHAINI' => 'required|date_format:Y-m-d',
            'fkEMPLE_JEFE' => '',
            'fkAREA' => 'required|not_in:0',
            'FKCARGO' => 'required|not_in:0',
        ]);
        $opcionales = [];
        if ($request->hasFile('FOTO')) {
            $FOTO = Storage::put('imagenes/fotos', $request->file('FOTO'));
            $opcionales += ['FOTO' => $FOTO];
        }
        if ($request->hasFile('HOJAVIDA')) {
            $HOJAVIDA = Storage::putFile('documentos/HV', $request->file('HOJAVIDA'));
            $opcionales += ['HOJAVIDA' => $HOJAVIDA];
        }
        if ($request->has('fkEMPLE_JEFE'))
            $opcionales += ['fkEMPLE_JEFE' => $request->fkEMPLE_JEFE];

        Empleado::create(array_merge($request->except(['_token', 'action', 'FOTO', 'HOJAVIDA']), $opcionales));
        CargoPorEmpleado::create(['FKCARGO' => $request->FKCARGO, 'FKEMPLE' => $request->IDEMPLEADO, 'FECHAINI' => $request->FECHAINI]);
        return redirect()->route('empleados.index');
    }

    /**
     * Show the form for searching the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_resource()
    {
        return view('empleados.EmpleadosShowFormView');
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'IDEMPLEADO' => 'required|exists:Empleado',
        ]);
        $empleado = DB::table('empleado')
            ->join('cargo_por_empleado', 'empleado.IDEMPLEADO', '=', 'cargo_por_empleado.FKEMPLE')
            ->join('cargo', 'cargo.IDCARGO', '=', 'cargo_por_empleado.FKCARGO')
            ->select('empleado.*', 'cargo.NOMBRE as NOMBRE_CARGO', 'cargo_por_empleado.FECHAINI')
            ->where('IDEMPLEADO', '=', $request->IDEMPLEADO)
            ->get();
        return view('empleados.EmpleadosShowView', ['empleado' => $empleado[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($idEmpleado)
    {
        $areas = Area::all();
        $cargos = Cargo::all();
        $empleados = Empleado::all();
        $empleado = DB::table('empleado')
            ->join('cargo_por_empleado', 'empleado.IDEMPLEADO', '=', 'cargo_por_empleado.FKEMPLE')
            ->join('cargo', 'cargo.IDCARGO', '=', 'cargo_por_empleado.FKCARGO')
            ->select('cargo_por_empleado.FECHAINI', 'cargo.*', 'empleado.*')
            ->where('cargo_por_empleado.FKEMPLE', '=', $idEmpleado)
            ->get();
        return view('empleados.EmpleadosEditView', ['areas' => $areas, 'cargos' => $cargos, 'empleado' => $empleado[0], 'empleados' => $empleados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $IDEMPLEADO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IDEMPLEADO)
    {
        $request->validate([
            'NOMBRE' => 'required|max:100',
            'FOTO' => 'sometimes|mimes:jpg,png',
            'HOJAVIDA' => 'sometimes|mimes:pdf',
            'TELEFONO' => 'required|max:7|min:7',
            'EMAIL' => 'required|email|max:100|unique:Empleado,email,' . $IDEMPLEADO . ',IDEMPLEADO',
            'DIRECCION' => 'required|max:100',
            'X' => 'sometimes|min:-180|max:180',
            'Y' => 'sometimes|min:-90|max:90',
            'FECHAINI' => 'required|date_format:Y-m-d',
            'fkEMPLE_JEFE' => 'max:20',
            'fkAREA' => 'required|not_in:0',
            'FKCARGO' => 'required|not_in:0',
        ]);
        $opcionales = [];

        if ($request->hasFile('FOTO')) {
            $FOTO = Storage::put('imagenes/fotos', $request->file('FOTO'));
            $opcionales += ['FOTO' => $FOTO];
        }
        if ($request->hasFile('HOJAVIDA')) {
            $HOJAVIDA = Storage::putFile('documentos/HV', $request->file('HOJAVIDA'));
            $opcionales += ['HOJAVIDA' => $HOJAVIDA];
        }

        if ($request->has('fkEMPLE_JEFE'))
            $opcionales += ['fkEMPLE_JEFE' => $request->fkEMPLE_JEFE];
        Empleado::find($IDEMPLEADO)->update(array_merge($request->except(['_token', 'action', 'FOTO', 'HOJAVIDA']), $opcionales));
        CargoPorEmpleado::where('FKEMPLE', '=', $IDEMPLEADO)->update(['FKCARGO' => $request->FKCARGO, 'FECHAINI' => $request->FECHAINI]);
        return redirect()->route('empleados.index')->withSuccess('funciona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idEmpleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEmpleado)
    {
        try {
            Empleado::destroy($idEmpleado);
            return redirect()->route('empleados.index');
        } catch (Exception $error) {
            return Redirect::back()->withErrors(['deleteError' => 'El empleado no puede ser eliminado, debido a que esta ligado a otra dependencia']);
        }
    }
}

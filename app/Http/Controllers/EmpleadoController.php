<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\cargo;
use App\Models\cargo_por_empleado;
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
        return view('empleados.EmpleadosConsultView', compact('empleados'));
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
            'IDEMPLEADO' => 'required|max:20|unique:Empleado',
            'NOMBRE' => 'required|max:255',
            'FOTO' => '',
            'HOJAVIDA' => '',
            'TELEFONO' => 'required|max:7|min:7',
            'EMAIL' => 'required|email|max:255|unique:Empleado',
            'X' => '',
            'Y' => '',
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
        cargo_por_empleado::create(['FKCARGO' => $request->FKCARGO, 'FKEMPLE' => $request->IDEMPLEADO, 'FECHAINI' => $request->FECHAINI]);
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
            'IDEMPLEADO' => 'required',
        ]);
        $empleado = DB::table('empleado')
            ->join('cargo_por_empleado', 'empleado.IDEMPLEADO', '=', 'cargo_por_empleado.FKEMPLE')
            ->join('cargo', 'cargo.IDCARGO', '=', 'cargo_por_empleado.FKCARGO')
            ->select('empleado.*', 'cargo.NOMBRE as NOMBRE_CARGO', 'cargo_por_empleado.FECHAINI')
            ->where('IDEMPLEADO', '=', $request->IDEMPLEADO)
            ->get();
        if (!$empleado)
            return Redirect::back()->withErrors(['notExist' => 'El id del empleado "' . $request->IDEMPLEADO . '" no existe']);
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
            'IDEMPLEADO' => 'required|max:20|unique:Empleado,IDEMPLEADO,' . $IDEMPLEADO . ',IDEMPLEADO',
            'NOMBRE' => 'required|max:255',
            'FOTO' => '',
            'HOJAVIDA' => '',
            'TELEFONO' => 'required|max:7|min:7',
            'EMAIL' => 'required|email|max:255|unique:Empleado,email,' . $IDEMPLEADO . ',IDEMPLEADO',
            'X' => '',
            'Y' => '',
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
        cargo_por_empleado::where('FKEMPLE', '=', $IDEMPLEADO)->update(['FKCARGO' => $request->FKCARGO, 'FECHAINI' => $request->FECHAINI]);
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
            //No se elimina debido a que solo puede ser posible por un elimiando logico
            $fkEMPLE_JEFE = null;
            if (Area::where('FKEMPLE', '=', $idEmpleado)->exists()) {
                Empleado::whereIn('fkEMPLE_JEFE', [$idEmpleado])->update(['fkEMPLE_JEFE' => $fkEMPLE_JEFE]);
                Area::whereIn('fkEMPLE', [$idEmpleado])->update(['fkEMPLE' => $fkEMPLE_JEFE]);
            }
            Empleado::destroy($idEmpleado);
            return redirect()->route('empleados.index');
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }
}

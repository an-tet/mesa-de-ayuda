<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        return view('empleados.EmpleadosCreateView');
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
            'fkEMPLE_JEFE' => 'max:20',
            'fkAREA' => 'required|max:20',
        ]);
        Empleado::create($request->except(['_token', 'action']));
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
        $empleado = Empleado::find($request->IDEMPLEADO);
        if (!$empleado) {
            return Redirect::back()->withErrors(['notExist' => 'El id del empleado "' . $request->IDEMPLEADO . '" no existe']);
        }
        return view('empleados.EmpleadosShowView', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($idEmpleado)
    {
        $empleado = Empleado::find($idEmpleado);
        return view('empleados.EmpleadosEditView', compact('empleado'));
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
            'fkEMPLE_JEFE' => 'max:20',
            'fkAREA' => 'required|max:20',
        ]);
        Empleado::find($IDEMPLEADO)->update($request->except(['action', '_token']));
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

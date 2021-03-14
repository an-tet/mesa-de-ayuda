<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleados::all();
        return view('empleados.EmpleadosConsultView', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'idEmpleado' => 'required|unique:Empleados|max:20',
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:7|min:7',
            'cargo' => 'required|max:255',
            'email' => 'required|email|max:255|unique:Empleados',
            'fkIdArea' => 'required|max:20',
            'fkEmple' => 'required|max:20',
        ]);
        Empleados::create($request->except(['_token', 'action']));
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idEmpleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idEmpleado
     * @return \Illuminate\Http\Response
     */
    public function edit($idEmpleado)
    {
        $empleado = Empleados::find($idEmpleado);
        return view('empleados.EmpleadosEditView', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idEmpleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEmpleado)
    {
        $request->validate([
            'idEmpleado' => 'required|max:20|unique:Empleados,idEmpleado,' . $idEmpleado . ',idEmpleado',
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:7|min:7',
            'cargo' => 'required|max:255',
            'email' => 'required|email|max:255|unique:Empleados,email,' . $idEmpleado . ',idEmpleado',
            'fkIdArea' => 'required|max:20',
            'fkEmple' => 'required|max:20',
        ]);
        Empleados::find($idEmpleado)->update($request->except(['action', '_token']));
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
        Empleados::destroy($idEmpleado);
        return redirect()->route('empleados.index');
    }
}

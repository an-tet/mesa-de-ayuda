<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AreaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $areas = Area::all();
            return view('areas.AreasConsultView', compact('areas'));
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = Empleado::all();
        return view('areas.AreasCreateView', ['empleados' => $empleado]);
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
            'IDAREA' => 'required|unique:area',
            'NOMBRE' => 'required',
        ]);
        try {
            Area::create($request->except(['action', '_token']));
            return redirect()->route('areas.index');
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }

    /**
     * Show the form for searching the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_resource()
    {
        return view('areas.AreasShowFormView');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate(['IDAREA' => 'required|exists:Area']);
        try {
            $area = Area::find($request->IDAREA);
            return view('areas.AreasShowView', compact('area'));
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $IDAREA
     * @return \Illuminate\Http\Response
     */
    public function edit($IDAREA)
    {
        try {
            $area = Area::find($IDAREA);
            $empleados = Empleado::all();
            return view('areas.AreasEditView', ['area' => $area, 'empleados' => $empleados]);
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $IDAREA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IDAREA)
    {
        $request->validate(['NOMBRE' => 'required']);
        try {
            // TODO - Optimizar validacion
            // if ($request->FKEMPLE != '') {
            //     $empleado = Empleado::find($request->FKEMPLE);
            //     if (!$empleado) return Redirect::back()->withErrors(['empleadoNoExiste' => 'El id del empleado "' . $request->FKEMPLE . '" no existe']);
            // }
            Area::find($IDAREA)->update($request->except(['action', '_token']));
            return redirect()->route('areas.index');
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $IDAREA
     * @return \Illuminate\Http\Response
     */
    public function destroy($IDAREA)
    {
        try {
            Area::destroy($IDAREA);
            return redirect()->route('areas.index');
        } catch (Exception $error) {
            if ($error->getCode() == 23000)
                return Redirect::back()->withErrors(['errorEliminar' => 'No se puede eliminar ya que existen usuarios vinculados al area "' . Area::find($IDAREA)->NOMBRE . '"']);
            return view('errors.error', compact('error'));
        }
    }
}

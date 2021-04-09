<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('areas.AreasConsultView', ['areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.AreasCreateView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);
        // TODO - Optimizar validacion
        $empleado = Empleado::find($request->FKEMPLE);

        // if (!$empleado) return Redirect::back()->withErrors(['empleadoNoExiste' => 'El id del empleado "' . $request->FKEMPLE . '" no existe']);
        Area::create($request->except(['action', '_token']));
        return redirect()->route('areas.index');
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
        $area = Area::find($request->IDAREA);
        return view('areas.AreasShowView', ['area' => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $IDAREA
     * @return \Illuminate\Http\Response
     */
    public function edit($IDAREA)
    {
        $area = Area::find($IDAREA);
        return view('areas.AreasEditView', compact('area'));
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

        $this->validateForm($request);
        Area::find($IDAREA)->update($request->except(['action', '_token']));
        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $IDAREA
     * @return \Illuminate\Http\Response
     */
    public function destroy($IDAREA)
    {
        Area::destroy($IDAREA);
        return redirect()->route('areas.index');
    }

    private function validateForm(Request $request)
    {
        return $request->validate([
            'IDAREA' => 'required|unique:Area',
            'NOMBRE' => 'required',
            'FKEMPLE' => 'exists:Empleado,IDEMPLEADO',
        ]);
    }
}

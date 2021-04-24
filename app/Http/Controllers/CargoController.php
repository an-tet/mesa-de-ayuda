<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $cargos = Cargo::all();
            return view('cargos.CargosConsultView', compact('cargos'));
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
        return view('cargos.CargosCreateView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Cargo::create($request->except(['action', '_token']));
            return redirect()->route('cargos.index');
        } catch (Exception $error) {
            return $error;
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
        return view('cargos.CargosShowFormView');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate(["IDCARGO" => "exists:Cargo"]);
        try {
            $cargo = Cargo::find($request->IDCARGO);
            return view('cargos.CargosShowView', compact('cargo'));
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IDCARGO)
    {
        try {
            $cargo = Cargo::find($IDCARGO);
            return view('cargos.CargosEditView', compact('cargo'));
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IDCARGO)
    {
        try {
            Cargo::find($IDCARGO)->update($request->except(['action', '_token']));
            return redirect()->route('cargos.index');
        } catch (Exception $error) {
            return view('errors.error', compact('error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IDCARGO)
    {
        try {
            Cargo::Destroy($IDCARGO);
            return redirect()->route('cargos.index');
        } catch (Exception $error) {
            if ($error->getCode() == 23000)
                return Redirect::back()->withErrors(['errorEliminar' => 'No se puede eliminar ya que existen empleados vinculados al cargo de "' . Cargo::find($IDCARGO)->NOMBRE . '"']);
            return view('errors.error', compact('error'));
        }
    }
}

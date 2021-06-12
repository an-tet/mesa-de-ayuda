<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\DetalleReq;
use App\Models\Empleado;
use App\Models\Estado;
use App\Models\requerimiento;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RequerimientoController extends Controller
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
        // return DB::table('requerimiento')
        //     ->join('detallereq', 'requerimiento.IDREQ', '=', 'detallereq.FKREQ')
        //     ->select('requerimiento.*', 'detallereq.*')
        //     ->get();;
        try {
            $requerimientos = DB::table('requerimiento')
                ->join('detallereq', 'requerimiento.IDREQ', '=', 'detallereq.FKREQ')
                ->select('requerimiento.*', 'detallereq.*')
                ->get();
            return view('requerimientos.RequerimientosConsultView', compact('requerimientos'));
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
        $areas = Area::all();
        $empleados = Empleado::all();
        $estados = Estado::all();
        return view('requerimientos.RequerimientosCreateView', ['areas' => $areas, 'empleados' => $empleados, 'estados' => $estados]);
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
            Requerimiento::create(['FKAREA' => $request->FKAREA]);
            $FECHAINI = Carbon::now()->format('Y-m-d');
            $IDREQ = Requerimiento::latest("IDREQ")->first();
            DetalleReq::create(['FECHA' => $FECHAINI, 'OBSERVACION' => $request->OBSERVACION, 'FKREQ' => $IDREQ->IDREQ, 'FKESTADO' => $request->IDESTADO, 'FKEMPLE' => $request->FKEMPLE, 'FKEMPLEASIGNADO' => $request->FKEMPLEASIGNADO]);
            return redirect()->route('requerimientos.index');
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
        return view('requerimientos.RequerimientosShowFormView');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'IDREQ' => 'required|exists:Requerimiento',
        ]);
        try {
            $requerimiento = DB::table('requerimiento')
                ->join('detallereq', 'requerimiento.IDREQ', '=', 'detallereq.FKREQ')
                ->select('requerimiento.*', 'detallereq.*')
                ->where('IDREQ', '=', $request->IDREQ)
                ->get();
            // return $requerimiento;
            return view('requerimientos.RequerimientosShowView', ['requerimiento' => $requerimiento[0]]);
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
    public function edit($IDREQ)
    {
        $requerimiento = DB::table('requerimiento')
            ->join('detallereq', 'requerimiento.IDREQ', '=', 'detallereq.FKREQ')
            ->select('requerimiento.*', 'detallereq.*')
            ->where('IDREQ', '=', $IDREQ)
            ->get();
        $areas = Area::all();
        $estados = Estado::all();
        $empleados = Empleado::all();
        return view('requerimientos.RequerimientosEditView', ['requerimiento' => $requerimiento[0], 'areas' => $areas, 'empleados' => $empleados, 'estados' => $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $FKREQ)
    {
        $request->validate([
            'FKESTADO' => 'required|not_in:0',
            'FKEMPLEASIGNADO' => 'sometimes|not_in:0',
        ]);

        // return $request;
        $update = ['FKESTADO' => $request->FKESTADO];
        // return DB::table('detallereq')->select('FKEMPLEASIGNADO')->where('FKREQ', '=', $FKREQ)->get()[0]->FKEMPLEASIGNADO == null;
        if (DB::table('detallereq')->select('FKEMPLEASIGNADO')->where('FKREQ', '=', $FKREQ)->get()[0]->FKEMPLEASIGNADO == null) {
            $update += ['FKEMPLEASIGNADO' => $request->FKEMPLEASIGNADO];
        }
        DB::table('detallereq')
            ->where('FKREQ', '=', $FKREQ)
            ->update($update);
        return redirect()->route('requerimientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IDREQ)
    {
        try {
            Requerimiento::destroy($IDREQ);
            return redirect()->route('requermienitos.index');
        } catch (Exception $error) {
            return Redirect::back()->withErrors(['deleteError' => 'El requerimiento no puede ser eliminado, debido a que esta ligado a un empleado']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\detallereq;
use App\Models\Empleado;
use App\Models\estado;
use App\Models\requerimiento;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class RequerimientoController extends Controller
{
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
        $empleado = Empleado::all();
        $estado = Estado::all();
        return view('requerimientos.RequerimientosCreateView', ['areas' => $areas, 'empleados' => $empleado, 'estados' => $estado]);
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
            Detallereq::create(['FECHA' => $FECHAINI, 'OBSERVACION' => $request->OBSERVACION, 'FKREQ' => $IDREQ->IDREQ, 'FKESTADO' => $request->IDESTADO, 'FKEMPLE' => $request->FKEMPLE, 'FKEMPLEASIGNADO' => $request->FKEMPLEASIGNADO]);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IDDETALLE)
    {
    }
}

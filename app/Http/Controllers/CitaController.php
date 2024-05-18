<?php

namespace App\Http\Controllers;
use App\Http\Requests\CitaFormRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Vehiculo;
use App\Models\Tipo_taller; 
use App\Models\Taller;

use Redirect;
use Storage;
use DateTime;
use Session;

class CitaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $citas = Cita::all();
        $vehiculos = Vehiculo::where('id_usuario', Auth::id())->get();
        return view('cita.index', compact('citas', 'vehiculos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipo_taller=tipo_taller::orderBy('id','DESC')
        ->select('tipo_taller.id','tipo_taller.nombre')
        ->get();

        $talleres=taller::orderBy('id','DESC')
        ->select('talleres.id','talleres.nombre_taller')
        ->get();

        $citas = Cita::all();
        return view('cita.create', compact('citas','tipo_taller','talleres'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaFormRequest $request)
    {
        $citas = new Cita;
    
        $citas->nombre = $request->nombre;
        $citas->placa = $request->placa;
        $citas->tipo_vehiculo = $request->tipo_vehiculo;
        $citas->tipo_taller = $request->tipo_taller;
        $citas->fecha = $request->fecha;
        $citas->taller = $request->taller;
        $citas->created_at = (new DateTime)->getTimestamp();
    
        $citas->save();
    
        return redirect('cita')->with('message', 'Cita guardado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citas = Cita::find($id);
        return view('cita.detalle', compact('citas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citas = Cita::findOrFail($id);
        return view('cita.edit', compact('citas'));
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
        $citas = Cita::find($id);
        $citas->nombre = $request->nombre;
        $citas->placa = $request->placa;
        $citas->tipo_vehiculo = $request->tipo_vehiculo;
        $citas->tipo_taller = $request->tipo_taller;
        $citas->fecha = $request->fecha;
        $citas->taller = $request->taller;


        $citas->updated_at = (new DateTime)->getTimestamp(); 
 
        // Actualizo los datos en la tabla 'citas'
        $citas->save();
        // Muestro un mensaje y redirecciono a la vista principal 
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('cita');

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $citas = Cita::find($id);
        if (!$citas) {
            return redirect('cita')->with('error', 'Cita no encontrado.');
        }
        $citas->delete();
 
        return redirect('cita')->with('message', 'Cita eliminado satisfactoriamente.');
    }
    public function buscarTaller(Request $request){

       
        $tipo_taller = $request->get('tipo_taller');

        
        $talleres = Taller::where('tipo_taller_id', $tipo_taller)->first();

        
        if ($talleres) {
            return response()->json([
                'id' => $talleres->id,
                'nombre_taller' => $talleres->nombre_taller,
            ]);
            } 
            else {
                $mensajeError = "La cedula no existe en la base de datos";
                return response()->json(['error' => $mensajeError], 404);
            }
        }

        public function validarFechaRepetida(Request $request) {
            $citas = $request->fecha;
        
            // Contar la cantidad de citas para la fecha seleccionada
            $cantidadCitas = Cita::where('fecha', $fecha)->count();
        
            // Si hay 3 o más citas para la fecha seleccionada, mostrar un mensaje de error
            if ($cantidadCitas >= 3) {
                return response()->json(['mensaje' => 'Lo sentimos, ya hay 3 citas agendadas para la fecha seleccionada. Por favor, elige otra fecha.'], 400);
            } else {
                return response()->json(['mensaje' => 'La fecha está disponible para agendar la cita.']);
            }
        }

}

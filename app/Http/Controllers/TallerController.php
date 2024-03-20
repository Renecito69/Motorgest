<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taller;
use App\Models\Vehiculo;
use Redirect;
use Storage;
use DateTime;
use Session;

class tallerController extends Controller
{

    public function index()
    {
        $talleres = taller::all();
        $vehiculos = vehiculo::all();
        return view('taller.index', compact('talleres','vehiculos'));
    }

    public function create()
    {
        $talleres = taller::all();
        return view('taller.create', compact('talleres'));
    }

    public function store(Request $request)
    {
        $talleres = new Taller;
    
        $talleres->nombre_taller = $request->nombre_taller;
        $talleres->runt = $request->runt;
        $talleres->camara_comercio = $request->camara_comercio;
        $talleres->direccion = $request->direccion;
        $talleres->tipo_taller = $request->tipo_taller;

        $talleres->created_at = (new DateTime)->getTimestamp();
    
        $talleres->save();
    
        return redirect('taller')->with('message', 'Taller guardado satisfactoriamente.');
    }
    


    public function show(string $id)
    {
        $talleres = taller::find($id);
        return view('taller.detalle', compact('talleres'));
    }

    public function edit($id)
    {
        $taller = Taller::findOrFail($id);
        return view('taller.edit', compact('taller'));
    }
    
    

    public function update(Request $request, $id)
    {
        $talleres = taller::find($id);
        $talleres->nombre_taller = $request->nombre_taller;
        $talleres->runt = $request->runt;
        $talleres->camara_comercio = $request->camara;
        $talleres->direccion = $request->direccion;
        $talleres->tipo_taller = $request->tipo_taller;
        

        $talleres->updated_at = (new DateTime)->getTimestamp();

        $talleres->save();

        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('taller');


     }

    public function destroy(string $id)
    {
        $talleres = taller::find($id);
        if (!$talleres) {
            return redirect('taller')->with('error', 'Vehículo no encontrado.');
        }
        $talleres->delete();

        return redirect('taller')->with('message', 'Vehículo eliminado satisfactoriamente.');
    }
}

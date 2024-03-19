<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Redirect;
use Storage;
use DateTime;
use Session;

class VehiculoController extends Controller
{

    public function index()
    {
        $vehiculos = Vehiculo::all(); 
        return view('vehiculo.index', compact('vehiculos'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculo.create', compact('vehiculos'));
    }

    public function store(Request $request)
    {
        $vehiculos = new Vehiculo;

        $vehiculos->placa = $request->placa;
        $vehiculos->marca = $request->marca;
        $vehiculos->color = $request->color;
        $vehiculos->modelo = $request->modelo;
        $vehiculos->cc = $request->cc;
        $vehiculos->año = $request->año;
        $vehiculos->kilometraje = $request->kilometraje;
        $vehiculos->tipo_combustible = $request->tipo_combustible;
        $vehiculos->ultimo_mantenimiento = $request->ultimo_mantenimiento;
        $vehiculos->tipo_vehiculo = $request->tipo_vehiculo;
        
        $vehiculos->created_at = (new DateTime)->getTimestamp();
        
        $vehiculos->save();

        return redirect('vehiculo')->with('message', 'Vehículo guardado satisfactoriamente.');
    }

    public function show(string $id)
    {
        $vehiculos = Vehiculo::find($id);
        return view('vehiculo.detalle', compact('vehiculos'));
    }

    public function edit($id)
    {
        $vehiculos = Vehiculo::find($id);
        return view('vehiculo.edit', compact('vehiculos'));
    }
    

    public function update(Request $request, $id)
    {
        $vehiculos = Vehiculo::find($id);
        $vehiculos->placa = $request->placa;
        $vehiculos->marca = $request->marca;
        $vehiculos->color = $request->color;
        $vehiculos->modelo = $request->modelo;
        $vehiculos->cc = $request->cc;
        $vehiculos->año = $request->año;
        $vehiculos->kilometraje = $request->kilometraje;
        $vehiculos->tipo_combustible = $request->tipo_combustible;
        $vehiculos->ultimo_mantenimiento = $request->ultimo_mantenimiento;
        $vehiculos->tipo_vehiculo = $request->tipo_vehiculo;
        

        $vehiculos->updated_at = (new DateTime)->getTimestamp();

        $vehiculos->save();

        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('vehiculo');


     }

    public function destroy(string $id)
    {
        $vehiculos = Vehiculo::find($id);
        if (!$vehiculos) {
            return redirect('vehiculo')->with('error', 'Vehículo no encontrado.');
        }
        $vehiculos->delete();

        return redirect('vehiculo')->with('message', 'Vehículo eliminado satisfactoriamente.');
    }
}

@extends('layouts.mainc')

@section('content_cita')
<div class="alert alert-danger mt-3 d-none" id="mensaje-error"
role="alert"></div>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                @if ( empty ( $citas->id) )
                <form method="POST" action="{{ route('cita.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="Nombre" 
                                name="nombre" required="required" type="text" id="nombre">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="placa" class="negrita">Placa:</label>
                        <div>
                            <input class="form-control" placeholder="Número Placa" required="required" name="placa"
                                type="text" id="placa">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_vehiculo" class="negrita">Tipo de Vehiculo:</label>
                        <select class="form-control" required="required" name="tipo_vehiculo" id="tipo_vehiculo">
                            <option value="" disabled selected>Seleccione el Tipo de Vehiculo</option>
                            <option value="moto">Moto</option>
                            <option value="frenos">Carro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_taller" class="negrita">Tipo de Taller:</label>
                        <select class="form-control" required="required" name="tipo_taller" id="tipo_taller" data-livesearch="true" onchange="buscarTaller()">

                            <option value="" disabled selected>Seleccione el Tipo de taller</option>
                            @foreach($tipo_taller as $tip_t)
                            <option value="{{$tip_t->id}}">{{$tip_t->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="negrita">Fecha:</label>
                        <div>
                            <input class="form-control" placeholder="Fecha Cita" required="required" name="fecha"
                                type="date" id="fecha" onchange="validarFecha()">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="talleres" class="negrita">Taller:</label>
                       
                        <select class="form-control" required="required" name="talleres" id="talleres">
                            <option value="" disabled selected>Seleccione el taller</option>
                            <option value="">Mantenimiento</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('cita.index') }}" class="btn btn-warning">Cancelar</a>
                    <br><br>
                </form>
                <script src="{{ asset('js/buscar.js') }}"></script>

                @else
                <form method="POST" action="{{ route('cita.update', $citas->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Aquí irían los campos existentes -->

                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="Nombre" required="required"
                                name="nombre" type="text" id="nombre"
                                value="{{ !empty($citas->nombre) ? $citas->nombre : '' }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="runt" class="negrita">placa:</label>
                        <div>
                            <input class="form-control" placeholder="Placa" required="required" name="placa"
                                type="text" id="placa" value="{{ !empty($citas->placa) ? $citas->placa : '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_vehiculo" class="negrita">Tipo de Vehiculo:</label>
                        <select class="form-control" required="required" name="tipo_vehiculo" id="tipo_vehiculo">
                            <option value="Moto" {{ $citas->tipo_vehiculo == 'Moto' ? 'selected' : '' }}>
                                Moto
                            </option>
                            <option value="Carro" {{ $citas->tipo_vehiculo == 'carro' ? 'selected' : '' }}>Carro
                            </option>
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="tipo_taller" class="negrita">Tipo de Taller:</label>
                        <select class="form-control" required="required" name="tipo_taller" id="tipo_taller">
                            <option value="Mecanico" {{ $citas->tipo_taller == 'Mecanico' ? 'selected' : '' }}>
                                Mecanico</option>
                            <option value="Frenos" {{ $citas->tipo_taller == 'Frenos' ? 'selected' : '' }}>Frenos
                            </option>
                            <option value="Lamina y Pintura"
                                {{ $citas->tipo_taller == 'Lamina y Pintura' ? 'selected' : '' }}>Lamina y Pintura
                            </option>
                            <option value="Aliniacion y Balanceo"
                                {{ $citas->tipo_taller == 'Aliniacion y Balanceo' ? 'selected' : '' }}>Aliniacion y
                                Balanceo</option>
                            <option value="Transmisión" {{ $citas->tipo_taller == 'Transmisión' ? 'selected' : '' }}>
                                Transmisión</option>
                            <option value="Exostos" {{ $citas->tipo_taller == 'Exostos' ? 'selected' : '' }}>Exostos
                            </option>
                            <option value="Tren Delantero"
                                {{ $citas->tipo_taller == 'Tren Delantero' ? 'selected' : '' }}>Tren Delantero
                            </option>
                            <option value="Electrico" {{ $citas->tipo_taller == 'Electrico' ? 'selected' : '' }}>
                                Electrico</option>
                            <option value="Multiservicio"
                                {{ $citas->tipo_taller == 'Multiservicio' ? 'selected' : '' }}>Multiservicio</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="negrita">Fecha:</label>
                        <div>
                            <input class="form-control"  required="required"
                                name="fecha" type="date" id="fecha"
                                value="{{ !empty($citas->fecha) ? $citas->fecha : '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="taller" class="negrita">Taller:</label>
                        <select class="form-control" required="required" name="taller" id="taller">
                            <option value="Motorasint" {{ $citas->taller == 'Motorasint' ? 'selected' : '' }}>
                            Motorasint</option>
                            <option value="Frenos" {{ $citas->taller == 'Pirupaint' ? 'selected' : '' }}>Pirupaint
                            </option>
                            <option value="Lamina y Pintura"
                                {{ $citas->taller == 'Laminados sas' ? 'selected' : '' }}>Laminados sas
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('cita.index') }}" class="btn btn-warning">Cancelar</a>
                    <br><br>
                </form>
                
                @endif
            </div>
        </section>
    </div>
</div>
@endsection
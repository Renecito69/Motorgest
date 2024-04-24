@extends('layouts.maint')

@section('content_taller')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                @if ( empty ( $talleres->id) )
                <form method="POST" action="{{ route('taller.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre_taller" class="negrita">Nombre taller:</label>
                        <div>
                            <input class="form-control" placeholder="Nombre del taller" required="required"
                                name="nombre_taller" type="text" id="nombre_taller">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="runt" class="negrita">Runt:</label>
                        <div>
                            <input class="form-control" placeholder="Número Runt" required="required" name="runt"
                                type="text" id="runt">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="camara_comercio" class="negrita">Cámara de Comercio:</label>
                        <div>
                            <input class="form-control" placeholder="Número Cámara de Comercio" required="required"
                                name="camara_comercio" type="" id="camara_comercio">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="negrita">Dirección:</label>
                        <div>
                            <input class="form-control" placeholder="Dirección del taller" required="required"
                                name="direccion" type="text" id="direccion">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_taller" class="negrita">Tipo de Taller:</label>
                        <select class="form-control" required="required" name="tipo_taller" id="tipo_taller">
                            <option value="" disabled selected>Seleccione el Tipo de taller</option>
                            <option value="mecanico">Mecanico</option>
                            <option value="frenos">Frenos</option>
                            <option value="lamina_pintura">Lamina y Pintura</option>
                            <option value="aliniacion_balanceo">Aliniacion y Balanceo</option>
                            <option value="transmision">Transmisión</option>
                            <option value="exostos">Exostos</option>
                            <option value="tren_delantero">Tren Delantero</option>
                            <option value="electrico">Electrico</option>
                            <option value="multiservicio">Multiservicio</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('taller.index') }}" class="btn btn-warning">Cancelar</a>
                    <br><br>
                </form>
                @else
                <form method="POST" action="{{ route('taller.update', $talleres->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Aquí irían los campos existentes -->

                    <div class="mb-3">
                        <label for="nombre_taller" class="negrita">Nombre taller:</label>
                        <div>
                            <input class="form-control" placeholder="Nombre del taller" required="required"
                                name="nombre_taller" type="text" id="nombre_taller"
                                value="{{ !empty($talleres->nombre_taller) ? $talleres->nombre_taller : '' }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="runt" class="negrita">Runt:</label>
                        <div>
                            <input class="form-control" placeholder="Número Runt" required="required" name="runt"
                                type="text" id="runt" value="{{ !empty($talleres->runt) ? $talleres->runt : '' }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="camara_comercio" class="negrita">Cámara de Comercio:</label>
                        <div>
                            <input class="form-control" placeholder="Número Cámara de Comercio" required="required"
                                name="camara_comercio" type="text" id="camara_comercio"
                                value="{{ !empty($talleres->camara_comercio) ? $talleres->camara_comercio : '' }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="negrita">Dirección:</label>
                        <div>
                            <input class="form-control" placeholder="Dirección del taller" required="required"
                                name="direccion" type="text" id="direccion"
                                value="{{ !empty($talleres->direccion) ? $talleres->direccion : '' }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_taller" class="negrita">Tipo de Taller:</label>
                        <select class="form-control" required="required" name="tipo_taller" id="tipo_taller">
                            <option value="Mecanico" {{ $talleres->tipo_taller == 'Mecanico' ? 'selected' : '' }}>
                                Mecanico</option>
                            <option value="Frenos" {{ $talleres->tipo_taller == 'Frenos' ? 'selected' : '' }}>Frenos
                            </option>
                            <option value="Lamina y Pintura"
                                {{ $talleres->tipo_taller == 'Lamina y Pintura' ? 'selected' : '' }}>Lamina y Pintura
                            </option>
                            <option value="Aliniacion y Balanceo"
                                {{ $talleres->tipo_taller == 'Aliniacion y Balanceo' ? 'selected' : '' }}>Aliniacion y
                                Balanceo</option>
                            <option value="Transmisión" {{ $talleres->tipo_taller == 'Transmisión' ? 'selected' : '' }}>
                                Transmisión</option>
                            <option value="Exostos" {{ $talleres->tipo_taller == 'Exostos' ? 'selected' : '' }}>Exostos
                            </option>
                            <option value="Tren Delantero"
                                {{ $talleres->tipo_taller == 'Tren Delantero' ? 'selected' : '' }}>Tren Delantero
                            </option>
                            <option value="Electrico" {{ $talleres->tipo_taller == 'Electrico' ? 'selected' : '' }}>
                                Electrico</option>
                            <option value="Multiservicio"
                                {{ $talleres->tipo_taller == 'Multiservicio' ? 'selected' : '' }}>Multiservicio</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('taller.index') }}" class="btn btn-warning">Cancelar</a>
                    <br><br>
                </form>
                @endif
            </div>
        </section>
    </div>
</div>
@endsection
@extends('layouts.main')

@section('content2')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
            @if ( empty ( $talleres ) )    
            <form method="POST" action="{{ route('taller.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre_taller" class="negrita">Nombre taller:</label>
                        <div>
                            <input class="form-control" placeholder="Nombre del taller" required="required" name="nombre_taller"
                                type="text" id="nombre_taller">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="runt" class="negrita">Runt:</label>
                        <div>
                            <input class="form-control" placeholder="Número Runt" required="required" name="runt" type="text"
                                id="runt">
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label for="camara_comercio" class="negrita">Cámara de Comercio:</label>
                        <div>
                            <input class="form-control" placeholder="Número Cámara de Comercio" required="required" name="camara_comercio" type="text"
                                id="camara_comercio">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="negrita">Dirección:</label>
                        <div>
                            <input class="form-control" placeholder="Dirección del taller" required="required" name="direccion" type="text"
                                id="direccion">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_taller" class="negrita">Tipo de Taller:</label>
                        <div>
                            <input class="form-control" placeholder="Tipo de taller" required="required" name="tipo_taller" type="text"
                                id="tipo_taller">
                        </div>
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
                            <input class="form-control" placeholder="Nombre del taller" required="required" name="nombre_taller"
                                type="text" id="nombre_taller" value="{{ $talleres->nombre_taller }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="runt" class="negrita">Runt:</label>
                        <div>
                            <input class="form-control" placeholder="Número Runt" required="required" name="runt" type="text"
                                id="runt" value="{{ $talleres->runt }}">
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label for="camara_comercio" class="negrita">Cámara de Comercio:</label>
                        <div>
                            <input class="form-control" placeholder="Número Cámara de Comercio" required="required" name="camara_comercio" type="text"
                                id="camara_comercio" value="{{ $talleres->camara_comercio }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="negrita">Dirección:</label>
                        <div>
                            <input class="form-control" placeholder="Dirección del taller" required="required" name="direccion" type="text"
                                id="direccion" value="{{ $talleres->direccion }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_taller" class="negrita">Tipo de Taller:</label>
                        <div>
                            <input class="form-control" placeholder="Tipo de taller" required="required" name="tipo_taller" type="text"
                                id="tipo_taller" value="{{ $talleres->tipo_taller }}">
                        </div>
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

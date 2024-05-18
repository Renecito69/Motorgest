@extends('layouts.mainc')
@section('content_cita')
<div class="panel-body">
    <div class="clearfix">
        <p class="h6">Nombre:</p>
        <p class="h4 mb-3">{{ $citas->nombre }}</p>
        <p class="h6">Placa:</p>
        <p class="h4 mb-3">{{ $citas->placa }}</p>
        <p class="h6">Tipo vehiculo:</p>
        <p class="h4 mb-3">{{ $citas->tipo_vehiculo }}</p>
        <p class="h6">Tipo Taller:</p>
        <p class="h4 mb-3">{{ $citas->tipo_taller }}</p>
        <p class="h6">Fecha:</p>
        <p class="h4 mb-3">{{ $citas->fecha }}</p>
        <p class="h6">Taller:</p>
        <p class="h4 mb-3">{{ $citas->taller }}</p>
    </div>
</div>
@endsection
@extends('layouts.mainv')
@section('content_vehiculo')
<div class="panel-body">
    <div class="clearfix">
        <p class="h6">Placa:</p>
        <p class="h4 mb-3">{{ $vehiculos->placa }}</p>
        <p class="h6">Marca:</p>
        <p class="h4 mb-3">{{ $vehiculos->marca }}</p>
        <p class="h6">Color:</p>
        <p class="h4 mb-3">{{ $vehiculos->color }}</p>
        <p class="h6">Modelo:</p>
        <p class="h4 mb-3">{{ $vehiculos->modelo }}</p>
        <p class="h6">CC:</p>
        <p class="h4 mb-3">{{ $vehiculos->cc }}</p>
        <p class="h6">Año:</p>
        <p class="h4 mb-3">{{ $vehiculos->año }}</p>
        <p class="h6">Kilometraje:</p>
        <p class="h4 mb-3">{{ $vehiculos->kilometraje }}</p>
        <p class="h6">Tipo de Combustible:</p>
        <p class="h4 mb-3">{{ $vehiculos->tipo_combustible }}</p>
        <p class="h6">Último Mantenimiento:</p>
        <p class="h4 mb-3">{{ $vehiculos->ultimo_mantenimiento }}</p>
        <p class="h6">Tipo de Vehículo:</p>
        <p class="h4 mb-3">{{ $vehiculos->tipo_vehiculo }}</p>
    </div>
</div>
@endsection

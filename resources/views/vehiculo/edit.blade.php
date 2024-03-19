@extends('layouts.main')
@section('content1')
<form method="POST" action="{{ route('vehiculo.update',$vehiculos->id) }}"
role="form" enctype="multipart/form-data">
 <input type="hidden" name="_method" value="PUT">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @include('vehiculo.form.prt')
</form>
@endsection



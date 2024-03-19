@extends('layouts.main')
@section('content1')
<form method="POST" action="{{ route('vehiculo.store') }}" role="form"
enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @include('vehiculo.form.prt')

</form>
@endsection
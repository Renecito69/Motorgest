@extends('layouts.main')
@section('content2')
<form method="POST" action="{{ route('taller.store') }}" role="form"
enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @include('taller.form.prt')

</form>
@endsection
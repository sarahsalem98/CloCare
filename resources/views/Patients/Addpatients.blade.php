@extends('layouts.appReal')
@section('Addpatients')
<h4 class="page-title">ِ<p>Add Patient</p> </h4>
<form role="form" method="POST" action="{{route('Patients.store')}}" enctype="multipart/form-data">
	@csrf
	@if($errors->any())
	<div class="mt-2 mb-2">
		@foreach($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
			{{ $error }}
		</div>
		@endforeach
	</div>
	@endif

@include('Patients._form')

<button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
<button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>

</form>
@endsection
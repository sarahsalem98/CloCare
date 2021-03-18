@extends('layouts.appReal')
@section('createDoctors')
<h4 class="page-title">ِ<p>Add doctor</p> </h4>
<form role="form" method="POST" action="{{route('Doctors.store')}}" enctype="multipart/form-data">
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

	@include('Doctors._form')
	<div class="form-group">
				<label for="position">Password</label>
				<input value="{{old('password', $doctor->password?? null)}}" type="text" class="form-control" id="position" placeholder="Enter password" name="password">
			</div>
				<div class="form-group">
				<label for="position">Profile Picture</label>
				<input value="{{old('profile_photo_path', $doctor->profile_photo_path ?? null)}}" type="file" class="form-control" name="profile_photo_path">
			</div>

	<button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
	<button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>

</form>

@endsection
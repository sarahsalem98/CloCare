@extends('layouts.appReal')
@section('EditEmployee')

<h4 class="page-title"><p>Edit Employee "{{"$employee->name"}}" data</p> </h4>

<form role="form" method="POST" action="{{route('Employee.update',['Employee'=>$employee->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
	@if($errors->any())
	<div class="mt-2 mb-2">
		@foreach($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
			{{ $error }}
		</div>
		@endforeach
	</div>
	@endif

    <div class="col-4">
                <img src="{{ $employee->profile_photo_path ? $employee->url() : '' }}" 
                class="img-doctor" />

                <div class="card mt-4">
                    <div class="card-body">
                        <h6>{{ __('Upload a different photo') }}</h6>
                        <input class="form-control-file" type="file" name="profile_photo_path" />
                    </div>
                </div>
            </div>

    @include('Employee._form')
    <div class="form-group col-md-6">
				<label for="position">Password</label>
				<input value="{{old('password', $employee->password?? null)}}" type="text" class="form-control" id="position" placeholder="Enter password" name="password">
			</div>

	<button type="submit" class="btn btn-default waves-effect waves-light">Update</button>
	<button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>

@endsection
@extends('layouts.appReal')
@section('EditDoctors')

<h4 class="page-title"><p>Edit Doctor "{{"$doctor->name"}}" data</p> </h4>

<form role="form" method="POST" action="{{route('Doctors.update',['Doctor'=>$doctor->id])}}" enctype="multipart/form-data">
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
                <img src="{{ $doctor->profile_photo_path ? $doctor->url() : '' }}" 
                class="img-doctor" />

                <div class="card mt-4">
                    <div class="card-body">
                        <h6>{{ __('Upload a different photo') }}</h6>
                        <input class="form-control-file" type="file" name="profile_photo_path" />
                    </div>
                </div>
            </div>

	@include('Doctors._form')

	<button type="submit" class="btn btn-default waves-effect waves-light">Update</button>
	<button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>

@endsection
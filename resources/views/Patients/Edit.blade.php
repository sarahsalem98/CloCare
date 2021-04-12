@extends('layouts.appReal')
@section('editPatient')



<h4 class="page-title">
    <p>Edit Patient "{{"$patient->name"}}" data</p>
</h4>

<form role="form" method="POST" action="{{route('Patients.update',['Patient'=>$patient->id])}}" enctype="multipart/form-data">
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
        <img src="{{ $patient->profile_photo_path ? $patient->url() : '' }}" class="img-doctor" />

   
    </div>

    @include('Patients._form')

    <button type="submit" class="btn btn-default waves-effect waves-light">Update</button>
    <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancel</button>
    @endsection
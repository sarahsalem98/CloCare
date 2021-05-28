<div class="row">

    <div class="form-group col-md-4 ">
        <label for="name">Name</label>
        <input value="{{old('name',$patient->name ??null)}}" type="text" class="form-control" id="name" placeholder="Enter name" name="name">

    </div>

    <div class="form-group col-md-2">
        <label for="name">National ID</label>
        <input value="{{old('national_id',$patient->national_id ?? null)}}" type="text" class="form-control" id="name" placeholder="Enter your national id " name="national_id">
    </div>
    <div class="form-group col-md-2">
        <label for="name">profile photo</label>
        <input value="{{old('profile_photo_path',$patient->profile_photo_path ?? null)}}" type="file" class="form-control" id="name" placeholder="Enter your national id " name="profile_photo_path">
    </div>

</div>

<div class="row">


    <div class="form-group col-md-2">
        <label for="exampleInputEmail1">Phone number</label>
        <input value="{{old('phone_number', $patient->phone_number ?? null)}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone number" name="phone_number">
    </div>

    <div class="form-group col-md-2">
        <label for="position">Birth date</label>
        <input value="{{old('birth_date', $patient->birth_date ?? null)}}" type="date" class="form-control" id="position" placeholder="Enter place of your recent work" name="birth_date">

    </div>

    <div class="form-group col-md-4">
        <label for="position">Address</label>
        <input value="{{old('address', $patient->address ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter address" name="address">

    </div>


</div>
<div class="row">


    <div class="form-group col-md-4">
        <label for="position">hospital name</label>
        <input value="{{old('hospital_name', $patient->hospital_name ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter hospital name" name="hospital_name">

    </div>
    <div class="form-group col-md-2">
        <label for="position">gender</label>
        <select name="gender" >
            <option value="male">male</option>
            <option value="female">female</option>

        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="position"> arriving_data</label>
        <input value="{{old('arriving_date', $patient->arriving_date ?? null)}}" type="date" class="form-control" id="position" placeholder="Enter hospital name" name="arriving_date">

    </div>

</div>










<div class="row">

    <div class="form-group col-md-2">
        <label for="position">Blood type</label>
        <input value="{{old('bloodType', $patient->bloodType ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter blood type" name="bloodType">
    </div>

    <div class="form-group col-md-2">
        <label for="position">Height</label>
        <input value="{{old('height', $patient->height ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter height" name="height">
    </div>
    <div class="form-group col-md-2">
        <label for="position">Weight</label>
        <input value="{{old('weight', $patient->weight ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter weight" name="weight">
    </div>
    <div class="form-group col-md-2">
        <label for="position">Age</label>
        <input value="{{old('age', $patient->age ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter age" name="age">

    </div>
</div>




<div class="row">

    <div class="form-group col-md-2">
        <label for="position">Medicines</label>
        <input value="{{old('medicines[0]', $patient->medicines[0] ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter a medicine" name="medicines[0]">
    </div>

    <div class="form-group col-md-2">
        <label for="position"></label>
        <input value="{{old('medicines[1]', $patient->medicines[1] ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter a medicine" name="medicines[1]">
    </div>
    <div class="form-group col-md-2">
        <label for="position"></label>
        <input value="{{old('medicines[2]', $patient->medicines[2] ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter a medicine" name="medicines[2]">
    </div>

</div>

<div class="row">

    <div class="form-group col-md-2">
        <label for="position"></label>
        <input value="{{old('medicines[3]', $patient->medicines[3] ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter a medicine" name="medicines[3]">
    </div>
    <div class="form-group col-md-2">
        <label for="position"></label>
        <input value="{{old('medicines[4]', $patient->medicines[4] ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter a medicine" name="medicines[4]">
    </div>
    <div class="form-group col-md-2">
        <label for="position"></label>
        <input value="{{old('medicines[5]', $patient->medicines[5] ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter a medicine" name="medicines[5]">
    </div>

</div>
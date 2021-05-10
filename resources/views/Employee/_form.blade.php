
			<div class="form-group col-md-6">
				<label for="name">Name</label>
				<input value="{{old('name',$employee->name ??null)}}" type="text" class="form-control" id="name" placeholder="Enter name" name="name" >

			</div>
			<div class="form-group col-md-6">
				<label for="name">National ID</label>
				<input value="{{old('national_id',$employee->national_id ?? null)}}"  type="text" class="form-control" id="name" placeholder="Enter your national id " name="national_id">
			</div>

			<div class="form-group col-md-6">
				<label for="exampleInputEmail1">Email address</label>
				<input value="{{old('email', $employee->email ?? null)}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
			</div>

		

			<div class="form-group col-md-6">
				<label for="position">Work At</label>
				<input value="{{old('work_at', $employee->work_at ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter place of your recent work" name="work_at">
			</div>

			<div class="form-group col-md-6">
				<label for="position">Specialization</label>
				<input value="{{old('specialization', $employee->specialization ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter specialization" name="specialization">
			</div>
           
            <div class="form-group col-md-4">
				<label for="position">Address</label>
				<input value="{{old('address', $employee->address ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter address" name="address">
			</div>
            <div class="form-group col-md-4">
				<label for="position">phone Number</label>
				<input value="{{old('phone_number', $employee->phone_number ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter phone number" name="phone_number">
			</div>
            <div class="form-group col-md-2">
				<label for="position">isAdmin</label>
				<input value="{{old('is_admin', $employee->is_admin ?? null)}}" type="integer" class="form-control" id="position" placeholder="Enter position" name="is_admin">
			</div>


		
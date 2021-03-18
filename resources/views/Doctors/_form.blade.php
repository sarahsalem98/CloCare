
			<div class="form-group">
				<label for="name">Name</label>
				<input value="{{old('name',$doctor->name ??null)}}" type="text" class="form-control" id="name" placeholder="Enter name" name="name" >

			</div>
			<div class="form-group">
				<label for="name">National ID</label>
				<input value="{{old('national_id',$doctor->national_id ?? null)}}"  type="text" class="form-control" id="name" placeholder="Enter your national id " name="national_id">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input value="{{old('email', $doctor->email ?? null)}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
			</div>

		

			<div class="form-group">
				<label for="position">Work At</label>
				<input value="{{old('work_at', $doctor->work_at ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter place of your recent work" name="work_at">
			</div>

			<div class="form-group">
				<label for="position">Specialization</label>
				<input value="{{old('specialization', $doctor->specialization ?? null)}}" type="text" class="form-control" id="position" placeholder="Enter specialization" name="specialization">
			</div>
		


		
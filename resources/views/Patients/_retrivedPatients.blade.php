<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-6">
					<form role="form" action="{{route('searchPatients')}}" method="GET">
						<div class="form-group contact-search m-b-30">
							<input type="text" id="search" class="form-control" name="searchPatient" placeholder="Search...">
							<button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
						</div> <!-- form-group -->
					</form>
				</div>
				<div class="col-sm-2">
					<a href="{{route('Patients.create')}}" class="btn btn-default "> +Add patient</a>
				</div>
				<div class="col-sm-2">
					<a href="{{route('getPatientsOut')}}" class="btn btn-danger "> "{{$count_discharge}}" out patients</a>
				</div>
				<div class="col-sm-2">
					<a href="{{route('getPatientsIn')}}" class="btn btn-info "> "{{$count_In}}" In patients</a>
				</div>
			</div>

			<div class="table-responsive">
				<table class="table table-hover mails m-0 table table-actions-bar">
					<thead>
						<tr>
							<th>
								<!-- <div class="checkbox checkbox-primary checkbox-single m-r-15">
                                                            <input id="action-checkbox" type="checkbox">
                                                            <label for="action-checkbox"></label>
                                                        </div> -->
								<!-- <div class="btn-group dropdown">
				                                            <button type="button" class="btn btn-white btn-xs dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>
				                                            <ul class="dropdown-menu" role="menu">
				                                                <li><a href="#">Action</a></li>
				                                                <li><a href="#">Another action</a></li>
				                                                <li><a href="#">Something else here</a></li>
				                                                <li class="divider"></li>
				                                                <li><a href="#">Separated link</a></li>
				                                            </ul>
				                                        </div> -->
							</th>
							<th>Name</th>
							<th>National Id</th>
							<th>Phone number</th>
							<th> other controllers</th>
							<th>Action</th>
					
						</tr>
					</thead>

					<tbody>
						@foreach($patients as $patient)
						<tr class="active">
							<td>
								<div class="checkbox checkbox-primary m-r-15">
									<input id="checkbox2" type="checkbox" checked="">
									<label for="checkbox2"></label>
								</div>
								
								<img src="{{$patient->url()}}" alt="" title="{{$patient->url()}}" class="img-circle thumb-sm" />
							</td>

							<td>
								{{$patient->name}}
							</td>

							<td>
								<a href="{{route('Patients.show',['Patient'=>$patient->id])}}"> {{$patient->national_id}}</a>
							</td>

							<td>
								{{$patient->phone_number}}
							</td>

						
							
					<td>

					<div class="dropdown ">
  <button class="btn btn-info"> tests </button>
  <div class="dropdown-content">
	  @foreach($testNames as $testName)
    <a href="{{route('showTestValues',['test_id'=>$testName->id,'patient_id'=>$patient->id])}}">{{$testName->name}}</a>
  @endforeach
  </div>
</div>
							<a href="{{route('sensorReadings',['id'=> $patient->id])}}" class="btn btn-success">sensors</a>
							
						
							<a href="{{route('sensorReadings',['id'=> $patient->id])}}" class="btn btn-warning">reports</a>
					</td>
							<td>
			
							
								<form  method="POST" class="fm-inline" action="{{ route('Patients.destroy', ['Patient' => $patient->id]) }}">
									@csrf
									@method('DELETE')

								
									<a href="javascript:;" onclick="parentNode.submit();"  class="table-action-btn"><i class="md md-close"></i></a>
								</form>
								<a href="{{route('Patients.edit',['Patient' => $patient->id])}}" class="table-action-btn"><i class="md md-edit"></i></a>
							</td>
							
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>

	</div>

	<!-- end col -->


</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-8">
					<form role="form" action="{{route('searchEmployee')}}" method="GET">
						<div class="form-group contact-search m-b-30">
							<input type="text" id="search" class="form-control" name="search" placeholder="Search...">
							<button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
						</div> 
					</form>
				</div>
				<div class="col-sm-4">
					<a href="{{route('Employee.create')}}" class="btn btn-default "> Add Employee</a>
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
							<th>Specialization</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach($employees as $employee)
						<tr class="active">
							<td>
								<div class="checkbox checkbox-primary m-r-15">
									<input id="checkbox2" type="checkbox" checked="">
									<label for="checkbox2"></label>
								</div>
                                <!-- img -->
                                <img src="{{$employee->url()}}" alt="" title="{{$employee->url()}}" class="img-circle thumb-sm" />

							</td>

							<td>
								{{$employee->name}}
							</td>

							<td>
								<a href="{{route('Employee.show',['Employee'=>$employee->id])}}"> {{$employee->national_id}}</a>
							</td>

							<td>
								{{$employee->specialization}}
							</td>


							<td>
							
								<form  method="POST" class="fm-inline" action="{{ route('Employee.destroy', ['Employee' => $employee->id]) }}">
									@csrf
									@method('DELETE')

								
									<a href="javascript:;" onclick="parentNode.submit();"  class="table-action-btn"><i class="md md-close"></i></a>
								</form>
								<a href="{{route('Employee.edit',['Employee' => $employee->id])}}" class="table-action-btn"><i class="md md-edit"></i></a>
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
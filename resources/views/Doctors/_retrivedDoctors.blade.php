<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-8">
					<form role="form" action="/search" method="GET">
						<div class="form-group contact-search m-b-30">
							<input type="text" id="search" class="form-control" name="search" placeholder="Search...">
							<button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
						</div> <!-- form-group -->
					</form>
				</div>
				<div class="col-sm-4">
					<a href="{{route('Doctors.create')}}" class="btn btn-default "> Add Doctors</a>
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
						@foreach($doctors as $doctor)
						<tr class="active">
							<td>
								<div class="checkbox checkbox-primary m-r-15">
									<input id="checkbox2" type="checkbox" checked="">
									<label for="checkbox2"></label>
								</div>
								<!-- {{$doctor->url()}} -->
								<img src="{{$doctor->url()}}" alt="" title="{{$doctor->url()}}" class="img-circle thumb-sm" />
							</td>

							<td>
								{{$doctor->name}}
							</td>

							<td>
								<a href="{{route('Doctors.show',['Doctor'=>$doctor->id])}}"> {{$doctor->national_id}}</a>
							</td>

							<td>
								{{$doctor->specialization}}
							</td>


							<td>
							
								<form  method="POST" class="fm-inline" action="{{ route('Doctors.destroy', ['Doctor' => $doctor->id]) }}">
									@csrf
									@method('DELETE')

								
									<a href="javascript:;" onclick="parentNode.submit();"  class="table-action-btn"><i class="md md-close"></i></a>
								</form>
								<a href="{{route('Doctors.edit',['Doctor' => $doctor->id])}}" class="table-action-btn"><i class="md md-edit"></i></a>
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

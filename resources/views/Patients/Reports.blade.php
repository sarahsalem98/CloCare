@extends('layouts.appReal')

@section('Reports')


<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-20 ">

                    <h3> Reports  for  <b class="btn-success"> {{$patient->name}} </b></h3>

                </div>
            </div>
       


            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                        <tr>
                            <!-- <th> -->
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
                            <!-- </th> -->
                            <th>patient_id</th>
                            <th>doctor_id  </th>
                            <th>diagnose</th>
                           <th>traits</th>
                           <th>department</th>
                           <th>comments</th>
                           <th>arriving_date</th>
                           <th>discharge_date</th>
                            <th>medicine</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reports as $report)
                        <tr class="active">
                 
                           <td>
                                {{$report->patient_id }}
                            </td>
                            <td>
                                {{$report->doctor_id  }}
                            </td>
                            <td>
                                {{$report->diagnose }}
                            </td>
                            <td>
                                {{$report->traits }}
                            </td>
                            <td>
                                {{$report->department }}
                            </td>
                            <td>
                                {{$report->comments }}
                            </td>
                            <td>
                                {{$report->arriving_date }}
                            </td>
                            <td>
                                {{$report->discharge_date }}
                            </td>
                            <td>
                                {{$report->medicine }}
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


@endsection
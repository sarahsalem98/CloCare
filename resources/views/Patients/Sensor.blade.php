@extends('layouts.appReal')

@section('Sensors')


<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-6 ">

                    <h3>sensor readings for {{$patient->name}}</h3>

                </div>
            </div>
            <div class="row">

                <div class="col-sm-4 ">

                    <h5 class="btn-success">Averge spo2 for {{$patient->name}} is:{{$avgspo2}}</h5>

                </div>
                <div class="col-sm-4 ">

                    <h5 class="btn-success">Averge heart rate for {{$patient->name}} is:{{$avgheart}}</h5>

                </div>
                <div class="col-sm-4 ">

                    <h5 class="btn-success">averge temprature for {{$patient->name}} is:{{$avgtemp}}</h5>

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
                            <th>patient id</th>
                            <th>spo2</th>
                            <th>temprature</th>
                            <th>heart rate</th>
                       
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sensorPatients as $sensorPatient)
                        <tr class="active">
                            <td>
                                <div class="checkbox checkbox-primary m-r-15">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2"></label>
                                </div>


                            </td>
                            <td>
                                {{$sensorPatient->patient_id}}
                            </td>

                            <td>
                                {{$sensorPatient->spo2}}
                            </td>


                            <td>
                                {{$sensorPatient->heartRate}}
                            </td>

                            <td>
                                {{$sensorPatient->temp}}
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

@endsection()
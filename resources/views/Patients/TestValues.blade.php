@extends('layouts.appReal')

@section('TestValues')


<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-20 ">

                    <h3> test <b class="btn-success"> {{$testName->name}}</b> values for {{$patient->name}}</h3>

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
                            <th>patient id</th>
                            <th>test_id </th>
                            <th>wbc</th>
                            <th> hgb </th>
                            <th>hct</th>
                            <th>platelets</th>

                            <th>alt</th>
                            <th>ast</th>
                            <th>alk_phos</th>

                            <th>bun</th>
                            <th>cr</th>
                            <th>sodium</th>
                            <th>potassium</th>

                            <th>chloride</th>
                            <th>bicrab</th>
                            <th>ca</th>
                            <th>phos</th>

                            <th>t_bilirubin</th>
                            <th>alb</th>
                            <th>t_protein</th>
                            <th>glob</th>

                            <th>glucose</th>
                            <th>glucose1</th>
                            <th>alb_cr_ratio</th>
                            <th>trigs</th>

                            <th>t_chol</th>
                            <th>hdl</th>
                            <th>ldl_chol</th>
                            <th>a1c</th>

                            <th>insulin</th>
                            <th>iron</th>
                            <th>u_acid</th>
                            <th>s_cotinine</th>

                            <th>cpk</th>
                            <th>ldh</th>
                            <th>fvc</th>
                            <th>fev1</th>
                            <th>fev1_fvc_ratio</th>
                            <th>memory</th>
                           
                            
                            <th>created at</th>
                            <th>updated at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($testVales as $testVale)
                        <tr class="active">
                 
                            <td>
                                {{$testVale->patient_id}}
                            </td>

                            <td>
                                {{$testVale->test_id}}
                            </td>

                            <td>
                                {{$testVale->wbc}}
                            </td>

                            <td>
                                {{$testVale->hgb}}
                            </td>

                            <td>
                                {{$testVale->hct}}
                            </td>

                            <td>
                                {{$testVale->platelets }}
                            </td>

                            <td>
                                {{$testVale->alt }}
                            </td>
                            <td>
                                {{$testVale->ast }}
                            </td>
                            <td>
                                {{$testVale->alk_phos }}
                            </td>
                            <td>
                                {{$testVale->bun }}
                            </td>
                            <td>
                                {{$testVale->cr }}
                            </td>
                            <td>
                                {{$testVale->sodium }}
                            </td>
                            <td>
                                {{$testVale->potassium }}
                            </td>
                            <td>
                                {{$testVale->chloride }}
                            </td>
                            <td>
                                {{$testVale->bicrab }}
                            </td>
                            <td>
                                {{$testVale->ca }}
                            </td>
                            <td>
                                {{$testVale->phos }}
                            </td>
                            <td>
                                {{$testVale->t_bilirubin }}
                            </td>
                            <td>
                                {{$testVale->alb }}
                            </td>
                            <td>
                                {{$testVale->t_protein }}
                            </td>
                            <td>
                                {{$testVale->glob }}
                            </td>
                            <td>
                                {{$testVale->glucose }}
                            </td>
                            <td>
                                {{$testVale->glucose1 }}
                            </td>
                            <td>
                                {{$testVale->alb_cr_ratio }}
                            </td>
                            <td>
                                {{$testVale->trigs }}
                            </td>
                            <td>
                                {{$testVale->t_chol }}
                            </td>
                            <td>
                                {{$testVale->hdl }}
                            </td>
                            <td>
                                {{$testVale->ldl_chol }}
                            </td>
                            <td>
                                {{$testVale->a1c }}
                            </td>
                            <td>
                                {{$testVale->insulin }}
                            </td>
                            <td>
                                {{$testVale->iron }}
                            </td>
                            <td>
                                {{$testVale->u_acid }}
                            </td>
                            <td>
                                {{$testVale->s_cotinine }}
                            </td>
                            <td>
                                {{$testVale->cpk }}
                            </td>
                            <td>
                                {{$testVale->ldh }}
                            </td>
                            <td>
                                {{$testVale->fvc }}
                            </td>
                            <td>
                                {{$testVale->fev1 }}
                            </td>
                            <td>
                                {{$testVale->fev1_fvc_ratio }}
                            </td>
                            <td>
                                {{$testVale->memory }}
                            </td>
                            <td>
                                {{$testVale->created_at }}
                            </td>
                            <td>
                                {{$testVale->updated_at }}
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
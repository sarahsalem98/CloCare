@extends('layouts.appReal')
@section('detailsPatient')


<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">


                <h4 class="page-title">
                    <p>Patient "{{$patient->name}}" Details</p>
                </h4>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="card-box product-detail-box">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="sp-loading "><img class="img-doctor2" src="{{$patient->url()}}" alt=""><br>
                            </div>
                            <!-- <div class="img-doctor">
                                               <a href="assets/images/products/big/1.jpg"><img src="" alt=""></a>
                                           </div> -->
                        </div>

                        <div class="col-sm-8">
                            <div class="col-xs-12">
                                <h4><b></b></h4>
                                <div class="table-responsive m-t-20">
                                    <h3><b>{{$patient->name}}</b></h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td><b> National Id</b></td>
                                                <td>
                                                    {{$patient->national_id}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="400"><b>Phone number</b> </td>
                                                <td>
                                                    {{$patient->phoneNumber}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b> Address</b> </td>
                                                <td>
                                                    {{$patient->address}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Birth date</b> </td>
                                                <td>
                                                    {{$patient->birth_date}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>Age</b> </td>
                                                <td>
                                                    {{$patient->age}}
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><b>Birth date</b> </td>
                                                <td>
                                                    {{$patient->birth_date}}
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><b>height</b> </td>
                                                <td>
                                                    {{$patient->height}}
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><b>	weight</b> </td>
                                                <td>
                                                    {{$patient->weight}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>	bloodType</b> </td>
                                                <td>
                                                    {{$patient->bloodType}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>	diseases</b> </td>
                                                <td>
                                                    @for($i=0;$i<=5;$i++)
                                                    {{$patient->diseases[$i]}},,
                                                    @endfor
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td><b>	medicines</b> </td>
                                                <td>
                                                    @for($i=0;$i<=5;$i++)
                                                    {{$patient->medicines[$i]}}
                                                    @endfor
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>	created_at</b> </td>
                                                <td>
                                                    {{$patient->created_at}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>	updated_at</b> </td>
                                                <td>
                                                    {{$patient->updated_at}}
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->



                </div> <!-- end card-box/Product detai box -->
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->

<footer class="footer">
    © 2016. All rights reserved.
</footer>

</div>
@endsection
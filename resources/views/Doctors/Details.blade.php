@extends('layouts.appReal')
@section('details')


<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
                             

								<h4 class="page-title"><p>Doctor "{{$doctor->name}}" Details</p> </h4>
						
							</div>
						</div>

                       <div class="row">
                           <div class="col-xs-12">
                               <div class="card-box product-detail-box">
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <div class="sp-loading "><img class="img-doctor2" src="{{$doctor->url()}}" alt=""><br>
                                           </div>
                                           <!-- <div class="img-doctor">
                                               <a href="assets/images/products/big/1.jpg"><img src="" alt=""></a>
                                           </div> -->
                                       </div>

                                       <div class="col-sm-8">
                                       <div class="col-xs-12">
                                           <h4><b></b></h4>
                                           <div class="table-responsive m-t-20">
                                               <h3><b>{{$doctor->name}}</b></h3>
                                               <table class="table">
                                                   <tbody>
                                                   <tr>
                                                           <td><b> National Id</b></td>
                                                           <td>
                                                              {{$doctor->national_id}}
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td width="400"><b>specialization</b> </td>
                                                           <td>
                                                               {{$doctor->specialization}}
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td><b>Working at</b> </td>
                                                           <td>
                                                               {{$doctor->work_at}}
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td><b>email</b> </td>
                                                           <td>
                                                             {{$doctor->email}}
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
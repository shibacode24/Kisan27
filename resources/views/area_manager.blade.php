@extends('layout')

@section('content')


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <div class="form-group">
                                    <div class="col-md-12" align="center" style="margin-top:-12px;">
                                        <h5 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class="fa fa-user"></span> <strong>Master Dashboard</strong></h5>
                                    </div>

                                    <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                                        <a href="area_master.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>Area Master</button></a>
                                        <a href="role_master.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>Role</button></a>
                                        <a href="state.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>State</button></a>
                                        <a href="district.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>District</button></a>
                                        <a href="tehsil.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>Tehsil</button></a>
                                        <a href="city.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>City</button></a>

                                    </div>
                                </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top:-15px;">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
				@include('alert')

                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;Area Sales Manager Registration </h5>

                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">

                    @if(count($errors)>0)
                     <ul class="alert alert-danger">
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                         @endforeach
                     </ul>
                     @endif

                        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('create-area_manager')}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top:-10px;">

                                    <!-- 
                                                <div class="col-md-4" style="margin-top:15px;">
                                                      <label>Select Customer Type<font color="#FF0000">*</font></label>              
                                                    <select class="form-control select">
                                                        <option>Person</option>
                                                        <option>Hotel</option>
                                                    </select>
                                                </div> -->
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Emp Id<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="emp_id" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Designation<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="designation" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Photo<font color="#FF0000">*</font></label>
                                        <input type="file" id="image" name="image" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Name<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="name" class="form-control" required />
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Mobile Number<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" "  maxlength="10" name="mobile_number" class="form-control" maxlength="10" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Email Id<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="email" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Age<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="age" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Gender<font color="#FF0000">*</font></label>
                                        <select class="form-control select" name="gender">
                                            <option></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <label>Address<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="add" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Sup Name<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="sup" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Sup Con<font color="#FF0000">*</font></label>
                                        <input type="number" placeholder=" " maxlength="10" name="contact" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>HR Name<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="hrn" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>HR Email<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="hremail" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>HR Contact Number<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " maxlength="10" name="hr_number" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>State<font color="#FF0000">*</font></label>
                                        <select class="form-control select" data-live-search="true" name="state" id="state" required>
                                            <option>Select State</option>
                                            @foreach ($states as $state)
                                            <option value="{{$state->id}}">{{$state->State_Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>District<font color="#FF0000">*</font></label>
                                        <select class="form-control select" name="distric" id="district" data-live-search="true" required>
                                        <option>Select District</option>
                                           
                                        </select>
                                    </div>


                                   
 

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Tehsil<font color="#FF0000">*</font></label>
                                        <select class="form-control select" name="tehsil" id="tehsil" data-live-search="true" required>
                                        <option>Select Tehsil</option>
                                        
                                        </select>
                                    </div>
                                   
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>City<font color="#FF0000">*</font></label>
                                        <select class="form-control select" data-live-search="true" name="city" id="city" required>
                                        <option>Select City</option>
                                            
                                        </select>
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Region<font color="#FF0000">*</font></label>
                                        <select class="form-control select" data-live-search="true" name="region" id="region" required>
                                        <option>Select Region</option>
                                            
                                        </select>
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Username<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="user" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Password<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="pass" class="form-control" required />
                                    </div>
                                    <!-- <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Pincode<font color="#FF0000">*</font></label>
                                                    <input type="number" placeholder=" " class="form-control" required/>
                                                </div> -->



                                    <!-- <div class="col-md-2" style="margin-top:15px;">
                                                    <label>User Id<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder=" " class="form-control" required/>
                                                </div>
                                                <div class="col-md-2" style="margin-top:15px;">
                                                    <label>Password<font color="#FF0000">*</font></label>
                                                    <input type="text" placeholder=" " class="form-control" required/>
                                                </div>
                                                <div class="col-md-2" style="margin-top:6vh;">
                                                    <input type="radio" id="sm" name="fav_language" value="SM">
                                                    <label for="sm">SM</label>&nbsp;&nbsp;
                                                    <input type="radio" id="asm" name="fav_language" value="ASM">
                                                    <label for="asm">ASM</label>&nbsp;&nbsp;
                                                    <input type="radio" id="sp" name="fav_language" value="SP">
                                                    <label for="sp">SP</label>
                                                </div> -->
                                    <div class="col-md-2" style="margin-top:5vh;">

                                        <div class="input-group" style=" margin-bottom:15px;">

                                            <button type="submit" name="areamanager" value="Areamanager" class="btn btn-primary"><span class="fa fa-plus"></span> Submit </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div>
            <div>
                <!-- END DEFAULT DATATABLE -->
                <!-- 


                            <div class="col-md-3"></div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> Registered Area Sales Manager</h5>

                            <div class="panel-body">
                                <table class="table" id="area_manager_datatable">
                                    <thead>
                                        <tr>
                                             <th>Sr.no.</th> 
                                            <th>Emp-Id</th>
                                            <th>Designation</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Mo.No.</th>
                                            <th>Email id</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Sup Name</th>
                                            <th>Sup Con</th>
                                            <th>HR Name</th>
                                            <th>HR Email</th>
                                            <th>HR Con.No</th>
                                            <th>State</th>
                                            <th>District</th>
                                            <th>Tehsil</th>
                                            <th>City</th> 
                                            <th>Region</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($areamanagers as $areamanager)
                                     <tr>
                                        
										 <td>{{$loop->index+1}}</td>
                                         <td>{{$areamanager->Emp_Id}}</td>
                                         <td>{{$areamanager->Designation}}</td>
                                         <td>
											 <a href="{{asset('images/upload_asm_img/'.$areamanager->Photo)}}" target="_blank">
												  
											 {{$areamanager->Photo}}
											 </a>
										 </td>
                                         <td>{{$areamanager->Name}}</td>
                                         <td>{{$areamanager->Mobile_Number}}</td>
                                         <td>{{$areamanager->Email}}</td>
                                         <td>{{$areamanager->Age}}</td>
                                         <td>{{$areamanager->Gender}}</td>
                                         <td>{{$areamanager->Address}}</td>
                                         <td>{{$areamanager->Sup_Name}}</td>
                                         <td>{{$areamanager->Sup_Con}}</td>
                                         <td>{{$areamanager->HR_Name}}</td>
                                         <td>{{$areamanager->HR_Email}}</td>
                                         <td>{{$areamanager->HR_Number}}</td>
                                         <td>{{$areamanager->State_Name}}</td>
                                         <td>{{$areamanager->District}}</td>
                                         <td>{{$areamanager->Tehsil}}</td>
                                         <td>{{$areamanager->City}}</td>
                                         <td>{{$areamanager->Region}}</td>
                                         <td>
                                             <a href="{{route('edit-area_manager',$areamanager->id)}}" ><button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                             </a><br><br>
                                             <a onclick="return confirm('Are You Sure To Delete This?')" href="{{route('destroy-area_manager',$areamanager->id)}}">
                                             <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                             </a>
                                         </td>
                                     </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>

<script>
    var msg = '{{Session::get("alert")}}';
    var exist = '{{Session::has("alert")}}';
    if (exist) {
        alert(msg);
    }
</script>

</div>
@stop
@section('js')
<script>
    $(document).ready(function() {
        $('#area_manager_datatable').DataTable({
            // scrollY: 110,
            scrollX:  true,
            scroller: true,
            "pageLength": 100

        });
        //pagelength is use to define number of records per page
        $(document).on("change", "#state", function() {
            $.ajax({
                url: "{{route('get_all_id')}}",
                data: {
                    id: $(this).val(),
                },
                success: function(result) {
                    $("#district").empty();
                    $.each(result['district'], function(a, b) {
                        $("#district").append('<option value="' + b.id + '">' + b.District + '</option>');
                    })
                    $("#district").selectpicker('refresh');



                    $("#tehsil").empty();
                    $.each(result['tehsil'], function(a, b) {
                        $("#tehsil").append('<option value="' + b.id + '">' + b.Tehsil + '</option>');
                    })
                    $("#tehsil").selectpicker('refresh');



                    $("#city").empty();
                    $.each(result['city'], function(a, b) {
                        $("#city").append('<option value="' + b.id + '">' + b.City + '</option>');
                    })
                    $("#city").selectpicker('refresh');



                    $("#region").empty();
                    $.each(result['region'], function(a, b) {
                        $("#region").append('<option value="' + b.id + '">' + b.Region + '</option>');
                    })
                    $("#region").selectpicker('refresh');
                }
            });
        })




        $(document).on("change", "#district", function() {
            $.ajax({
                // url: "{{route('get_tehsil_by_id')}}",
                url: "{{route('all')}}",
                data: {
                    id: $(this).val(),
                },
                success: function(result) {
                    $("#tehsil").empty();
                    $.each(result['tehsil'], function(a, b) {
                        $("#tehsil").append('<option value="' + b.id + '">' + b.Tehsil + '</option>');
                    })
                    $("#tehsil").selectpicker('refresh');


                    $("#city").empty();
                    $.each(result['city'], function(a, b) {
                        $("#city").append('<option value="' + b.id + '">' + b.City + '</option>');
                    })
                    $("#city").selectpicker('refresh');

                }
            });
        })


        $(document).on("change", "#tehsil", function() {
            $.ajax({
                url: "{{route('get_city_by_id')}}",
                data: {
                    id: $(this).val(),
                },
                success: function(result) {
                    $("#city").empty();
                    $.each(result, function(a, b) {
                        $("#city").append('<option value="' + b.id + '">' + b.City + '</option>');
                    })
                    $("#city").selectpicker('refresh');
                }
            });
        })

        $(document).on("change", "#state", function() {
            $.ajax({
                url: "{{route('get_region_by_id')}}",
                data: {
                    id: $(this).val(),
                },
                success: function(result) {
                    $("#region").empty();
                    $.each(result, function(a, b) {
                        $("#region").append('<option value="' + b.id + '">' + b.Region + '</option>');
                    })
                    $("#region").selectpicker('refresh');
                }
            });
        })

    })
</script>
@stop
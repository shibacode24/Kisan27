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

            <div class="panel panel-default">
         @include('alert')
                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;Sales Manager Registration </h5>

				    
				
                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">
                    @if(count($errors)>0)
                     <ul class="alert alert-danger">
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                         @endforeach
                     </ul>
                     @endif

                        <form role="form" method="POST" action="{{route('create-sales_manager')}}">
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
                                        <input type="text" placeholder=" " class="form-control" required/ name="emp_id">
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Name<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="name">
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Mobile Number<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " maxlength="10" class="form-control" required/ name="mobile_no">
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Email Id<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="email">
                                    </div>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <label>Address<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="address">
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
                                        <label>Pincode<font color="#FF0000">*</font></label>
                                        <input type="number" placeholder=" " class="form-control" required/ name="pincode">
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Username<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="Username">
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Password<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="Password">
                                    </div>

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

                                            <button type="submit" name="sale" value="Sale" class="btn btn-primary"><span class="fa fa-plus"></span> Submit </button>
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
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> Registered Sales Manager </h5>

                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                           <th>Sr No</th>
                                            <th>Emp-id</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email id</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>District</th>
                                            <th>Tahsil</th>
                                            <th>City</th>
                                            <th>Region</th>
                                            <th>Pincode</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($salemanagers as $salemanager)
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$salemanager->Emp_Id}}</td>
                                            <td>{{$salemanager->Name}}</td>
                                            <td>{{$salemanager->Mobile_Number}}</td>
                                            <td>{{$salemanager->Email_Id}}</td>
                                            <td>{{$salemanager->Address}}</td>
                                            <td>{{$salemanager->State_Name}}</td>
                                            <td>{{$salemanager->District}}</td>
                                            <td>{{$salemanager->Tehsil}}</td>
                                            <td>{{$salemanager->City}}</td>
                                            <td>{{$salemanager->Region}}</td>
                                            <td>{{$salemanager->Pincode}}</td>
                                            <td>
                                                <a href="{{route('edit-sales_manager',$salemanager->id)}}"><button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                </a><br><br>
                                                <a onclick="return confirm('Are You Sure To Delete This?')" href="{{route('destroy-sales_manager',$salemanager->id)}}">
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

    <script>
     var msg = '{{Session::get('
     alert ')}}';
     var exist = '{{Session::has('
     alert ')}}';
     if (exist) {
         alert(msg);
     }
 </script>

</div>
<!-- END PAGE CONTAINER -->
@stop
@section('js')
<script>
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



</script>
@stop
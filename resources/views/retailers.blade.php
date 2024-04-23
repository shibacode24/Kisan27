@extends('layout')

@section('content')


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                 
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- <div class="col-md-12" style="margin-top:-15px;">

            <div class="panel panel-default">
         @include('alert')
                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;Retailers Registration </h5>

				    
				
                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">
                    @if(count($errors)>0)
                     <ul class="alert alert-danger">
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                         @endforeach
                     </ul>
                     @endif

                        <form role="form" method="POST" action="{{route('create-retailers')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top:-10px;">

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Name<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="name">
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Firm Name<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="firm_name">
                                    </div>
                                   

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Mobile Number<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " maxlength="10" class="form-control" required/ name="mobile_no">
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Aadhar Number<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="aadhar_card">
                                    </div>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <label>Address<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="address">
                                    </div>
                                   

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Front Shop Photo<font color="#FF0000">*</font></label>
                                        <input type="file" placeholder=" " class="form-control" required/ name="front_shop_pic">
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Username<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="username">
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Password<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required/ name="password">
                                    </div>

                                  
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
        </div> --}}


        <div>
            <div>
                <!-- END DEFAULT DATATABLE -->
                <!-- 


                            <div class="col-md-3"></div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> Registered Retailers </h5>

                            <div class="panel-body">
                                <table id="example9">
                                    <thead>
                                        <tr>
                                           <th>Sr No</th>
                                            <th>Name</th>
                                            <th>Firm Name</th>
                                            <th>Mobile No.</th>
                                            <th>Aadhar No.</th>
                                            <th>Address</th>
                                            <th>Front Shop Pic</th>
                                            {{-- <th>Username</th>
                                            <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($retailers as $retailers)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>   
                                            <td>{{$retailers->Name}}</td>
                                            <td>{{$retailers->firm_name}}</td>
                                            <td>{{$retailers->aadhar_card}}</td>
                                            <td>{{$retailers->Mobile_Number}}</td>
                                            <td>{{$retailers->Address}}</td>
                                            <td  >
                                                <a href="{{asset('images/retailers/'.$retailers->front_shop_pic)}}" target="_blank"><img src="{{asset('images/retailers/'.$retailers->front_shop_pic)}}" style="width: 50px;height:50px;">
                                                </a>
                                            </td>
                                            {{-- <td>{{$retailers->Username}}</td> --}}

                                            {{-- <td>
                                                <a href="{{route('edit-retailers',$retailers->id)}}"><button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                </a><br><br>
                                                <a onclick="return confirm('Are You Sure To Delete This?')" href="{{route('destroy-retailers',$retailers->id)}}">
                                                    <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                                </a>
                                            </td> --}}
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
 new DataTable('#example9', {
                layout: {
                    topStart: {
                        buttons: ['excel', 'pdf']
                    }
                }
            });

</script>
@stop
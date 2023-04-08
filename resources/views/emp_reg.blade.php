@extends('layout')

@section('content')



<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12" style="margin-top:-15px;">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">

                <h5 class="panel-title" style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;Employee Registration </h5>

                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">



                        <form role="form">
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
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Name<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Mobile Number<font color="#FF0000">*</font></label>
                                        <input type="number" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Email Id<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <label>Address<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>City<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Religion<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>State<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Pincode<font color="#FF0000">*</font></label>
                                        <input type="number" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>District<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Tahsil<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>User Id<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Password<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:6vh;">
                                        <input type="radio" id="sm" name="fav_language" value="SM">
                                        <label for="sm">SM</label>&nbsp;&nbsp;
                                        <input type="radio" id="asm" name="fav_language" value="ASM">
                                        <label for="asm">ASM</label>&nbsp;&nbsp;
                                        <input type="radio" id="sp" name="fav_language" value="SP">
                                        <label for="sp">SP</label>
                                    </div>
                                    <div class="col-md-8" style="margin-top:1vh;" align="right">

                                        <div class="input-group" style=" margin-bottom:15px;">

                                            <button type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Submit </button>
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
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> Registered Employees</h5>

                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr.no.</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Emp-id</th>
                                            <th>Email id</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Religion</th>
                                            <th>State</th>
                                            <th>Pincode</th>
                                            <th>District</th>
                                            <th>Tahsil</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Lorem Lipsum</td>
                                            <td>9999555544</td>
                                            <td>LR4586</td>
                                            <td>Lorem@gmail.com</td>
                                            <td>Green Crest, Yamuna Nagar,Andheri (west) Mumbai</td>
                                            <td>Mumbai</td>
                                            <td>Hindu</td>
                                            <td>MH</td>
                                            <td>400053</td>
                                            <td>Mumbai</td>
                                            <td>Mumbai</td>
                                            <td>
                                                <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                            </td>
                                        </tr>
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
<!-- END PAGE CONTAINER -->
@stop
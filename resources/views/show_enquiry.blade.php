@extends('layout')

@section('content')


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-12" align="center" style="margin-top:-12px;">
                        <h5 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class="fa fa-user"></span> <strong>Master Dashboard</strong></h5>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12" style="margin-top:-15px;">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">

            <h5 class="panel-title" style="color:#FFFFFF; background-color:#A43F3E; width:100%; font-size:14px;" align="center"><i class="fa fa-bank"></i> &nbsp;Enquiry</h5>


        </div>
    </div>



    <div>
        <!-- END DEFAULT DATATABLE -->









        <div class="row">
            <div class="col-md-12" style="margin-top:-15px;">


                <div class="panel panel-default">




                    <div class="col-md-12" style="margin-top:15px;">


                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.no.</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>

                                        <th>Area</th>
                                        <th>Description</th>
                                        <th>Assign Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Chaprasipura</td>
                                        <td>Camp square, Amravati.</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Shop"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Shop"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
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
</div>
<!-- PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
@stop
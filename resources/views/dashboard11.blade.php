@extends('layout')
@section('content')

<style>
    * {
        box-sizing: border-box
    }

    /* Set height of body and the document to 100% */
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial;
    }

    /* Style tab links */
    .tablink {
        background-color: rgb(245, 245, 245);
        color: rgb(24, 23, 23);
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #777;
    }

    .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }
</style>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">

                        <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                            <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class=""></span> <strong>Dashboard</strong></h6>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<form action="" method="get">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;" align="center">
                    <i class="fa fa-home"></i> Dashboard
                </h5>
                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">

                        <div class="col-md-2"></div>
                        <div class="col-md-2" style="margin-top:15px ;">
                            <div class="widget widget-item-icon" style="background-color: green;">
                                <div class="widget-item-left">
                                    <img src="logo/division.png">
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count shake "><span class="shivani" style="color:#FFFFFF"><?php
                                                                                                                            $count = DB::table('sales_manager')->count();
                                                                                                                            echo '<h3>' . $count . '</h3>';
                                                                                                                            ?></span>
                                    </div>

                                    <div class="widget-subtitle"><b>SM</b></div>
                                    <!-- <div><b>OT Appoinment</b></div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2" style="margin-top:15px ;">
                            <div class="widget widget-item-icon" style="background-color: green;">
                                <div class="widget-item-left">
                                    <img src="logo/employees.png">
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count shake "><span class="shivani">
                                            <?php
                                            $count = DB::table('area_manager')->count();
                                            echo '<h3>' . $count . '</h3>';
                                            ?>
                                        </span>
                                    </div>

                                    <div class="widget-subtitle"><b>ASM</b></div>
                                    <!-- <div><b>OT Appoinment</b></div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2" style="margin-top:15px ;">
                            <div class="widget widget-item-icon" style="background-color: green;">
                                <div class="widget-item-left">
                                    <img src="logo/employees.png">
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count shake "><span class="shivani">
                                            <?php
                                            $count = DB::table('sales_person')->count();
                                            echo '<h3>' . $count . '</h3>';
                                            ?>
                                        </span></div>

                                    <div class="widget-subtitle"><b>Total Employee</b></div>
                                    <!-- <div><b>OT Appoinment</b></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-top:15px ;">
                            <div class="widget widget-item-icon" style="background-color: green;">
                                <div class="widget-item-left">
                                    <img src="logo/division.png">
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count shake "><span class="shivani">
                                            <?php
                                            $count = DB::table('journeyplan')->count();
                                            echo '<h3>' . $count . '</h3>';
                                            ?>
                                        </span></div>

                                    <div class="widget-subtitle"><b>Total JourneyPlan</b></div>
                                    <!-- <div><b>OT Appoinment</b></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
</form>
<form role="form" action="{{route('sm')}}" method="get">
    <div class="col-md-12">
        <div class="col-md-2"></div>
        <div class="form-group" style="margin-top:-10px;">


            <div class="col-sm-2" style="margin-top: 15px;">
                <div class="form-group ">
                    <label>State/UT<font color="#FF0000">*</font></label>
                    <select class="form-control select" name="state" value="" id="state" data-live-search="true" required>
                  
                    </select>
                </div>
            </div>

            <div class="col-sm-2" style="margin-top: 15px;">
                <div class="form-group ">
                    <label>Employee<font color="#FF0000">*</font></label>
                    <select id="person_select" name="person_select" class="form-control select" multiple="multiple" required="">
                        <option value="a1"> 1 </option>
                        <option value="a2"> 2 </option>
                        <option value="a3"> 3 </option>
                        <option value="a4"> 4 </option>
                        <option value="a5"> 5 </option>
                    </select>
                </div>
            </div>


            <div class="col-md-2" align="left" style="margin-top:15px;">
                <div class="input-group">
                    <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                </div>

                <label>From Date</label>
                <div class="input-group">
                    <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>


            <div class="col-md-2" align="left" style="margin-top:15px;">
                <div class="input-group">
                    <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                </div>

                <label>To Date</label>
                <div class="input-group">
                    <input type="text" id="dp-3" class="form-control " value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>



        </div>

        <div class="col-md-1" style="margin-top:4.2vh; ">

            <div class="input-group" style="margin-top:0px; margin-bottom:30px;">

                <button type="button" class="btn btn-primary">
                    Submit </button>
            </div>
        </div>
    </div>
    </div>
</form>

<button class="tablink" onclick="openPage('Home', this, )">Tracking</button>
                            <button class="tablink" onclick="openPage('News', this, )">Documents</button>
                            <button class="tablink" onclick="openPage('Contact', this, )">Leave</button>
                            <button class="tablink" onclick="openPage('About', this, )">Visit</button>
                            <div id="Home" class="tabcontent">
                                <h3>Tracking</h3>
                                <div>
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <div class="panel panel-default">
                                                <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;">
                                                    <div class="panel-body"
                                                        style="margin-top:-10px; margin-bottom:-15px;">
                                                        <table class="table datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr.no</th>
                                                                    <th>Time</th>
                                                                    <th>Kilometer</th>
                                                                    <th>Route</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <button
                                                                            style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                            type="button" class="btn btn-info"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Edit Item"><i class="fa fa-edit"
                                                                                style="margin-left:5px;"></i></button>
                                                                        <button
                                                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                            type="button" class="btn btn-info"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Delete Item"><i class="fa fa-trash-o"
                                                                                style="margin-left:5px;"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="margin-top:15px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="News" class="tabcontent">
                                <h3>Documents</h3>
                                <div>
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <div class="panel panel-default">
                                                <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;">
                                                    <div class="panel-body"
                                                        style="margin-top:-10px; margin-bottom:-15px;">
                                                        <table class="table datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr.no</th>
                                                                    <th>Applied</th>
                                                                    <th>Expences</th>
                                                                    <th>Status</th>
                                                                    <th>Approval</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <button
                                                                            style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                            type="button" class="btn btn-info"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Edit Item"><i class="fa fa-edit"
                                                                                style="margin-left:5px;"></i></button>
                                                                        <button
                                                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                            type="button" class="btn btn-info"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Delete Item"><i class="fa fa-trash-o"
                                                                                style="margin-left:5px;"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="margin-top:15px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<div id="Contact" class="tabcontent">
    <h3>Leave</h3>
    <div>
        <div class="row">
            <div class="col-md-12" style="margin-top:10px;">
                <div class="panel panel-default">

                    <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;">

                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>

                                        <th>Sr.no</th>
                                        <th>Applied</th>
                                        <th>Expences</th>
                                        <th>Status</th>
                                        <th>Approval</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td>
                                            <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3" style="margin-top:15px;"></div>


                </div>


            </div>
        </div>
    </div>
</div>

<div id="About" class="tabcontent">
    <h3>Visit</h3>
    <div>
        <div class="row">
            <div class="col-md-12" style="margin-top:10px;">
                <div class="panel panel-default">

                    <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;">

                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>

                                        <th>Sr.no</th>
                                        <th>Applied</th>
                                        <th>Expences</th>
                                        <th>Status</th>
                                        <th>Approval</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>


                                        <td>
                                            <button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Item"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete Item"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-3" style="margin-top:15px;"></div>


                </div>


            </div>
        </div>
    </div>
</div>




@stop


@section('js')

<script>
    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
    }

    document.getElementById("defaultOpen").click();
</script>

@stop
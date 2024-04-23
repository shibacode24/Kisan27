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
            color: black;
            display: none;
            padding: 0px 10px;
            height: 100%;
        }

        .nav nav-pills {
            background-color: green;
        }

        .buttons-pdf {
            background-color: green !important;
            color: #fff !important;
        }
        .datatable_new2 {
            width: 1090px !important;
        }
    </style>


    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">

                            <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                                <h6 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;"
                                    align="center"><span class=""></span> <strong>Dashboard</strong></h6>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="background-color:#FFFFFF !important;">

            <div class="panel panel-default">
                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0a0536; width:100%; font-size:14px;"
                    align="center">
                    <i class="fa fa-home"></i> Dashboard
                </h5>
                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">

                        <div class="col-md-2"></div>
                        <div class="col-md-2" style="margin-top:15px ;">
                            <div class="widget widget-item-icon" style="background-color: green; border-radius:5px;">
                                <div class="widget-item-left">
                                    <img src="logo/division.png">
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count shake "><span class="shivani">
                                            <?php
                                            $count = DB::table('sales_manager')->count();
                                            echo '<h3>' . $count . '</h3>';
                                            ?>
                                        </span>
                                    </div>

                                    <div class="widget-subtitle"><b>SM</b></div>
                                    <!-- <div><b>OT Appoinment</b></div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2" style="margin-top:15px ;">
                            <div class="widget widget-item-icon" style="background-color: green; border-radius:5px;">
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
                            <div class="widget widget-item-icon" style="background-color: green; border-radius:5px;">
                                <div class="widget-item-left">
                                    <img src="logo/division.png">
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
                            <div class="widget widget-item-icon" style="background-color: green; border-radius:5px;">
                                <div class="widget-item-left">
                                    <img src="logo/employees.png">
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

                    <!-- <form role="form" method="get" action="{{ route('dashboard-view') }}">
                                            <div class="col-md-12">
                                                <div class="col-md-4"></div>
                                                <div class="form-group" style="margin-top:-10px;">
                                                    <input type="hidden" id="role" name="role" value="{{ app('request')->input('role') }}"> -->

                    <!-- <div class="col-sm-2" style="margin-top: 15px;">
                                                        <div class="form-group ">
                                                            <label>State\UT<font color="#FF0000">*</font></label>
                                                            <select class="form-control select" data-live-search="true" name="state" id="state" required>
                                                                <option>Select State</option>
                                                                 @foreach ($states as $state)
    <option value="{{ $state->id }}">{{ $state->State_Name }}</option>
    @endforeach
                                                            </select>
                                                        </div>
                                                    </div> -->
                    <!-- <div class="col-sm-3" style="margin-top: 15px;">
                                                        <div class="form-group ">
                                                            <label>Employee<font color="#FF0000">*</font></label>
                                                            <select id="emp" name="user_id" class="form-control select" data-live-search="true" required="">
                                                                <option>Select Employees</option>
                                                                <option value="All">ALL</option>
                                                                @foreach ($emps as $emp)
    <option value="{{ $emp->id }}" role="sp" @if (app('request')->input('user_id') == $emp->id) {{ 'selected' }} @endif
                                                                    >{{ $emp->Name }}
                                                                </option>
    @endforeach

                                                                @foreach ($asms as $asm)
    <option value="{{ $asm->id }}" role="asm" @if (app('request')->input('user_id') == $asm->id) {{ 'selected' }} @endif
                                                                    >{{ $asm->Name }}
                                                                </option>
    @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div> -->

                    <!-- <div class="col-md-1" style="margin-top:4.2vh; ">

                                                    <div class="input-group" style="margin-top:0px; margin-bottom:30px;">

                                                        <button type="submit" class="btn btn-primary">
                                                            Submit </button>
                                                    </div>
                                                </div>


                                            </div>
                                    </div>


                                    </form> -->

                    <div class="container">

                    </div>
                    <div id="exTab1" class="container">
                        <ul class="nav nav-pills">
                            <li class="active tab_click" li_value="1">
                                <a href="#1a" data-toggle="tab">Tracking</a>
                            </li>
                            <li class="tab_click" li_value="2"><a href="#2a" data-toggle="tab">Document</a>
                            </li>
                            <li class="tab_click" li_value="3"><a href="#3a" data-toggle="tab">Leave</a>
                            </li>
                            <li class="tab_click" li_value="4"><a href="#4a" data-toggle="tab">Visit</a>
                            </li>
                            <li class="tab_click" li_value="5"><a href="#5a" data-toggle="tab">Attendance</a>
                            </li>
                        </ul>

                        <div class="tab-content clearfix">
                            <div class="tab-pane active" id="1a">
                                <h3>tracking</h3>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:5px;">

                                        <div class="panel panel-default">
                                            <div class="col-md-2"></div>
                                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                                <div class="form-group">
                                                    <form role="form" method="get">

                                                        {{-- <input type="text" name="id" > --}}
                                                        <input type="hidden" name="user_id"
                                                            value="{{ app('request')->input('user_id') }}">
                                                        <input type="hidden" name="role"
                                                            value="{{ app('request')->input('role') }}" class="role">
                                                        <div class="col-md-12">
                                                            <div class="form-group" style="margin-top:-10px;">
                                                                <div class="col-md-2" style="margin-top:15px;"></div>


                                                                {{-- <div class="col-sm-3" style="margin-top: 15px;">
                                                                <div class="form-group ">
                                                                    <label>Employee<font color="#FF0000">*</font></label>
                                                                    <select name="user_id" class="form-control select emp" data-live-search="true" required="">
                                                                        <option value="">Select Employees</option>
                                                                        <option value="All" @if (app('request')->input('user_id') == 'All')
                                                                            {{'selected'}}
                                                                            @endif>ALL
                                                                        </option>
                                                                        @foreach ($emps as $emp)
                                                                        <option value="{{$emp->id}}" role="sp" @if (app('request')->input('user_id') == $emp->id && app('request')->input('role') == 'sp')
                                                                            {{'selected'}}
                                                                            @endif
                                                                            >{{$emp->Name}} 
                                                                        </option>
                                                                        @endforeach

                                                                        @foreach ($asms as $asm)
                                                                        <option value="{{$asm->id}}" role="asm"  @if (app('request')->input('user_id') == $asm->id && app('request')->input('role') == 'asm')
                                                                            {{'selected'}}
                                                                            @endif
                                                                            >{{$asm->Name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div> --}}


                                                                <div class="col-sm-2" style="margin-top: 15px;">
                                                                    <div class="form-group ">
                                                                        <label>Select ASM<font color="#FF0000">*</font>
                                                                        </label>
                                                                        <select name="user_id" class="form-control select"
                                                                            data-live-search="true" required=""
                                                                            id="asm">
                                                                            <option value="">Select Employees
                                                                            </option>

                                                                            @foreach ($asms as $asm)
                                                                                <option value="{{ $asm->id }}"
                                                                                    @if (app('request')->input('asm_id') == $asm->id) {{ 'selected' }} @endif>
                                                                                    {{ $asm->Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-2"  style="margin-top: 15px;">
                                                                    <div class="form-group ">
                                                                        <label>Employee<font color="#FF0000">*</font>
                                                                        </label>
                                                                        <select class="form-control select"
                                                                            data-live-search="true" name="sp_id" required=""
                                                                            id="emp">
                                                                            <option value="">Select Employees
                                                                            </option>
                                                                            {{-- <option role="sp"
                                                                                @if (app('request')->input('user_id') == $emp->sp_id && app('request')->input('role') == 'sp') {{ 'selected' }} @endif>
                                                                            </option> --}}


                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2" style="margin-top:15px;">
                                                                    <label>From Date<font color="black">*</font></label>
                                                                    <input type="date" placeholder=" "
                                                                        class="form-control datePicker" name="from_date"
                                                                        value="{{ app('request')->input('from_date') }}">
                                                                </div>
                                                                <div class="col-md-2" style="margin-top:15px;">
                                                                    <label>To Date<font color="black">*</font></label>
                                                                    <input type="date" placeholder=" "
                                                                        class="form-control datePicker" name="to_date"
                                                                        value="{{ app('request')->input('to_date') }}">
                                                                </div>


                                                                <div class="col-md-2" style="margin-top:4.7vh;"
                                                                    align="left">

                                                                    <div class="input-group" style=" margin-bottom:15px;">

                                                                        <button formaction="{{ route('dashboard-view') }}"
                                                                            type="submit" class="btn btn-primary"><span
                                                                                class="fa fa-plus"></span> Submit </button>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-2" style="margin-top:4.7vh;"
                                                                    align="left">

                                                                    <div class="input-group" style=" margin-bottom:15px;">


                                                                        {{-- <button formaction="{{ route('pdf_tracking') }}"
                                                                            type="download" class="btn btn-primary">
                                                                            Download PDF</button> --}}

                                                                    </div>
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </form>





                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;color:black;">

                                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                        <table class="table datatable_new2">
                                            <thead>
                                                <tr>

                                                    <th>Sr.no</th>
                                                    <th>Employee Name</th>
                                                    <!-- <th>Role</th> -->
                                                    <th>Date/Time</th>
                                                    <!-- <th>Latitude</th>
                                                                    <th>Longitude</th> -->
                                                    <th>Distance</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tt as $trackings)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $trackings->Name ?? '' }}</td>

                                                        <!-- <td>{{ $trackings->role }}</td> -->
                                                        <td>{{ date('d-m-Y H:i a',strtotime($trackings->created_at)) }}</td>
                                                        <td>{{ $trackings->distance }}</td>
                                                        <!-- <td>{{ $trackings->latitude }}</td>
                                                                    <td>{{ $trackings->longitude }}</td> -->


                                                        <td>
                                                            <a onclick="return confirm('Are You Sure To Delete This?')"
                                                                href="{{ route('destroy-tracking', $trackings->id) }}">
                                                                <button
                                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                    type="button" class="btn btn-info"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete Item"><i class="fa fa-trash-o"
                                                                        style="margin-left:5px;"></i></button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane" id="2a">
                                <h3>Document</h3>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <div class="panel panel-default">

                                            <div class="panel panel-default">
                                                <div class="col-md-2"></div>
                                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                                    <div class="form-group">
                                                        <form role="form" method="get" action="">
                                                            <!-- <input type="hidden" name="user_id" value="{{ app('request')->input('user_id') }}"> -->
                                                            <input type="hidden" name="role"
                                                                value="{{ app('request')->input('role') }}"
                                                                class="role1">


                                                            <div class="col-sm-3" style="margin-top: 15px;">
                                                                <div class="form-group ">
                                                                    <label>Employee<font color="#FF0000">*</font></label>
                                                                    <select name="user_id" class="form-control select emp emp_by_role AllDropdown"
                                                                        data-live-search="true" required="">
                                                                        <option>Select Employees</option>
                                                                        <option value="All"
                                                                            @if (app('request')->input('All') == $emp->All) {{ 'selected' }} @endif>
                                                                            ALL
                                                                        </option>
                                                                        @foreach ($emps as $emp)
                                                                            <option value="{{ $emp->id }}"
                                                                                role="sp"
                                                                                @if (app('request')->input('user_id') == $emp->id) {{ 'selected' }} @endif>
                                                                                {{ $emp->Name }}
                                                                            </option>
                                                                        @endforeach

                                                                        @foreach ($asms as $asm)
                                                                            <option value="{{ $asm->id }}"
                                                                                role="asm"
                                                                                @if (app('request')->input('user_id') == $asm->id) {{ 'selected' }} @endif>
                                                                                {{ $asm->Name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2 roleDiv" style="margin-top: 15px;">
                                                                <div class="form-group ">
                                                                    <label>Select Role<font color="#FF0000">*</font>
                                                                    </label>
                                                                    <select name="role2"
                                                                        class="form-control select " 
                                                                        data-live-search="true" required="">
                                                                        <option disabled selected>Select Role</option>
                                                                        <option value="asm" @if (app('request')->input("asm") == "asm") {{ 'selected' }} @endif>ASM</option>
                                                                        <option value="sp" @if (app('request')->input("sp") == "sp") {{ 'selected' }} @endif>SP</option>
                                                                       
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1" style="margin-top:4.7vh; ">

                                                                <div class="input-group"
                                                                    style="margin-top:0px; margin-bottom:30px;">

                                                                    <button formaction="{{ route('dashboard-view') }}"
                                                                        type="submit" class="btn btn-primary">
                                                                        Submit </button>
                                                                </div>
                                                            </div>

                                                            <div class="input-group" style=" margin-bottom:10px;">


                                                                {{-- <button formaction="{{ route('pdf_document') }}"
                                                                    type="download" class="btn btn-primary"
                                                                    style="margin-top: 30px;">
                                                                    Download PDF</button> --}}

                                                            </div>

                                                        </form>
                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;">

                                                <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;">
                                                    <table class="table datatable_new2">
                                                        <thead>
                                                            <tr>

                                                                <th>Sr.no</th>
                                                                <th>Employee Name</th>
                                                                <th>Document Type</th>

                                                                <th>Status</th>

                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($document as $documents)
                                                                <tr>
                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                    <td>{{ $documents->Name ?? '' }}</td>
                                                                    <td>{{ $documents->document }}</td>
                                                                    <td> <a href="{{ url('/update_document', $documents->id) }}"
                                                                            class="switch">
                                                                            <label class="switch label_change"
                                                                                id="{{ $documents->id }}"
                                                                                @if ($documents->status == 'active') checked value="inactive" @else value="active" @endif>
                                                                                <input type="checkbox"
                                                                                    @if ($documents->status == 'active') checked @endif>
                                                                                <span class="slider round"></span>
                                                                            </label>
                                                                        </a></td>


                                                                    <td>
                                                                        <a onclick="return confirm('Are You Sure To Delete This?')"
                                                                            href="{{ route('destroy-document', $documents->id) }}">
                                                                            <button
                                                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                                type="button" class="btn btn-info"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Delete Item"><i
                                                                                    class="fa fa-trash-o"
                                                                                    style="margin-left:5px;"></i></button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-3" style="margin-top:15px;"></div>


                                        </div>


                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane" id="3a">
                                <h3>Leave</h3>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:5px;">

                                        <div class="panel panel-default">
                                            <div class="col-md-2"></div>
                                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                                <div class="form-group">
                                                    <form role="form" method="get" action="{{ route('leave') }}">
                                                        <!-- <input type="hidden" name="user_id" value="{{ app('request')->input('user_id') }}"> -->
                                                        <input type="hidden" name="role"
                                                            value="{{ app('request')->input('role') }}" class="role1">
                                                        <div class="col-sm-3" style="margin-top: 15px;">
                                                            <div class="form-group ">
                                                                <label>Employee<font color="#FF0000">*</font></label>
                                                                <select name="user_id" class="form-control select emp emp_by_role AllDropdown"
                                                                    data-live-search="true" required="">
                                                                    <option>Select Employees</option>
                                                                    <option value="All"
                                                                    @if (app('request')->input('All') == $emp->All) {{ 'selected' }} @endif>
                                                                    ALL</option>
                                                                    @foreach ($emps as $emp)
                                                                        <option value="{{ $emp->id }}"
                                                                            @if (app('request')->input('user_id') == $emp->id) {{ 'selected' }} @endif>
                                                                            {{ $emp->Name }}
                                                                        </option>
                                                                    @endforeach

                                                                    @foreach ($asms as $asm)
                                                                        <option value="{{ $asm->id }}"
                                                                            role="asm"
                                                                            @if (app('request')->input('user_id') == $asm->id) {{ 'selected' }} @endif>
                                                                            {{ $asm->Name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 roleDiv" style="margin-top: 15px;">
                                                            <div class="form-group ">
                                                                <label>Select Role<font color="#FF0000">*</font>
                                                                </label>
                                                                <select name="role2"
                                                                    class="form-control select " 
                                                                    data-live-search="true" required="">
                                                                    <option disabled selected>Select Role</option>
                                                                    <option value="asm" @if (app('request')->input("asm") == "asm") {{ 'selected' }} @endif>ASM</option>
                                                                    <option value="sp" @if (app('request')->input("sp") == "sp") {{ 'selected' }} @endif>SP</option>
                                                                   
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1" style="margin-top:4.7vh; ">

                                                            <div class="input-group"
                                                                style="margin-top:0px; margin-bottom:30px;">

                                                                <button formaction="{{ route('dashboard-view') }}"
                                                                    type="submit" class="btn btn-primary">
                                                                    Submit </button>
                                                            </div>
                                                        </div>
                                                        {{-- <button formaction="{{ route('pdf_leave') }}" type="download"
                                                            class="btn btn-primary" style="margin-top: 30px;">
                                                            Download PDF</button> --}}
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <div class="panel panel-default">

                                                <div class="col-md-12"
                                                    style="margin-top:15px; overflow-y: scroll;color:black;">

                                                    <div class="panel-body"
                                                        style="margin-top:-10px; margin-bottom:-15px;">
                                                        <table class="table datatable_new2">
                                                            <thead>
                                                                <tr>

                                                                    <th>Sr.no</th>
                                                                    <th>Employee Name</th>
                                                                    <th>Leave Type</th>
                                                                    <th>From Date</th>
                                                                    <th>To Date</th>
                                                                    <th>Reason</th>
                                                                    <th>Status</th>

                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($leaves as $leave)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $leave->Name ?? '' }}</td>
                                                                        <td>{{ $leave->leave_type }}</td>
                                                                        <td>{{date('d-m-Y',strtotime($leave->from_date)) }}</td>
                                                                        <td>{{date('d-m-Y',strtotime($leave->to_date)) }}</td>
                                                                        <td>{{ $leave->reason }}</td>
                                                                        <td>
                                                                            <a href="{{ url('/update_leave', $leave->id) }}"
                                                                                class="switch">
                                                                                <label class="switch label_change1"
                                                                                    id="{{ $leave->id }}"
                                                                                    @if ($leave->status == 'active') checked value1="inactive" @else value1="active" @endif>
                                                                                    <input type="checkbox"
                                                                                        @if ($leave->status == 'active') checked @endif>
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </a>
                                                                        </td>


                                                                        <td>
                                                                            <a onclick="return confirm('Are You Sure To Delete This?')"
                                                                                href="{{ route('destroy-leave', $leave->id) }}">
                                                                                <button
                                                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                                    type="button" class="btn btn-info"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Delete Item"><i
                                                                                        class="fa fa-trash-o"
                                                                                        style="margin-left:5px;"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

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

                            <div class="tab-pane" id="4a">
                                <h3>Visit</h3>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:5px;">

                                        <div class="panel panel-default">
                                            <div class="col-md-2"></div>
                                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                                <div class="form-group">
                                                    <form role="form" method="get" action="">
                                                        <!-- <input type="hidden" name="user_id" value="{{ app('request')->input('user_id') }}"> -->
                                                        <input type="hidden" name="role"
                                                            value="{{ app('request')->input('role') }}" class="role1">
                                                        <div class="col-md-12">
                                                            <div class="form-group" style="margin-top:-10px;">
                                                                {{-- <div class="col-md-3" style="margin-top:15px;"></div> --}}

                                                                <div class="col-sm-3" style="margin-top: 15px;">
                                                                    <div class="form-group ">
                                                                        <label>Employee<font color="#FF0000">*</font>
                                                                        </label>
                                                                        <select name="user_id"
                                                                            class="form-control select emp emp_by_role AllDropdown"
                                                                            data-live-search="true" required="">
                                                                            <option>Select Employees</option>
                                                                            <option value="All"
                                                                                @if (app('request')->input('All') == $emp->All) {{ 'selected' }} @endif>
                                                                                ALL</option>
                                                                            @foreach ($emps as $emp)
                                                                                <option value="{{ $emp->id }}"
                                                                                    role="sp"
                                                                                    @if (app('request')->input('user_id') == $emp->id) {{ 'selected' }} @endif>
                                                                                    {{ $emp->Name }}
                                                                                </option>
                                                                            @endforeach

                                                                            @foreach ($asms as $asm)
                                                                                <option value="{{ $asm->id }}"
                                                                                    role="asm"
                                                                                    @if (app('request')->input('user_id') == $asm->id) {{ 'selected' }} @endif>
                                                                                    {{ $asm->Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-sm-2 roleDiv" style="margin-top: 15px;">
                                                                    <div class="form-group ">
                                                                        <label>Select Role<font color="#FF0000">*</font>
                                                                        </label>
                                                                        <select name="role2"
                                                                            class="form-control select " 
                                                                            data-live-search="true" required="">
                                                                            <option disabled selected>Select Role</option>
                                                                            <option value="asm" @if (app('request')->input("asm") == "asm") {{ 'selected' }} @endif>ASM</option>
                                                                            <option value="sp" @if (app('request')->input("sp") == "sp") {{ 'selected' }} @endif>SP</option>
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2" style="margin-top:15px;">
                                                                    <label>From Date<font color="black">*</font></label>
                                                                    <input type="date" placeholder=" "
                                                                        class="form-control datePicker" name="from_date"
                                                                        value="{{ app('request')->input('from_date') }}">
                                                                </div>
                                                                <div class="col-md-2" style="margin-top:15px;">
                                                                    <label>To Date<font color="black">*</font></label>
                                                                    <input type="date" placeholder=" "
                                                                        class="form-control datePicker" name="to_date"
                                                                        value="{{ app('request')->input('to_date') }}">
                                                                </div>

                                                             

                                                                <div class="col-md-2" style="margin-top:4.7vh;"
                                                                    align="left">

                                                                    <div class="input-group" style=" margin-bottom:15px;">

                                                                        <button formaction="{{ route('dashboard-view') }}"
                                                                            type="submit" class="btn btn-primary"><span
                                                                                class="fa fa-plus"></span> Submit </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="col-md-2" style="margin-top:2.4vh;" align="left">

                                                                                <div class="input-group" style=" margin-bottom:15px;">

                                                                                    <button type="download" class="btn btn-secondary">
                                                                                        Download </button>

                                                                                </div>
                                                                            </div> -->

                                                            {{-- <button formaction="{{ route('pdf_visit') }}" type="download"
                                                                class="btn btn-primary">
                                                                Download PDF</button> --}}

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <div class="panel panel-default">

                                                <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;">

                                                    <div class="panel-body"
                                                        style="margin-top:-10px; margin-bottom:-15px;">
                                                        <table class="table datatable_new2">

                                                            <thead>
                                                                <tr>

                                                                    <th>Sr.no</th>
                                                                    <th>Employee Name</th>
                                                                    <th>Name</th>
                                                                    <th>Visit Details</th>
                                                                    <th>Images</th>
                                                                    <th>Date</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($visits as $visit)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $visit->Name ?? '' }}</td>
                                                                        <td>{{ $visit->name }}</td>
                                                                        <td>{{ $visit->visitdetails }}</td>
                                                                        <td>
                                                                         <a href="{{asset('public/images/get_photo/'.$visit->image)}}" target="_blank">  <img src="{{asset('images/get_photo/'.$visit->image)}}" style="height: 50px;width:50px;" ?? ""></a>
                                                                            
                                                                        </td>
                                                                        <td>{{ date('d-m-Y',strtotime($visit->created_at)) }}</td>

                                                                        <td>
                                                                            <a onclick="return confirm('Are You Sure To Delete This?')"
                                                                                href="{{ route('destroy-visit', $visit->id) }}">
                                                                                <button
                                                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                                    type="button" class="btn btn-info"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Delete Item"><i
                                                                                        class="fa fa-trash-o"
                                                                                        style="margin-left:5px;"></i></button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

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

                            <div class="tab-pane" id="5a">
                                <h3>Attendace</h3>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:5px;">

                                        <div class="panel panel-default">
                                            <div class="col-md-2"></div>
                                            <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                                                <div class="form-group">
                                                    <form role="form" method="get" action="">
                                                        <!-- <input type="hidden" name="user_id" value="{{ app('request')->input('user_id') }}"> -->
                                                        <input type="hidden" name="role"
                                                            value="{{ app('request')->input('role') }}" class="role1">
                                                        <div class="col-md-12">
                                                            <div class="form-group" style="margin-top:-10px;">
                                                                {{-- <div class="col-md-3" style="margin-top:15px;"></div> --}}

                                                                <div class="col-sm-2" style="margin-top: 15px;">
                                                                    <div class="form-group ">
                                                                        <label>Employee<font color="#FF0000">*</font>
                                                                        </label>
                                                                        <select name="user_id"
                                                                            class="form-control select AllDropdown emp_by_role" 
                                                                            data-live-search="true" required="">
                                                                            <option  value="" selected>Select Employees</option>
                                                                            <option value="All">
                                                                                ALL</option>
                                                                                {{-- @if (app('request')->input('All') == $emp->All) {{ 'selected' }} @endif --}}
                                                                            @foreach ($emps as $emp)
                                                                                <option value="{{ $emp->id }}"
                                                                                    role="sp"
                                                                                    @if (app('request')->input('user_id') == $emp->id) {{ 'selected' }} @endif>
                                                                                    {{ $emp->Name }}
                                                                                </option>
                                                                            @endforeach

                                                                            @foreach ($asms as $asm)
                                                                                <option value="{{ $asm->id }}"
                                                                                    role="asm"
                                                                                    @if (app('request')->input('user_id') == $asm->id) {{ 'selected' }} @endif>
                                                                                    {{ $asm->Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-sm-2 roleDiv"  
                                                                 style="margin-top: 15px;">
                                                                    <div class="form-group ">
                                                                        <label>Select Role<font color="#FF0000">*</font>
                                                                        </label>
                                                                        <select name="role2"
                                                                            class="form-control select " 
                                                                            data-live-search="true" required="">
                                                                            <option disabled selected>Select Role</option>
                                                                            <option value="asm" >ASM</option>
                                                                            <option value="sp">SP</option>
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2" style="margin-top:15px;">
                                                                    <label>From Date<font color="black">*</font></label>
                                                                    <input type="date" placeholder=" "
                                                                        class="form-control datePicker" name="from_date"
                                                                        value="{{ app('request')->input('from_date') }}">
                                                                </div>
                                                                <div class="col-md-2" style="margin-top:15px;">
                                                                    <label>To Date<font color="black">*</font></label>
                                                                    <input type="date" placeholder=" "
                                                                        class="form-control datePicker" name="to_date"
                                                                        value="{{ app('request')->input('to_date') }}">
                                                                </div>


                                                                <div class="col-md-2" style="margin-top:4.7vh;"
                                                                    align="left">

                                                                    <div class="input-group" style=" margin-bottom:15px;">

                                                                        <button formaction="{{ route('dashboard-view') }}"
                                                                            type="submit" id="submitButton" class="btn btn-primary"><span
                                                                                class="fa fa-plus"></span> Submit </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="col-md-2" style="margin-top:2.4vh;" align="left">

                                                                                <div class="input-group" style=" margin-bottom:15px;">

                                                                                    <button type="download" class="btn btn-secondary">
                                                                                        Download </button>

                                                                                </div>
                                                                            </div> -->

                                                            {{-- <button formaction="{{ route('pdf_visit') }}" type="download"
                                                                class="btn btn-primary">
                                                                Download PDF</button> --}}

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <div class="panel panel-default">

                                                <div class="col-md-12" style="margin-top:15px; overflow-y: scroll;">

                                                    <div class="panel-body"
                                                        style="margin-top:-10px; margin-bottom:-15px;">
                                                        <table class="table datatable_new2">

                                                            <thead>
                                                                <tr>

                                                                    <th>Sr.no</th>
                                                                    <th>Employee Name</th>
                                                                    <th>Contact No</th>
                                                                    <th>Role</th>
                                                                    <th>Time</th>
                                                                    <th>Date</th>
                                                                    <th>IN/OUT</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($attendance as $attendances)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $attendances->Name ?? ''}}</td>
                                                                        <td>{{ $attendances->Mobile_Number ??'' }}</td>
                                                                        <td>{{ $attendances->role }}</td>
                                                                        <td>{{ $attendances->time }}</td>
                                                                        <td>{{ date('d-m-Y',strtotime($attendances->date)) }}</td>
                                                                        <td>{{ $attendances->in_out }}</td>

                                                                        <td>
                                                                            <a onclick="return confirm('Are You Sure To Delete This?')"
                                                                                href="{{ route('destroy-attendance', $attendances->id) }}">
                                                                                <button
                                                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                                    type="button" class="btn btn-info"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Delete Item"><i
                                                                                        class="fa fa-trash-o"
                                                                                        style="margin-left:5px;"></i></button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

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

                        </div>
                    </div>
                </div>

            @stop

            @section('js')

                <script>
                    $(document).ready(function() {


                        $('.datatable_new').DataTable({
                            "pageLength": 100

                        });
                        new DataTable('.datatable_new2', {
                            layout: {
                                topStart: {
                                    buttons: ['excel', 'pdf']
                                }
                            }
                        });
                          // $('#datatable1').DataTable({
                        //     "pageLength": 100

                        // });

                        // $('#datatable2').DataTable({
                        //     "pageLength": 100

                        // });

                        // $('#datatable3').DataTable({
                        //     "pageLength": 100

                        // });

                        $(document).ready(function() {
    // Hide #roleDiv initially
    // $('#roleDiv').hide();

    // Show/hide #roleDiv based on .AllDropdown value change
    $('.AllDropdown').change(function () {
        if ($(this).val() === 'All') {
            $('.roleDiv').show(); // Show the roleDiv
        } else {
            $('.roleDiv').hide(); // Hide the roleDiv
        }
    });

    // Click event handler for the submit button
    $('#submitButton').click(function() {
        var selectedValue = $('.AllDropdown').val();
        if (selectedValue === 'All') {
            $('.roleDiv').show(); // Show the roleDiv if the value is "All"
        } else {
            $('.roleDiv').hide(); // Hide the roleDiv otherwise
        }
        // Add your code to submit the form or perform other actions here
    });
});


                        $(document).on("click", ".label_change", function() {
                            $.ajax({
                                url: "{{ route('update_document') }}",
                                data: {
                                    status: $(this).attr('value'),
                                    id: $(this).attr('id')
                                },
                                success: function(result) {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 200);
                                }
                            });

                        })
                    })



                    $(document).on("click", ".label_change1", function() {
                        $.ajax({
                            url: "{{ route('update_leave') }}",
                            data: {
                                status: $(this).attr('value1'),
                                id: $(this).attr('id')
                            },
                            success: function(result) {
                                setTimeout(function() {
                                    location.reload();
                                }, 200);
                            }
                        });

                    })

                    $(document).on("change", "#emp", function() {
                        $(".role").val($("option:selected", this).attr('role'))
                        // console.log(val($("option:selected", this).attr('role')));
                    })


                    $(document).on("change", ".emp_by_role", function() {
                        $(".role1").val($("option:selected", this).attr('role'));
                        // console.log($("option:selected", this).attr('role'));
                    })

                    $(document).on("change", "#asm", function() {
                        $.ajax({
                            url: "{{ route('get_emp_by_id') }}",
                            data: {
                                id: $(this).val(),
                            },
                            success: function(result) {
                                $("#emp").empty();
                                console.log();
                                $("#emp").append('<option value="">Select Employee</option>');
                                $.each(result, function(a, b) {
                                    $("#emp").append('<option role="' + b.Role + '" value="' + b.id + '">' +
                                        b.Name +
                                        '</option>');

                                })
                                console.log(result);

                                $("#emp").selectpicker('refresh');
                            }
                        });
                    })
                </script>
                <script>
                    $(document).ready(function() {
                        // Event listener for clicking on tabs
                        $(".tab_click").click(function() {
                            // Get the value of li_value attribute
                            var liValue = $(this).attr("li_value");

                            // Store the value in local storage
                            localStorage.setItem("selectedTab", liValue);
                        });

                        // Check if there's a selected tab stored in local storage
                        var selectedTab = localStorage.getItem("selectedTab");

                        // If there's a selected tab, make it active
                        if (selectedTab) {
                            $(".tab_click[li_value='" + selectedTab + "'] a").click();

                        }
                    });
                </script>
            @stop

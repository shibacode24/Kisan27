@extends('layout')

@section('content')

<div class="page-content-wrap">
    @include('masterheader')

    <div class="row">
        <div class="col-md-12" style="margin-top:-15px;">

            <div class="panel panel-default">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;Area Master </h5>
                </div>
                <div class="col-md-2"></div>

                <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                    <div class="form-group">
                        <form role="form" method="POST" action="{{route('create-area_master')}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top:-10px;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Area<font color="#FF0000">*</font></label>
                                        <input type="text" placeholder=" " name="area"  value="" class="form-control" required />
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>City<font color="#FF0000">*</font></label>
                                        <select class="form-control select" name="city"  value="" data-live-search="true">
                                        @foreach ($citys as $city)
                                                  <option value="{{$city->id}}">{{$city->City}}</option>
                                           @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>State<font color="#FF0000">*</font></label>
                                        <select class="form-control select" name="state" value="" data-live-search="true">
                                        @foreach ($states as $state)
                                                  <option value="{{$state->id}}">{{$state->State_Name}}</option>
                                           @endforeach
                                        </select>
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

                                            <button type="submit" name="areamaster" value="areamaster" class="btn btn-primary"><span class="fa fa-plus"></span> Add </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-2"></div> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div>
            <div>
                <!-- END DEFAULT DATATABLE -->
                <!-- <div class="col-md-2"></div> -->
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> Added Area </h5>

                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr.no.</th>
                                            <th>Area</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($areamasters as $areamaster)
                                        <tr>
                                            <th>{{$loop->index+1}}</th>
                                            <td>{{$areamaster->area}}</td>
                                            <td>{{$areamaster->City}}</td>
                                            <td>{{$areamaster->State_Name}}</td>
                                            <td>
                                                <a href="{{route('edit-area_master',$areamaster->id)}}"><button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                </a>
                                                <a onclick="return confirm('Are You Sure To Delete This?')" href="{{route('destroy-area_master',$areamaster->id)}}">
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
                    <div class="col-md-2"></div>
                </div>


            </div>
        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
@stop
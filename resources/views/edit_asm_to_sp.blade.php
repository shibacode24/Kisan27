@extends('layout')

@section('content')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12" align="center" style="margin-top:-12px;">
                            <h5 style="color:#000; background-color:#FFCC00; width:15%; min-height:25px; padding-top:5px;" align="center"><span class="fa fa-user"></span> <strong>Assign Dashboard</strong></h5>
                        </div>


                        <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                            <!-- <a href="{{route('area_master-index')}}"><button type="button" class="btn active" style="background-color:#0f903f; color:#FFFFFF"><i class="fa fa-list"></i>Area Master</button></a> -->
                            <a href="{{route('assign_team-index')}}"><button type="button" class="btn active" style="background-color:#0f903f; color:#FFFFFF"><i class="fa fa-list"></i>SM To Region</button></a>
                            <a href="{{route('sm_to_asm-index')}}"> <button type="button" class="btn active" style="background-color:#0f903f; color:#FFFFFF"><i class="fa fa-list"></i>SM To ASM </button></a>
                            <a href="{{route('asm_to_sp-index')}}"><button type="button" class="btn active" style="background-color:#0f903f; color:#FFFFFF"><i class="fa fa-list"></i>ASM to SP/JTM/TM/SO/STM</button></a>
                            <!-- <a href="{{route('city-index')}}"> <button type="button" class="btn active" style="background-color:#0f903f; color:#FFFFFF"><i class="fa fa-list"></i>City</button></a>
                        <a href="{{route('region-index')}}"> <button type="button" class="btn active" style="background-color:#0f903f; color:#FFFFFF"><i class="fa fa-list"></i>Region</button></a>
                        <a href="{{route('role_master-index')}}"> <button type="button" class="btn active" style="background-color:#0f903f; color:#FFFFFF"><i class="fa fa-list"></i>Role</button></a> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top:-15px;">

                    <div class="panel panel-default">

                    @include('alert')
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i> &nbsp;ASM To SP/JTM/TM/SO/STM </h5>

                        </div>
                        <div class="col-md-2"></div>

                        <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                            <div class="form-group">
                                <form role="form" method="POST" action="{{route('update-asm_to_sp')}}">
                                    @csrf
									 <input type="hidden" placeholder=" " name="id" value="{{$asm_to_sp_edit->id}}" class="form-control" required />
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top:-10px;">
                                            <div class="col-md-3" style="margin-top:15px;"></div>

                                            <!-- 
                                                <div class="col-md-4" style="margin-top:15px;">
                                                      <label>Select Customer Type<font color="#FF0000">*</font></label>              
                                                    <select class="form-control select">
                                                        <option>Person</option>
                                                        <option>Hotel</option>
                                                    </select>
                                                </div> -->

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Select ASM<font color="#FF0000">*</font></label>
                                                <select class="form-control select" data-live-search="true" name="asm">
                                                    <option value="">Select</option>
                                                    @foreach ($asm as $asm)
                                                    <option value="{{$asm->id}}" @if($asm_to_sp_edit->asm_id==$asm->id) selected @endif>{{$asm->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                           

                                            @php

                                            $explode_sp= explode(',',$asm_to_sp_edit->sp_id);

                                            @endphp

                                            <div class="col-md-2" style="margin-top:15px;">
                                                <label>Select SP<font color="#FF0000">*</font></label>
                                                <select class="form-control select " data-live-search="true" name="sp[]" multiple="">
                                                    <option value="">Select</option>
                                                    @foreach ($sp as $sp)
                                                    <option value="{{$sp->id}}" @if(in_array($sp->id,$explode_sp))
                                                        selected @endif>{{$sp->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            <div class="col-md-2" style="margin-top:5.4vh;" align="left">

                                                <div class="input-group" style=" margin-bottom:15px;">

                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> Update </button>
                                                </div>
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
                        <div class="col-md-2"></div>
                        <div class="col-md-8">

                            <div class="panel panel-default">
                                <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;" align="center"><i class="fa fa-edit"></i>&nbsp;ASM To SP/JTM/TM/SO/STM</h5>

                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <!-- <th>Name of SM</th> -->
                                                <th>Name of ASM</th>
                                                <th>Name of SP</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($asm_to_sp as $asm_to_sp)
                                            <tr>
                                                <th>{{$loop->index+1}}</th>
                                                <!-- <td>{{$asm_to_sp->sm_name}}</td>  -->
                                                <td>{{$asm_to_sp->asm_name}}</td>
                                                <td>
                                                    @php

                                                    $a = explode(',', $asm_to_sp->sp_id);
                                                    $i=0;
                                                    $total_record=count($a);
                                                    @endphp
                                                    @foreach($a as $id)

                                                    @php
                                                    $i++;
                                                    $sp=App\Models\SalePerson::where('id',$id)->select('Name')->first();

                                                    echo $sp['Name'] ?? '';
                                                    echo $i!=$total_record ? ',' : '';

                                                    @endphp

                                                    @endforeach
                                                </td>



                                                <td>
                                                    <a href="{{route('edit-asm_to_sp',$asm_to_sp->id)}}"><button style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit "><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                    </a>
                                                    <a onclick="return confirm('Are You Sure To Delete This?')" href="{{route('delete-asm_to_sp',$asm_to_sp->id)}}"">
                                                        <button style=" background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete "><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
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
        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@stop
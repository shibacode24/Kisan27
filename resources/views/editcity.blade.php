@extends('layout')

@section('content')



    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        @include('masterheader')



        <div class="row">
            <div class="col-md-12" style="margin-top:-15px;">

                <div class="panel panel-default">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h5 class="panel-title" style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;"
                            align="center"><i class="fa fa-edit"></i> &nbsp;City </h5>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                        <div class="form-group">
                            <form role="form" method="POST" action="{{ route('update-city') }}">
                                @csrf
                                <input type="hidden" placeholder=" " name="id" value="{{ $city_edit->id }}"
                                    class="form-control" required />
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top:-10px;">
                                        <div class="col-md-1" style="margin-top:15px;"></div>

                                        <div class="col-md-2" style="margin-top:15px;">
                                            <label>State<font color="#FF0000">*</font></label>
                                            <select class="form-control select" name="state" value=""
                                                data-live-search="true" id="state">
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" >{{ $state->State_Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2" style="margin-top:15px;">
                                            <label>District<font color="#FF0000">*</font></label>
                                            <select class="form-control select" name="distric" value=""
                                                data-live-search="true" id="district">
                                                @foreach ($districs as $distric)
                                                    <option value="{{ $distric->id }}">{{ $distric->District }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2" style="margin-top:15px;">
                                            <label>Tehsil<font color="#FF0000">*</font></label>
                                            <select class="form-control select" name="tehsil" id="tehsil"
                                                data-live-search="true">
                                                @foreach ($tehsils as $tehsil)
                                                    <option value="{{ $tehsil->id }}">{{ $tehsil->Tehsil }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2" style="margin-top:15px;">
                                            <label>City<font color="#FF0000">*</font></label>
                                            <input type="text" placeholder=" " name="city_name"
                                                value="{{ $city_edit->City }}" class="form-control" id="city"
                                                required />
                                        </div>

                                        <div class="col-md-2" style="margin-top:5vh;">

                                            <div class="input-group" style=" margin-bottom:15px;">

                                                <button type="submit" name="city" value="City"
                                                    class="btn btn-primary"><span class="fa fa-plus"></span> Update
                                                </button>
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
                    <!-- <div class="col-md-3"></div> -->
                    <div class="row">
                        <div class="col-md-1"></div>

                        <div class="col-md-10">
                            <div class="panel panel-default">
                                <h5 class="panel-title"
                                    style="color:#FFFFFF; background-color:#0f903f; width:100%; font-size:14px;"
                                    align="center"><i class="fa fa-edit"></i> City </h5>

                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <th>State</th>
                                                <th>District</th>
                                                <th>Tehsil</th>
                                                <th>City</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($citys as $city)
                                                <tr>
                                                    <th>{{ $loop->index + 1 }}</th>
                                                    <td>{{ $city->State_Name }}</td>
                                                    <td>{{ $city->District }}</td>
                                                    <td>{{ $city->Tehsil }}</td>
                                                    <td>{{ $city->City }}</td>
                                                    <td>
                                                        <a href="{{ route('edit-city', $city->id) }}"><button
                                                                style="background-color:#0066cc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                                data-placement="top" title="Edit "><i class="fa fa-edit"
                                                                    style="margin-left:5px;"></i></button>
                                                        </a>
                                                        <a onclick="return confirm('Are You Sure To Delete This?')"
                                                            href="{{ route('destroy-city', $city->id) }}">
                                                            <button
                                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                                data-placement="top" title="Delete "><i
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


                        </div>
                        <div class="col-md-1"></div>
                    </div>


                </div>
            </div>
            <!-- PAGE CONTENT WRAPPER -->
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {

            $(document).on("change", "#state", function() {
                $.ajax({
                    url: "{{ route('get_all_id') }}",
                    data: {
                        id: $(this).val(),
                    },
                    success: function(result) {
                        $("#district").empty();
                        $.each(result['district'], function(a, b) {
                            $("#district").append('<option value="' + b.id + '">' + b
                                .District + '</option>');
                        })
                        $("#district").selectpicker('refresh');



                        $("#tehsil").empty();
                        $.each(result['tehsil'], function(a, b) {
                            $("#tehsil").append('<option value="' + b.id + '">' + b
                                .Tehsil + '</option>');
                        })
                        $("#tehsil").selectpicker('refresh');


                    }
                });
            })





            $(document).on("change", "#district", function() {
                $.ajax({
                    url: "{{ route('get_tehsil_by_id') }}",
                    data: {
                        id: $(this).val(),
                    },
                    success: function(result) {
                        $("#tehsil").empty();
                        $.each(result, function(a, b) {
                            $("#tehsil").append('<option value="' + b.id + '">' + b
                                .Tehsil + '</option>');
                        })
                        $("#tehsil").selectpicker('refresh');
                    }
                });
            })

            $(document).on("change", "#tehsil", function() {
                $.ajax({
                    url: "{{ route('get_city_by_id') }}",
                    data: {
                        id: $(this).val(),
                    },
                    success: function(result) {
                        $("#city").empty();
                        $.each(result, function(a, b) {
                            $("#city").append('<option value="' + b.id + '">' + b.City +
                                '</option>');
                        })
                        $("#city").selectpicker('refresh');
                    }
                });
            })

        })
    </script>
@stop

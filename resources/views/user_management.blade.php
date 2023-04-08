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


                         <!-- <div class="col-md-12" style="margin-bottom:-5px;" align="center">
                        <a href="area_master.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-edit"></i>Area Master</button></a>
                        <a href="role_master.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-users"></i>Role</button></a>
                        <a href="state.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>State</button></a>
                        <a href="district.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>District</button></a>
                        <a href="tehsil.html"><button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>Tehsil</button></a>
                        <a href="city.html"> <button type="button" class="btn active" style="background-color:#006699; color:#FFFFFF"><i class="fa fa-list"></i>City</button></a>

                    </div> -->
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="row">
         <div class="col-md-12" style="margin-top:-15px;">
             <!-- START DEFAULT DATATABLE -->
             <div class="panel panel-default">

                 <h5 class="panel-title" style="color:#FFFFFF; background-color:#A43F3E; width:100%; font-size:14px;" align="center"><i class="fa fa-user"></i> &nbsp;User Management</h5>

                 <div class="panel-body" style="margin-top:-10px; margin-bottom:-5px;">
                     <div class="form-group">



                         <form role="form" method="POST" action="">
                             @csrf
                             <div class="col-md-12">
                                 <div class="form-group" style="margin-top:-10px;">



                                     <div class="col-md-2" style="margin-top:15px;">
                                         <label>Username<font color="#FF0000">*</font></label>
                                         <input type="text" placeholder="Enter Username" name="name" class="form-control" required />
                                     </div>

                                     <div class="col-md-2" style="margin-top:15px;">
                                         <label>Password<font color="#FF0000">*</font></label>
                                         <input type="text" placeholder="Enter Password" name="password" class="form-control" required />
                                     </div>

                                     <div class="col-md-2" style="margin-top:15px;">
                                         <label>email<font color="#FF0000">*</font></label>
                                         <input type="email" placeholder="Enter email" name="email" class="form-control" required />
                                     </div>

                                     <div class="col-md-4" style="margin-top:30px;">
                                         <table>
                                             <tr>
                                                 <td style="padding-right:5px;">
                                                     <label class="check"><input type="checkbox" name="role" class="icheckbox" checked="checked" /> Master Settings</label>
                                                 </td>

                                                 <td style="padding-right:5px;">
                                                     <label class="check"><input type="checkbox" name="role" class="icheckbox" checked="checked" /> Telecaller Panel</label>
                                                 </td>

                                                 <td style="padding-right:5px;">
                                                     <label class="check"><input type="checkbox" name="role" class="icheckbox" checked="checked" /> Shop Panel</label>
                                                 </td>

                                                 <td style="padding-right:5px;">
                                                     <label class="check"><input type="checkbox" name="role" class="icheckbox" checked="checked" /> Reports</label>
                                                 </td>

                                             </tr>
                                         </table>
                                     </div>





                                     <div class="col-md-2" style="margin-top:3.1rem;" align="center">

                                         <div class="input-group" style="margin-top:-10px; margin-bottom:15px;">

                                             <button type="submit" name="user" value="User" class="btn btn-primary"><span class="fa fa-user"></span> Add User</button>

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









                 <div class="row">
                     <div class="col-md-12" style="margin-top:-15px;">


                         <div class="panel panel-default">

                             <h5 class="panel-title" style="color:#FFFFFF; background-color:#A43F3E; width:100%; font-size:14px;" align="center"><i class="fa fa-user"></i> Added Users</h5>


                             <div class="col-md-2" style="margin-top:15px;"></div>

                             <div class="col-md-8" style="margin-top:15px;">

                                 <div class="panel-body" style="margin-top:-10px; margin-bottom:-15px;" align="center">
                                     <table class="table datatable" align="center">
                                         <thead>
                                             <tr>
                                                 <th>Username</th>
                                                 <th>emails</th>
                                                 <th>Alloted Rights</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>Sharique</td>
                                                 <td>Sharique.aspect@gmail.com</td>
                                                 <td>Master/ Telecaller</td>
                                                 <td>
                                                     <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete User"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-2" style="margin-top:15px;"></div>

                     </div>
                 </div>

             </div>
             <!-- PAGE CONTENT WRAPPER -->

         </div>
         <!-- END PAGE CONTENT -->
     </div>
     <!-- END PAGE CONTAINER -->
     @stop
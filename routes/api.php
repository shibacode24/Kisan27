<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apicontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('index',[Apicontroller::class,'index']);

Route::post('login_api',[Apicontroller::class,'login_api']);

Route::post('attendance',[Apicontroller::class,'attendance']);

Route::post('journeyplan',[Apicontroller::class,'journeyplan']);

Route::get('show_journeyplan',[Apicontroller::class,'show_journeyplan']);

Route::post('check_in_out',[Apicontroller::class,'check_in_out']);

Route::get('journeyplandelete',[Apicontroller::class,'journeyplandelete']);
Route::get('journeyplancomfirm',[Apicontroller::class,'journeyplancomfirm']);


Route::get('getallstate',[Apicontroller::class,'getallstate']);

Route::get('getalldistrict',[Apicontroller::class,'getalldistrict']);

Route::get('getallregion',[Apicontroller::class,'getallregion']);

Route::get('getalltehsil',[Apicontroller::class,'getalltehsil']);

Route::get('getallcity',[Apicontroller::class,'getallcity']);

Route::post('sm_to_region',[Apicontroller::class,'sm_to_region']);

Route::post('sm_to_asm',[Apicontroller::class,'sm_to_asm']);

Route::post('asm_to_sp',[Apicontroller::class,'asm_to_sp']);

Route::post('date_year',[Apicontroller::class,'date_year']);

Route::post('get_photo',[Apicontroller::class,'get_photo']);

Route::post('get_photo',[Apicontroller::class,'get_photo']);


Route::post('tracking',[Apicontroller::class,'tracking']);
Route::get('get_tracking',[Apicontroller::class,'get_tracking']);
Route::get('all_tracking',[Apicontroller::class,'all_tracking']);

Route::get('get_all_asm',[Apicontroller::class,'get_all_asm']);

Route::get('get_all_sp',[Apicontroller::class,'get_all_sp']);


Route::post('leave',[Apicontroller::class,'leave']);
Route::get('get_leave',[Apicontroller::class,'get_leave']);


Route::post('document1',[Apicontroller::class,'document1']);
Route::get('get_document1',[Apicontroller::class,'get_document1']);


Route::get('get_user',[Apicontroller::class,'get_user']);

Route::post('profile_update',[Apicontroller::class,'profile_update']);

Route::post('change_password',[Apicontroller::class,'change_password']);

Route::post('save_lat_long',[Apicontroller::class,'save_lat_long']);









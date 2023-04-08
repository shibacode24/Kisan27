<?php

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\statecontroller;
use App\Http\Controllers\tehsilcontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\rolemastercontroller;
use App\Http\Controllers\citycontroller;
use App\Http\Controllers\Districcontroller;
use App\Http\Controllers\Salemanagercontroller;
use App\Http\Controllers\Area_mastercontroller;
use App\Http\Controllers\Areamanagercontroller;
use App\Http\Controllers\SalePersoncontroller;
use App\Http\Controllers\Assignteamcontroller;
use App\Http\Controllers\sm_to_asmController;
use App\Http\Controllers\Regioncontroller;
use App\Http\Controllers\asm_to_spController;
use App\Http\Controllers\DashboardController;
use App\Models\Newassign;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('loginform');
// });

 Route::get('/',[logincontroller::class,'index'])->name('/');
 Route::post('check_login',[logincontroller::class,'check_login'])->name('check_login');


// Route::post('store',[logincontroller::class,'store']);

// Route::post('store',[statecontroller::class,'store']);

// Route::post('store',[tehsilcontroller::class,'store']);

// Route::post('store',[usercontroller::class,'store']);

// Route::post('store',[rolemastercontroller::class,'store']);


// Route::get('dashboard-view',[citycontroller::class,'view'])->name('dashboard-view');


Route::get('city-index',[citycontroller::class,'index'])->name('city-index');
Route::post('create-city',[citycontroller::class,'create'])->name('create-city');
Route::get('edit-city/{id}',[citycontroller::class,'edit'])->name('edit-city');
Route::get('destroy-city/{id}',[citycontroller::class,'destroy'])->name('destroy-city');
Route::post('update-city',[citycontroller::class,'update'])->name('update-city');
Route::get('get_city_by_id',[citycontroller::class,'get_city_by_id'])->name('get_city_by_id');
Route::get('get_tehsil_by_id',[citycontroller::class,'get_tehsil_by_id'])->name('get_tehsil_by_id');

// Route::get('user',[statecontroller::class,'user'])->name('city-user');

Route::get('state-index',[statecontroller::class,'index'])->name('state-index');
Route::post('create-state',[statecontroller::class,'create'])->name('create-state');
Route::get('edit-state/{id}',[statecontroller::class,'edit'])->name('edit-state');
Route::get('destroy-state/{id}',[statecontroller::class,'destroy'])->name('destroy-state');
Route::post('update-state',[statecontroller::class,'update'])->name('update-state');


Route::get('tehsil-index',[tehsilcontroller::class,'index'])->name('tehsil-index');
Route::post('create-tehsil',[tehsilcontroller::class,'create'])->name('create-tehsil');
Route::get('destroy-tehsil/{id}',[tehsilcontroller::class,'destroy'])->name('destroy-tehsil');
Route::get('edit-tehsil/{id}',[tehsilcontroller::class,'edit'])->name('edit-tehsil');
Route::post('update-tehsil',[tehsilcontroller::class,'update'])->name('update-tehsil');
Route::get('get_tehsil_by_id',[tehsilcontroller::class,'get_tehsil_by_id'])->name('get_tehsil_by_id');




Route::get('distric-index',[Districcontroller::class,'index'])->name('distric-index');
Route::post('create-distric',[Districcontroller::class,'create'])->name('create-distric');
Route::get('destroy-distric/{id}',[Districcontroller::class,'destroy'])->name('destroy-distric');
Route::get('edit-distric/{id}',[Districcontroller::class,'edit'])->name('edit-distric');
Route::post('update-distric',[Districcontroller::class,'update'])->name('update-distric');
Route::get('get_district_by_id',[Districcontroller::class,'get_district_by_id'])->name('get_district_by_id');


Route::get('region-index',[Regioncontroller::class,'index'])->name('region-index');
Route::post('create-region',[Regioncontroller::class,'create'])->name('create-region');
Route::get('destroy-region/{id}',[Regioncontroller::class,'destroy'])->name('destroy-region');
Route::get('edit-region/{id}',[Regioncontroller::class,'edit'])->name('edit-region');
Route::post('update-region',[Regioncontroller::class,'update'])->name('update-region');



Route::get('role_master-index',[rolemastercontroller::class,'index'])->name('role_master-index');
Route::post('create-role_master',[rolemastercontroller::class,'create'])->name('create-role_master');
Route::get('destroy-role_master/{id}',[rolemastercontroller::class,'destroy'])->name('destroy-role_master');
Route::get('edit-role_master/{id}',[rolemastercontroller::class,'edit'])->name('edit-role_master');
Route::post('update-role_master',[rolemastercontroller::class,'update'])->name('update-role_master');

 

Route::get('area_master-index',[Area_mastercontroller::class,'index'])->name('area_master-index');
Route::post('create-area_master',[Area_mastercontroller::class,'create'])->name('create-area_master');
Route::get('destroy-area_master/{id}',[Area_mastercontroller::class,'destroy'])->name('destroy-area_master');
Route::get('edit-area_master/{id}',[Area_mastercontroller::class,'edit'])->name('edit-area_master');
Route::post('update-area_master',[Area_mastercontroller::class,'update'])->name('update-area_master');



Route::get('sales_manager-index',[Salemanagercontroller::class,'index'])->name('sales_manager-index');
Route::post('create-sales_manager',[Salemanagercontroller::class,'create'])->name('create-sales_manager');
Route::get('destroy-sales_manager/{id}',[Salemanagercontroller::class,'destroy'])->name('destroy-sales_manager');
Route::get('edit-sales_manager/{id}',[Salemanagercontroller::class,'edit'])->name('edit-sales_manager');
Route::post('update-sales_manager',[Salemanagercontroller::class,'update'])->name('update-sales_manager');
Route::get('get_district_by_id',[Salemanagercontroller::class,'get_district_by_id'])->name('get_district_by_id');
Route::get('get_tehsil_by_id',[Salemanagercontroller::class,'get_tehsil_by_id'])->name('get_tehsil_by_id');
Route::get('get_city_by_id',[Salemanagercontroller::class,'get_city_by_id'])->name('get_city_by_id');
Route::get('get_region_by_id',[Salemanagercontroller::class,'get_region_by_id'])->name('get_region_by_id');
Route::get('get_all_id',[Salemanagercontroller::class,'get_all_id'])->name('get_all_id');
Route::get('all',[Salemanagercontroller::class,'all'])->name('all');



Route::get('area_manager-index',[Areamanagercontroller::class,'index'])->name('area_manager-index');
Route::post('create-area_manager',[Areamanagercontroller::class,'create'])->name('create-area_manager');
Route::get('destroy-area_manager/{id}',[Areamanagercontroller::class,'destroy'])->name('destroy-area_manager');
Route::get('get_district_by_id',[Areamanagercontroller::class,'get_district_by_id'])->name('get_district_by_id');
Route::get('get_tehsil_by_id',[Areamanagercontroller::class,'get_tehsil_by_id'])->name('get_tehsil_by_id');
Route::get('get_city_by_id',[Areamanagercontroller::class,'get_city_by_id'])->name('get_city_by_id');
Route::get('get_region_by_id',[Areamanagercontroller::class,'get_region_by_id'])->name('get_region_by_id');
Route::get('edit-area_manager/{id}',[Areamanagercontroller::class,'edit'])->name('edit-area_manager');
Route::post('update-area_manager',[Areamanagercontroller::class,'update'])->name('update-area_manager');
Route::get('get_all_id',[Areamanagercontroller::class,'get_all_id'])->name('get_all_id');
Route::get('all',[Areamanagercontroller::class,'all'])->name('all');





Route::get('sales_person-index',[SalePersoncontroller::class,'index'])->name('sales_person-index');
Route::post('create-sales_person',[SalePersoncontroller::class,'create'])->name('create-sales_person');
Route::get('destroy-sales_person/{id}',[SalePersoncontroller::class,'destroy'])->name('destroy-sales_person');
Route::get('edit-sales_person/{id}',[SalePersoncontroller::class,'edit'])->name('edit-sales_person');
Route::post('update-sales_person',[SalePersoncontroller::class,'update'])->name('update-sales_person');
Route::get('get_district_by_id',[SalePersoncontroller::class,'get_district_by_id'])->name('get_district_by_id');
Route::get('get_tehsil_by_id',[SalePersoncontroller::class,'get_tehsil_by_id'])->name('get_tehsil_by_id');
Route::get('get_city_by_id',[SalePersoncontroller::class,'get_city_by_id'])->name('get_city_by_id');
Route::get('get_region_by_id',[SalePersoncontroller::class,'get_region_by_id'])->name('get_region_by_id');
Route::get('get_all_id',[SalePersoncontroller::class,'get_all_id'])->name('get_all_id');
Route::get('all',[SalePersoncontroller::class,'all'])->name('all');






Route::get('assign_team-index',[Assignteamcontroller::class,'index'])->name('assign_team-index');
Route::post('create-assign_team',[Assignteamcontroller::class,'create'])->name('create-assign_team');
Route::get('edit-assign_team/{id}',[Assignteamcontroller::class,'edit'])->name('edit-assign_team');
Route::post('update-assign_team',[Assignteamcontroller::class,'update'])->name('update-assign_team');
Route::get('destroy-assign_team/{id}',[Assignteamcontroller::class,'destroy'])->name('destroy-assign_team');


Route::get('sm_to_asm-index',[sm_to_asmController::class,'index'])->name('sm_to_asm-index');
Route::post('create-sm_to_asm',[sm_to_asmController::class,'create'])->name('create-sm_to_asm');
Route::get('delete-sm_to_asm/{id}',[sm_to_asmController::class,'delete'])->name('delete_sm_to_asm');
Route::get('edit-sm_to_asm/{id}',[sm_to_asmController::class,'edit'])->name('edit-sm_to_asm');
Route::post('update-sm_to_asm',[sm_to_asmController::class,'update'])->name('update-sm_to_asm');





Route::get('asm_to_sp-index',[asm_to_spController::class,'index'])->name('asm_to_sp-index');
Route::post('create-asm_to_sp',[asm_to_spController::class,'create'])->name('create-asm_to_sp');
Route::get('delete-asm_to_sp/{id}',[asm_to_spController::class,'delete'])->name('delete-asm_to_sp');
Route::get('edit-asm_to_sp/{id}',[asm_to_spController::class,'edit'])->name('edit-asm_to_sp');
Route::post('update-asm_to_sp',[asm_to_spController::class,'update'])->name('update-asm_to_sp');




Route::get('dashboard-view',[DashboardController::class,'dashboard'])->name('dashboard-view');
Route::get('date',[DashboardController::class,'date'])->name('date');
Route::get('leave',[DashboardController::class,'leave'])->name('leave');
Route::get('update_document',[DashboardController::class,'update'])->name('update_document');
Route::get('edit_document/{id}',[DashboardController::class,'edit'])->name('edit_document');

Route::get('update_leave',[DashboardController::class,'update1'])->name('update_leave');
Route::get('edit_leave/{id}',[DashboardController::class,'edit1'])->name('edit_leave');
// Route::get('dashboard-view',[DashboardController::class,'view'])->name('dashboard-view');
Route::get('destroy-document/{id}',[DashboardController::class,'destroy_document'])->name('destroy-document');
Route::get('destroy-tracking/{id}',[DashboardController::class,'destroy_tracking'])->name('destroy-tracking');
Route::get('destroy-leave/{id}',[DashboardController::class,'destroy_leave'])->name('destroy-leave');
Route::get('destroy-visit/{id}',[DashboardController::class,'destroy_visit'])->name('destroy-visit');

Route::get('tracking_pdf',[DashboardController::class,'tracking_pdf'])->name('pdf_tracking');

Route::get('document_pdf',[DashboardController::class,'document_pdf'])->name('pdf_document');

Route::get('leave_pdf',[DashboardController::class,'leave_pdf'])->name('pdf_leave');

Route::get('visit_pdf',[DashboardController::class,'visit_pdf'])->name('pdf_visit');

Route::get('get_emp_by_id',[DashboardController::class,'get_emp_by_id'])->name('get_emp_by_id');




<?php

namespace App\Http\Controllers;

use App\Models\Areamanager;
use App\Models\Assignteam;
use App\Models\Attendance;
use App\Models\Salemanager;
use App\Models\SalePerson;
use App\Models\state;
use App\Models\tracking;
use App\Models\Leave;
use App\Models\Document;
use App\Models\Visit;
use Illuminate\Http\Request;
use DB;
use \KMLaravel\GeographicalCalculator\Facade\GeoFacade;

class DashboardController extends Controller
{
  public function dashboard(Request $request)
  {
    //  dd($request->all());

    $states = state::all();
    $emps = SalePerson::all();

    $asm = Areamanager::all();
    // echo json_encode( $asm);

    // $tracking_query = DB::table('tracking')->select('*', DB::raw('DATE(created_at) as date'), DB::raw('sum(distance) as distance'))->groupby('date');

    // if ($request->user_id != 'All') {
    //   $tracking_query = $tracking_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
    // if (isset($request->from_date) && isset($request->to_date)) {
    //   $tracking_query = $tracking_query->whereDate('created_at', '<=', $request->to_date)
    //     ->whereDate('created_at', '>=', $request->from_date);
    // }
    // $tracking_query = $tracking_query->orderby('date', 'desc')->get();
    



    $tracking_query = DB::table('tracking')->select('*', DB::raw('DATE(created_at) as date'), DB::raw('sum(distance) as distance'))->groupby('date');

    
      $tracking_query = $tracking_query->where(['role' => $request->role, 'user_id' => $request->sp_id]);
  
    if (isset($request->from_date) && isset($request->to_date)) {
      $tracking_query = $tracking_query->whereDate('created_at', '<=', $request->to_date)
        ->whereDate('created_at', '>=', $request->from_date);
    }
    if ($request->role == "sp") {
      $tracking_query = DB::table('tracking')
      // ->where('role', '=', 'sp')
      ->leftjoin('sales_person','sales_person.id','=','tracking.user_id')
      ->where(['role' => $request->role, 'sales_person.id' => $request->sp_id])
      
      ->select('sales_person.Name','sales_person.Mobile_Number','tracking.*');
      }
    $tracking_query = $tracking_query->get();
    

    //  echo json_encode( $tracking_query);


    // $leave = DB::table('leave');
    // if ($request->user_id != 'All') {
    //   $leave = $leave->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }

    // $leave = $leave->orderby('id', 'desc')->get();

    $leave = DB::table('leave');

    // if ($request->user_id !== "All") {
        $leave = $leave->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
    if ($request->user_id == "All" && $request->role2 == "sm") {
      $leave = DB::table('leave')
      ->where('role', '=', 'sm')
    ->leftjoin('sales_manager','sales_manager.id','=','leave.user_id')
    ->select('sales_manager.Name','sales_manager.Mobile_Number','leave.*');
  }
  elseif ($request->user_id == "All" && $request->role2 == "sp") {
    $leave = DB::table('leave')
    ->where('role', '=', 'sp')
    ->leftjoin('sales_person','sales_person.id','=','leave.user_id')
  ->select('sales_person.Name','sales_person.Mobile_Number','leave.*');
}
elseif ($request->user_id == "All" && $request->role2 == "asm") {
  $leave = DB::table('leave')
  ->where('role', '=', 'asm')
->leftjoin('area_manager','area_manager.id','=','leave.user_id')
->select('area_manager.Name','area_manager.Mobile_Number','leave.*');
}
elseif ($request->user_id == "All" && $request->role2 == "retailer") {
  $leave = DB::table('leave')
  ->where('role', '=', 'retailers')
->leftjoin('retailers','retailers.id','=','leave.user_id')
->select('retailers.Name','leave.*');
}
elseif ($request->user_id == "All" && $request->role2 == "distributor") {
  $leave = DB::table('leave')
  ->where('role', '=', 'distributor')
->leftjoin('distributor','distributor.id','=','leave.user_id')
->select('distributor.Name','leave.*');
}

if ($request->user_id !== "All" && $request->role == "sm") {
  $leave = DB::table('leave')
  ->where('role', '=', 'sm')
->leftjoin('sales_manager','sales_manager.id','=','leave.user_id')
->where(['role' => $request->role, 'sales_manager.id' => $request->user_id])

->select('sales_manager.Name','sales_manager.Mobile_Number','leave.*');
}
elseif ($request->user_id !== "All" && $request->role == "sp") {
$leave = DB::table('leave')
// ->where('role', '=', 'sp')
->leftjoin('sales_person','sales_person.id','=','leave.user_id')
->where(['role' => $request->role, 'sales_person.id' => $request->user_id])

->select('sales_person.Name','sales_person.Mobile_Number','leave.*');
}
elseif ($request->user_id !== "All" && $request->role == "asm") {
$leave = DB::table('leave')
// ->where('role', '=', 'asm')

->leftjoin('area_manager','area_manager.id','=','leave.user_id')
->where(['role' => $request->role, 'area_manager.id' => $request->user_id])

->select('area_manager.Name','area_manager.Mobile_Number','leave.*');
}

    if(isset($request->from_date) && isset($request->to_date)){
        $leave= $leave->whereDate('leave.created_at','<=',$request->to_date)
            ->whereDate('leave.created_at','>=',$request->from_date);     
    }
    
    $leave = $leave->orderby('id', 'asc')->get();


    // $document = DB::table('document');
    // if ($request->user_id != 'All') {
    //   $document = $document->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
    // $document = $document->orderby('id', 'desc')->get();

    $document = DB::table('document');

    // if ($request->user_id !== "All") {
        $document = $document->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
    if ($request->user_id == "All" && $request->role2 == "sm") {
      $document = DB::table('document')
      ->where('role', '=', 'sm')
    ->leftjoin('sales_manager','sales_manager.id','=','document.user_id')
    ->select('sales_manager.Name','sales_manager.Mobile_Number','document.*');
  }
  elseif ($request->user_id == "All" && $request->role2 == "sp") {
    $document = DB::table('document')
    ->where('role', '=', 'sp')
    ->leftjoin('sales_person','sales_person.id','=','document.user_id')
  ->select('sales_person.Name','sales_person.Mobile_Number','document.*');
}
elseif ($request->user_id == "All" && $request->role2 == "asm") {
  $document = DB::table('document')
  ->where('role', '=', 'asm')
->leftjoin('area_manager','area_manager.id','=','document.user_id')
->select('area_manager.Name','area_manager.Mobile_Number','document.*');
}
elseif ($request->user_id == "All" && $request->role2 == "retailer") {
  $document = DB::table('document')
  ->where('role', '=', 'retailers')
->leftjoin('retailers','retailers.id','=','document.user_id')
->select('retailers.Name','document.*');
}
elseif ($request->user_id == "All" && $request->role2 == "distributor") {
  $document = DB::table('document')
  ->where('role', '=', 'distributor')
->leftjoin('distributor','distributor.id','=','document.user_id')
->select('distributor.Name','document.*');
}

if ($request->user_id !== "All" && $request->role == "sm") {
  $document = DB::table('document')
  ->where('role', '=', 'sm')
->leftjoin('sales_manager','sales_manager.id','=','document.user_id')
->where(['role' => $request->role, 'sales_manager.id' => $request->user_id])

->select('sales_manager.Name','sales_manager.Mobile_Number','document.*');
}
elseif ($request->user_id !== "All" && $request->role == "sp") {
$document = DB::table('document')
// ->where('role', '=', 'sp')
->leftjoin('sales_person','sales_person.id','=','document.user_id')
->where(['role' => $request->role, 'sales_person.id' => $request->user_id])

->select('sales_person.Name','sales_person.Mobile_Number','document.*');
}
elseif ($request->user_id !== "All" && $request->role == "asm") {
$document = DB::table('document')
// ->where('role', '=', 'asm')

->leftjoin('area_manager','area_manager.id','=','document.user_id')
->where(['role' => $request->role, 'area_manager.id' => $request->user_id])

->select('area_manager.Name','area_manager.Mobile_Number','document.*');
}

    if(isset($request->from_date) && isset($request->to_date)){
        $document= $document->whereDate('document.created_at','<=',$request->to_date)
            ->whereDate('document.created_at','>=',$request->from_date);     
    }
    
    $document = $document->orderby('id', 'asc')->get();


    // $visit_query = DB::table('visit');
    // if ($request->user_id !== 'All') {
    //   $visit_query = $visit_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
  
    // if (isset($request->from_date) && isset($request->to_date)) {
    //   $visit_query = $visit_query->whereDate('created_at', '<=', $request->to_date)
    //     ->whereDate('created_at', '>=', $request->from_date);
    // }
    // $visit_query = $visit_query->orderby('id', 'desc')->get();


    $visit_query = DB::table('visit');

    // if ($request->user_id !== "All") {
        $visit_query = $visit_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
    if ($request->user_id == "All" && $request->role2 == "sm") {
      $visit_query = DB::table('visit')
      ->where('role', '=', 'sm')
    ->leftjoin('sales_manager','sales_manager.id','=','visit.user_id')
    ->select('sales_manager.Name','sales_manager.Mobile_Number','visit.*');
  }
  elseif ($request->user_id == "All" && $request->role2 == "sp") {
    $visit_query = DB::table('visit')
    ->where('role', '=', 'sp')
    ->leftjoin('sales_person','sales_person.id','=','visit.user_id')
  ->select('sales_person.Name','sales_person.Mobile_Number','visit.*');
}
elseif ($request->user_id == "All" && $request->role2 == "asm") {
  $visit_query = DB::table('visit')
  ->where('role', '=', 'asm')
->leftjoin('area_manager','area_manager.id','=','visit.user_id')
->select('area_manager.Name','area_manager.Mobile_Number','visit.*');
}
elseif ($request->user_id == "All" && $request->role2 == "retailer") {
  $visit_query = DB::table('visit')
  ->where('role', '=', 'retailers')
->leftjoin('retailers','retailers.id','=','visit.user_id')
->select('retailers.Name','visit.*');
}
elseif ($request->user_id == "All" && $request->role2 == "distributor") {
  $visit_query = DB::table('visit')
  ->where('role', '=', 'distributor')
->leftjoin('distributor','distributor.id','=','visit.user_id')
->select('distributor.Name','visit.*');
}

if ($request->user_id !== "All" && $request->role == "sm") {
  $visit_query = DB::table('visit')
  ->where('role', '=', 'sm')
->leftjoin('sales_manager','sales_manager.id','=','visit.user_id')
->where(['role' => $request->role, 'sales_manager.id' => $request->user_id])

->select('sales_manager.Name','sales_manager.Mobile_Number','visit.*');
}
elseif ($request->user_id !== "All" && $request->role == "sp") {
$visit_query = DB::table('visit')
// ->where('role', '=', 'sp')
->leftjoin('sales_person','sales_person.id','=','visit.user_id')
->where(['role' => $request->role, 'sales_person.id' => $request->user_id])

->select('sales_person.Name','sales_person.Mobile_Number','visit.*');
}
elseif ($request->user_id !== "All" && $request->role == "asm") {
$visit_query = DB::table('visit')
// ->where('role', '=', 'asm')

->leftjoin('area_manager','area_manager.id','=','visit.user_id')
->where(['role' => $request->role, 'area_manager.id' => $request->user_id])

->select('area_manager.Name','area_manager.Mobile_Number','visit.*');
}

    if(isset($request->from_date) && isset($request->to_date)){
        $visit_query= $visit_query->whereDate('visit.created_at','<=',$request->to_date)
            ->whereDate('visit.created_at','>=',$request->from_date);     
    }
    
    $visit_query = $visit_query->orderby('id', 'asc')->get();




     $attendance_query = DB::table('attendance');

    // if ($request->user_id !== "All") {
        $attendance_query = $attendance_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
    if ($request->user_id == "All" && $request->role2 == "sm") {
      $attendance_query = DB::table('attendance')
      ->where('role', '=', 'sm')
    ->leftjoin('sales_manager','sales_manager.id','=','attendance.user_id')
    ->select('sales_manager.Name','sales_manager.Mobile_Number','attendance.*');
  }
  elseif ($request->user_id == "All" && $request->role2 == "sp") {
    $attendance_query = DB::table('attendance')
    ->where('role', '=', 'sp')
    ->leftjoin('sales_person','sales_person.id','=','attendance.user_id')
  ->select('sales_person.Name','sales_person.Mobile_Number','attendance.*');
}
elseif ($request->user_id == "All" && $request->role2 == "asm") {
  $attendance_query = DB::table('attendance')
  ->where('role', '=', 'asm')
->leftjoin('area_manager','area_manager.id','=','attendance.user_id')
->select('area_manager.Name','area_manager.Mobile_Number','attendance.*');
}
elseif ($request->user_id == "All" && $request->role2 == "retailer") {
  $attendance_query = DB::table('attendance')
  ->where('role', '=', 'retailers')
->leftjoin('retailers','retailers.id','=','attendance.user_id')
->select('retailers.Name','attendance.*');
}
elseif ($request->user_id == "All" && $request->role2 == "distributor") {
  $attendance_query = DB::table('attendance')
  ->where('role', '=', 'distributor')
->leftjoin('distributor','distributor.id','=','attendance.user_id')
->select('distributor.Name','attendance.*');
}

if ($request->user_id !== "All" && $request->role == "sm") {
  $attendance_query = DB::table('attendance')
  ->where('role', '=', 'sm')
->leftjoin('sales_manager','sales_manager.id','=','attendance.user_id')
->where(['role' => $request->role, 'sales_manager.id' => $request->user_id])

->select('sales_manager.Name','sales_manager.Mobile_Number','attendance.*');
}
elseif ($request->user_id !== "All" && $request->role == "sp") {
$attendance_query = DB::table('attendance')
// ->where('role', '=', 'sp')
->leftjoin('sales_person','sales_person.id','=','attendance.user_id')
->where(['role' => $request->role, 'sales_person.id' => $request->user_id])

->select('sales_person.Name','sales_person.Mobile_Number','attendance.*');
}
elseif ($request->user_id !== "All" && $request->role == "asm") {
$attendance_query = DB::table('attendance')
// ->where('role', '=', 'asm')

->leftjoin('area_manager','area_manager.id','=','attendance.user_id')
->where(['role' => $request->role, 'area_manager.id' => $request->user_id])

->select('area_manager.Name','area_manager.Mobile_Number','attendance.*');
}

    if(isset($request->from_date) && isset($request->to_date)){
        $attendance_query= $attendance_query->whereDate('attendance.created_at','<=',$request->to_date)
            ->whereDate('attendance.created_at','>=',$request->from_date);     
    }
    
    $attendance_query = $attendance_query->orderby('id', 'asc')->get();

    // $attendance_query = DB::table('attendance');

    // if ($request->user_id !== "All") {
    //     $attendance_query = $attendance_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
    // }
    
    // if(isset($request->from_date) && isset($request->to_date)){
    //     $attendance_query= $attendance_query->whereDate('created_at','<=',$request->to_date)
    //         ->whereDate('created_at','>=',$request->from_date);     
    // }
    
    // $attendance_query = $attendance_query->orderby('id', 'asc')->get();
    

//     $attendance_query = Attendance::query(); // Start with the Attendance model query builder

// if ($request->user_id != 'All') {
//   $attendance_query = $attendance_query->where('user_id', $request->user_id);
// }

// if (isset($request->from_date) && isset($request->to_date)) {
//   $attendance_query = $attendance_query->whereDate('created_at', '>=', $request->from_date)
//                                          ->whereDate('created_at', '<=', $request->to_date);
// }

// // If $request->role is set, apply it to the query
// if(isset($request->role)){
//     $attendance_query = $attendance_query->where('role', $request->role);
// }

// // Get the results
// $attendance_query = $attendance_query->orderBy('id', 'desc')->get();


    //   $leave = Leave :: where(['role'=>$request->role,'user_id'=>$request->user_id])->get();
    //   $document = Document ::
    //   where(['role'=>$request->role,'user_id'=>$request->user_id])->get();


    //   $visit_query = Visit ::where(['role'=>$request->role,'user_id'=>$request->user_id]);
    //   if(isset($request->from_date) && isset($request->to_date)){
    //     $visit_query= $visit_query->whereDate('created_at','<=',$request->to_date)
    //     ->whereDate('created_at','>=',$request->from_date);
    //   }
    //   $visit_query=$visit_query->get();

    return view('dashboard', ['states' => $states, 'emps' => $emps, 'tt' => $tracking_query, 'asms' => $asm, 'leaves' => $leave, 'document' => $document, 'visits' => $visit_query, 'attendance' => $attendance_query]);
  }

  public function tracking_pdf(Request $request)
  {
  
    $tracking_query = DB::table('tracking')->select('*', DB::raw('DATE(created_at) as date'), DB::raw('sum(distance) as distance'))->groupby('date');

    if ($request->user_id != 'All') {
      $tracking_query = $tracking_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
    }
    if (isset($request->from_date) && isset($request->to_date)) {
      $tracking_query = $tracking_query->whereDate('created_at', '<=', $request->to_date)
        ->whereDate('created_at', '>=', $request->from_date);
    }
    $tracking_query = $tracking_query->orderby('date', 'desc')->get();
    $user_name = 'ALL';

    if ($request->role == 'sp') {
    $user_name = SalePerson::where('id',$request->user_id)->pluck('Name')->first();
    }
    if ($request->role == 'asm') {
      $user_name = Areamanager::where('id',$request->user_id)->pluck('Name')->first();
    }
    
    $from_date = $request->from_date;
    $to_date = $request->to_date;

// echo json_encode($tracking_query);
    return view('pdf_tracking', ['tracking_query' => $tracking_query, 'user_name' => $user_name, 'from_date' => $from_date, 'to_date' => $to_date]);
  }

  public function document_pdf(Request $request)
  {
    $document = DB::table('document');
    if ($request->user_id != 'All') {
      $document = $document->where(['role' => $request->role, 'user_id' => $request->user_id]);
    }
    $document = $document->orderby('id', 'desc')->get();

    $user_name = 'ALL';

    if ($request->role == 'sp') {
    $user_name = SalePerson::where('id',$request->user_id)->pluck('Name')->first();
    }
    if ($request->role == 'asm') {
      $user_name = Areamanager::where('id',$request->user_id)->pluck('Name')->first();
    }
    

    return view('pdf_document',['document' => $document, 'user_name' => $user_name]);
  }

  public function leave_pdf(Request $request)
  {
    $leave = DB::table('leave');
    if ($request->user_id != 'All') {
      $leave = $leave->where(['role' => $request->role, 'user_id' => $request->user_id]);
    }

    $leave = $leave->orderby('id', 'desc')->get();

    $user_name = 'ALL';

    if ($request->role == 'sp') {
    $user_name = SalePerson::where('id',$request->user_id)->pluck('Name')->first();
    }
    if ($request->role == 'asm') {
      $user_name = Areamanager::where('id',$request->user_id)->pluck('Name')->first();
    }
    

    return view('pdf_leave',['leave' => $leave, 'user_name' => $user_name]);
  }


  public function visit_pdf(Request $request)
  {
    $visit_query = DB::table('visit');
    if ($request->user_id != 'All') {
      $visit_query = $visit_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
    }
    $visit_query = Visit::where(['role' => $request->role, 'user_id' => $request->user_id]);
    if (isset($request->from_date) && isset($request->to_date)) {
      $visit_query = $visit_query->whereDate('created_at', '<=', $request->to_date)
        ->whereDate('created_at', '>=', $request->from_date);
    }
    $visit_query = $visit_query->orderby('id', 'desc')->get();

    $user_name = 'ALL';

    if ($request->role == 'sp') {
    $user_name = SalePerson::where('id',$request->user_id)->pluck('Name')->first();
    }
    if ($request->role == 'asm') {
      $user_name = Areamanager::where('id',$request->user_id)->pluck('Name')->first();
    }
    
    $from_date = $request->from_date;
    $to_date = $request->to_date;

// echo json_encode($tracking_query);
    return view('pdf_visit', ['visit_query' => $visit_query, 'user_name' => $user_name, 'from_date' => $from_date, 'to_date' => $to_date]);

  }
  public function edit(Request $request)
  {
    $user = Document::find($request->id)->update(['status' => $request->status]);

    return response()->json(['success' => 'Status changed successfully.']);
  }
  public function update(Request $request)
  {
    Document::where('id', $request->id)
      ->update([
        'status' => $request->status
      ]);


    session()->flash('msg', 'successfull');
    return redirect('dashboard-view');
  }

  public function edit1(Request $request)
  {
    $user = Leave::find($request->id)->update(['status' => $request->status]);

    return response()->json(['success' => 'Status changed successfully.']);
  }
  public function update1(Request $request)
  {
    $Leave = Leave::where('id', $request->id)
      ->update([
        'status' => $request->status
      ]);


    session()->flash('msg', 'successfull');
    return redirect('dashboard-view');
  }

  public function destroy_document($id)
  {
    $Document = Document::where('id', $id)->delete();
    return redirect(route('dashboard-view'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
  }

  public function destroy_tracking($id)
  {
    $tracking = tracking::where('id', $id)->delete();
    return redirect(route('dashboard-view'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
  }

  public function destroy_visit($id)
  {
    $Visit = Visit::where('id', $id)->delete();
    return redirect(route('dashboard-view'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
  }

  public function destroy_attendance($id)
  {
    $attendance = Attendance::where('id', $id)->delete();
    return redirect(route('dashboard-view'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
  }

  public function destroy_leave($id)
  {
    $Leave = Leave::where('id', $id)->delete();
    return redirect(route('dashboard-view'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
  }

  
  public function save_lat_long(Request $request)
  {
    $current_date = date('Y-m-d');
    $check_exit = tracking::where('created_at', $current_date)
      ->orderby('id', 'desc')->first();
    $calculated_distance = 0;
    $tracking = new tracking;
    $tracking->user_id = $request->get('user_id');
    $tracking->role = $request->get('role');
    $tracking->latitude = $request->get('latitude');
    $tracking->longitude = $request->get('longitude');
    $tracking->distance = $calculated_distance;
    if ($check_exit) {
      $distance = $this->calculate_distance($request->get('latitude'), $request->get('longitude'), $check_exit->latitude, $check_exit->longitude);
      $tracking->distance = $distance;
    }
    $tracking->save();
  }

  // public function calculate_distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
  // {
  //   //   $latitudeFrom = '22.574864';
  //   // $longitudeFrom = '88.437915';

  //   // $latitudeTo = '22.568662';
  //   // $longitudeTo = '88.431918';

  //   //Calculate distance from latitude and longitude
  //   $theta = $longitudeFrom - $longitudeTo;
  //   $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
  //   $dist = acos($dist);
  //   $dist = rad2deg($dist);
  //   $miles = $dist * 60 * 1.1515;

  //   $distance = ($miles * 1.609344) . ' km';
  //   return $distance;
  // }
   public function calculate_distance($lat1, $long1, $lat2, $long2)
{ 
    // $lat1='20.9040872';
    // $long1='77.7617455';
    //    $lat2='21.1613484';
    // $long2='78.932422';
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&&key=AIzaSyDkFrL3p2KR9iAmFiuhmkszKgMHIon1Y0E";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);

    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    // $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

   // return array('distance' => $dist, 'time' => $time);
    return $dist;
    dd($dist);
}

function get_emp_by_id(Request $request)
    {
      $data = DB::table('asm_to_sp')->where('asm_to_sp.asm_id', $request->id)
       
        ->join('sales_person','sales_person.id','=','asm_to_sp.sp_id')
         ->leftjoin('role_master','role_master.id','=','sales_person.role_id')
         ->select('sales_person.Name','sales_person.id','role_master.Role')
        ->get();
        return response()->json($data);
    }

}

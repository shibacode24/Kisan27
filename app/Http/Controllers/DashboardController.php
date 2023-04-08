<?php

namespace App\Http\Controllers;

use App\Models\Areamanager;
use App\Models\Assignteam;
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
    // dd($request->all());

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

    
      $tracking_query = $tracking_query->where(['role' => $request->role, 'user_id' => $request->user_id]);
  
    if (isset($request->from_date) && isset($request->to_date)) {
      $tracking_query = $tracking_query->whereDate('created_at', '<=', $request->to_date)
        ->whereDate('created_at', '>=', $request->from_date);
    }
    $tracking_query = $tracking_query->orderby('date', 'desc')->get();
    

    //  echo json_encode( $tracking_query);


    $leave = DB::table('leave');
    if ($request->user_id != 'All') {
      $leave = $leave->where(['role' => $request->role, 'user_id' => $request->user_id]);
    }

    $leave = $leave->orderby('id', 'desc')->get();


    $document = DB::table('document');
    if ($request->user_id != 'All') {
      $document = $document->where(['role' => $request->role, 'user_id' => $request->user_id]);
    }
    $document = $document->orderby('id', 'desc')->get();




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


    //   $leave = Leave :: where(['role'=>$request->role,'user_id'=>$request->user_id])->get();
    //   $document = Document ::
    //   where(['role'=>$request->role,'user_id'=>$request->user_id])->get();


    //   $visit_query = Visit ::where(['role'=>$request->role,'user_id'=>$request->user_id]);
    //   if(isset($request->from_date) && isset($request->to_date)){
    //     $visit_query= $visit_query->whereDate('created_at','<=',$request->to_date)
    //     ->whereDate('created_at','>=',$request->from_date);
    //   }
    //   $visit_query=$visit_query->get();

    return view('dashboard', ['states' => $states, 'emps' => $emps, 'tt' => $tracking_query, 'asms' => $asm, 'leaves' => $leave, 'document' => $document, 'visits' => $visit_query]);
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
         ->select('sales_person.Name','role_master.Role')
        ->get();
        return response()->json($data);
    }

}

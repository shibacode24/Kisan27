<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Journeyplan;
use App\Models\state;
use App\Models\Distric;
use App\Models\Region;
use App\Models\tehsil;
use App\Models\city;
use App\Models\Assignteam;
use App\Models\sm_to_asm;
use App\Models\asm_to_sp;
use App\Models\Get_photo;
use App\Models\Areamanager;
use App\Models\Salemanager;
use App\Models\SalePerson;
use App\Models\tracking;
use App\Models\Leave;
use App\Models\Document;
use DB;
use Illuminate\Http\Request;
use Hash;
class Apicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               $user=User::get();
               return response()->json(['status'=>true,'data'=>$user]); //array
            //    return response()->json(['status'=>false,'message'=>'data not']); //array
    }

 public function login_api(Request $request)
 {
	 if($request->role=="asm")
	 {
		 $checkuser=Areamanager::where('Username',$request->username)->first();

		  if($checkuser && Hash::check($request->password,$checkuser->Password))
     {
    return response()->json(['status'=>true,'data'=>$checkuser,'role'=>"asm"]);      
	 }
     else
     {
   return response()->json(['status'=>false,'message'=>'User Not Found ASM']); //array
    }
    }
	 else if($request->role=="sm")
	 {
		 $checkuser=Salemanager::where('Username',$request->username)->first();
		  if($checkuser && Hash::check($request->password,$checkuser->Password))
     {
    return response()->json(['status'=>true,'data'=>$checkuser,'role'=>"sm"]); //array
     }
      else
      {
    return response()->json(['status'=>false,'message'=>'User Not Found SM']); //array
     }
	 } 
		 else{
			 
		 $checkuser=SalePerson::where('Username',$request->username)->first();
		  if($checkuser && Hash::check($request->password,$checkuser->Password))
     {
    return response()->json(['status'=>true,'data'=>$checkuser,'role'=>"sp"]); //array
     }
      else
      {
    return response()->json(['status'=>false,'message'=>'User Not Found']); //array
     }
		 }
        }
  
 
 public function attendance(Request $request)
 {
  
    $insert=Attendance::create(
        [
     'user_id'=>$request->user_id, //user-id ye table field hai oe $req->user-id ye data form se aa raha hai
	 'role'=>$request->role,		
     'time'=>date('G:i',strtotime($request->time)),
     'date'=>$request->date,
    'in_out'=>$request->in_out,
    ]);
    if($insert->id)
    {
        return response()->json(['status'=>true,'message'=>'Attendance Recorded Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure At Server']);
    }
 }
public function check_in_out(Request $request)
{
  $check_in_out=attendance::where('user_id',$request->user_id)
	  ->where('role',$request->role)
  ->where('date',date('Y-m-d'))->OrderBy('id','desc')->first();
  if($check_in_out)
  {
    return response()->json(['status'=>true,'message'=>'Record Found','in_out' => $check_in_out->in_out]);
  }
  else{
    return response()->json(['status'=>false,'message'=>'Record Not Found','in_out' => 'out']);
  }
}
public function show_journeyplan(Request $request)
{
    $data=Journeyplan::
    join('state','state.id','=','journeyplan.State_id')
    ->join('distric','distric.id','=','journeyplan.District_id')
    ->join('tehsil','tehsil.id','=','journeyplan.Tehsil_id')
    ->where('user_id',$request->user_id)
	->where('role',$request->role)
    ->select('journeyplan.*','state.State_Name','distric.District','tehsil.Tehsil')
	->withTrashed()
    ->get();
    if(count($data)>0)
    // if($data)
    return response()->json(['status'=>true,'data'=>$data]);
    else
    return response()->json(['status'=>false,'data'=>'data not found']);

}

public function journeyplan(Request $request)
 {
    $insert=Journeyplan::create(
        [
     'user_id'=>$request->user_id, //user-id ye table field hai or $req->user-id ye data form se aa raha hai
     'role'=>$request->role,
     'project_type'=>$request->projecttype,
     'journey_plan_type'=>$request->journeyplan,
     'visit_type'=>$request->visittype,
     'traveling_date'=>date('Y-m-d',strtotime($request->travelingdate)),
     'from_time'=>date('G:i',strtotime($request->fromdate)),
     'to_time'=>date('G:i',strtotime($request->todate)),
     'State_id'=>$request->state,
     'District_id'=>$request->district,
     'Tehsil_id'=>$request->tahsil,
     'form_location'=>$request->formlocation,
     'to_location'=>$request->tolocation,
     'mode_of_travel'=>$request->modeoftravel,
     'meter_reading' =>$request->meterreading,
     'task'=>$request->task,
     'photo'=>$request->photo,
    ]);
    // dd($insert);
    if($insert->id)
    {
        return response()->json(['status'=>true,'message'=>'data submitted successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'something error occur']);
    }
  }

  public function journeyplandelete(Request $request)
  {
     $delete=Journeyplan::where('id',$request->id)->delete();  
        
     if($delete)
     {
         return response()->json(['status'=>true,'message'=>'data deleted successfully']);
     }
     else{
         return response()->json(['status'=>false,'message'=>'something error occur']);
     }
   }

	public function journeyplancomfirm(Request $request)
  {
     $confirm=Journeyplan::where('id',$request->id)
     ->update([
        'confirm'=>$request->confirm
       ]);
     if($confirm)
     {
         return response()->json(['status'=>true,'message'=>'data confirmd successfully']);
     }
     else
	 {
         return response()->json(['status'=>false,'message'=>'something error occur']);
     }
}
	
   public function date_year(Request $request)
   {
    $date_year=Journeyplan::select( DB::raw(" MIN(DATE_FORMAT(created_at, '%Y-%m')) as date, YEAR(created_at) year, MONTH(created_at) month ") ) ->groupBy('year', 'month') ->get();

    if($date_year)
     {
         return response()->json(['status'=>true,'data'=>$date_year]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }

   }

   public function getallstate(Request $request)
   {
    $getallstate=state::orderBy('State_Name','asc')->get();
    if($getallstate)
     {
         return response()->json(['status'=>true,'data'=>$getallstate]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }

   }

   public function getalldistrict(Request $request)
   {
  //  {dd($request->all());
    $getalldistrict=Distric::where('State_id',$request->state_id)->orderBy('District','asc')->get();
    if($getalldistrict)
     {
         return response()->json(['status'=>true,'data'=>$getalldistrict]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }

   }

   public function getallregion(Request $request)
   {
    $getallregion=Region::where('State_id',$request->state_id)->orderBy('Region','asc')->get();
    if($getallregion)
     {
         return response()->json(['status'=>true,'data'=>$getallregion]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }

   }

   public function getalltehsil(Request $request)
   {

    // dd($request->all());
    $getalltehsil=tehsil::where('State_id',$request->state_id)->where('District_id',$request->district_id)->orderBy('Tehsil','asc')->get();
   

    if($getalltehsil)
     {
         return response()->json(['status'=>true,'data'=>$getalltehsil]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }
   
   }

   public function getallcity(Request $request)
   {

    // dd($request->all());
    $getallcity=city::where('State_id',$request->state_id)->where('District_id',$request->district_id)->where('Tehsil_id',$request->tehsil_id)->orderBy('City','asc')->get();
    dd($request->all());

    if($getallcity)
     {
         return response()->json(['status'=>true,'data'=>$getallcity]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }
   
   }

//    public function sm_to_region1(Request $request)
//    {
//       // dd($request->all());
//       // $insert=Assignteam::create(
//       //     
//            $get=Assignteam::where('Select_SM',$request->sm)->where('Region',$request->region)->orderBy('Region','asc')->get();
//       //  'Select_SM'=>$request->sm,
//       //  'Region'=>$request->region,
  
//       if($get)
//       {
//           return response()->json(['status'=>true,'data'=>$get]);
//       }
//       else{
//           return response()->json(['status'=>false,'message'=>'Something Error Occure']);
//       }
//    }



   public function sm_to_region(Request $request)
 {
    // dd($request->all());
    $insert=Assignteam::create(
        [
     'Select_SM'=>$request->sm,
     'Region'=>$request->region,
    ]);
    if($insert->id)
    {
        return response()->json(['status'=>true,'message'=>'data Recorded Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure']);
    }
 }

 public function sm_to_asm(Request $request)
 {
    // dd($request->all());
    $insert=sm_to_asm::create(
        [
     'sm_id'=>$request->sm,
     'asm_id'=>$request->asm,
    ]);
    if($insert->id)
    {
        return response()->json(['status'=>true,'message'=>'data Recorded Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure']);
    }
 }

 public function asm_to_sp(Request $request)
 {
    // dd($request->all());
    $insert=asm_to_sp::create(
        [
     'sm_id'=>$request->sm,
     'asm_id'=>$request->asm,
     'sp_id'=>$request->sp,
    ]);
    if($insert->id)
    {
        return response()->json(['status'=>true,'message'=>'data Recorded Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure']);
    }
 }
 public function get_photo(Request $request)
 {
    $insert=Get_photo::create(
        [
     'journey_id'=>$request->journey_id,
     'user_id'=>$request->user_id,
	 'role'=>$request->role,		
     'name'=>$request->name,
     'visitdetails'=>$request->visitdetails,
     'image'=>$request->image,
    ]);
    if($insert->id)
    {
        return response()->json(['status'=>true,'message'=>'data Recorded Successfully']);
    }
    else{
        return response()->json(['status'=>false,'message'=>'Something Error Occure']);
    }

 }
	
public function tracking(Request $request)
 {
    $insert=tracking::create([
        'user_id'=>$request->user_id,
		 'role'=>$request->role,	
        'latitude'=>$request->latitude,
        'longitude'=>$request->longitude,
    ]);
if($insert->id){
    return response()->json(['status'=>true,'message'=>'data recorded successfully']);
}
else{
    return response()->json(['status'=>false,'message'=>'Somethig Error Occure']);
}

 }
	public function get_tracking(Request $request)
   {
    //  dd($request->all());
    $get_tracking=DB::table('tracking')
    ->where('user_id',$request->user_id)
    ->where('role',$request->role)
    ->select(array('latitude','longitude'))
	->latest('created_at')->first();
    
    if($get_tracking)
     {
         return response()->json(['status'=>true,'data'=>$get_tracking]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }
   }
	
	public function all_tracking(Request $request)
   {
    $date_tracking=DB::table('tracking')
     ->where('user_id',$request->user_id)
    ->where('role',$request->role)
    ->whereDate('created_at',$request->date)
    ->select(array('latitude','longitude'))
	->orderby('id','asc')
    ->get();
    if($date_tracking->count()>0)
     {
         return response()->json(['status'=>true,'data'=>$date_tracking]);
     }
     else
     {
         return response()->json(['status'=>false,'message'=>'data not found']);
     }
   }
	
public function get_all_asm(Request $request)
   {
    //  dd($request->all());
        $get_asm=sm_to_asm::where('sm_id',$request->sm_id)//yaha humne sm ki id match ki
        ->select('asm_id')//yaha humne colomn me se id select ki
        ->get();
        $area_manager=[];//array create kiya kyu ki asm me  multiple value  store kiye
        foreach($get_asm as $g){
            $asm_ids=explode(',',$g->asm_id);
            foreach($asm_ids as $a_id){
                $manager_details=Areamanager::select('id','Name')->where('id',$a_id)->first();
                if($manager_details){
                    $area_manager[]=$manager_details;
                }
            }
        }
        // echo json_encode($area_manager);
        // dd(1);
        if(count($area_manager)>0)
        {
   return response()->json(['status'=>true,'Data'=>$area_manager]); //array
}
     else
     {
   return response()->json(['status'=>false,'message'=>'User Not Found']); //array
    }
    }
	
    public function get_all_sp(Request $request)
     {
        $get_sp=asm_to_sp::where('asm_id',$request->asm_id)//yaha humne sm ki id match ki
        ->select('sp_id')//yaha humne colomn me se id select ki
        ->get();
        $sales_person=[];//array create kiya kyu ki asm me  multiple value  store kiye
        foreach($get_sp as $g){
            $sp_ids=explode(',',$g->sp_id);
            foreach($sp_ids as $a_id){
                $manager_details=SalePerson::select('id','Name')->where('id',$a_id)->first();
                if($manager_details){
                    $sales_person[]=$manager_details;
                }
            }
        }
        if(count($sales_person)>0)
        {
        return response()->json(['status'=>true,'Data'=>$sales_person]); //array
    }
         else
         {
       return response()->json(['status'=>false,'message'=>'User Not Found']); //array
        }
    }
	public function leave(Request $request)
    {
        $insert = Leave::create([
			'user_id'=>$request->user_id,
			'role'=>$request->role,
            'leave_type' => $request->leave_type,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'reason' => $request->reason,
        ]);
        if ($insert->id) {
            return response()->json(['status' => true, 'message' => 'data recorded successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure']);
        }
    }
	
	 public function get_leave(Request $request)
    {

        //  dd($request->all());
          $get_leave = Leave::where('user_id', $request->user_id)->where('role', $request->role)
            ->get();


        if ($get_leave) {
            return response()->json(['status' => true, 'data' => $get_leave]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }
	
	public function document1(Request $request)
    {
        $insert = Document::create([
            'user_id'=>$request->user_id,
            'role'=> $request->role,
            'document' => $request->doc
        ]);
        if ($insert) {
            return response()->json(['status' => true, 'message' => 'data recorded successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Somethig Error Occure']);
        }
    }

    public function get_document1(Request $request)
    {

        //  dd($request->all());
          $get_document = Document::where('user_id', $request->user_id)
          ->where('role', $request->role)
            ->get();


        if ($get_document) {
            return response()->json(['status' => true, 'data' => $get_document]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }
	
    public function get_user(Request $request)
    {
        if ($request->role == "asm") {
            $checkuser = Areamanager::where('id', $request->user_id)->first();
            if ($checkuser) {
                return response()->json(['status' => true, 'data' => $checkuser, 'role' => "asm"]);
            } else {
                return response()->json(['status' => false, 'message' => 'User Not Found SM']); //array
            }
        } else if ($request->role == "sm") {
            $checkuser = Salemanager::where('id', $request->user_id)->first();
            if ($checkuser) {
                return response()->json(['status' => true, 'data' => $checkuser, 'role' => "sm"]); //array
            } else {
                return response()->json(['status' => false, 'message' => 'User Not Found SM']); //array
            }
        } else {
            $checkuser = SalePerson::where('id', $request->user_id)->first();
            if ($checkuser) {
                return response()->json(['status' => true, 'data' => $checkuser, 'role' => "other"]); //array
            } else {
                return response()->json(['status' => false, 'message' => 'User Not Found Other']); //array
            }
        }
    }
	
	
	public function profile_update(Request $request)
    {
        if ($request->role == "asm") {
            $checkuser = Areamanager::where('id', $request->user_id)->update([
                'Name' => $request->Name,
                'Email' => $request->Email
            ]);
            return response()->json(['status' => true, 'data' => Areamanager::find($request->user_id), 'role' => "asm"]);
        } else if ($request->role == "sm") {
            $checkuser = Salemanager::where('id', $request->user_id)->update([
                // 'Photo'=>$request->Photo,
                'Name' => $request->Name,
                'Email_Id' => $request->Email
            ]);
            return response()->json(['status' => true, 'data' => Salemanager::find($request->user_id), 'role' => "sm"]);
        } else {
            $checkuser = SalePerson::where('id', $request->user_id)->update([
                'Name' => $request->Name,
                'Email' => $request->Email
            ]);
            return response()->json(['status' => true, 'data' => SalePerson::find($request->user_id), 'role' => "sp"]);
        }
    }

   public function change_password(Request $request)
    {
        if ($request->role == "asm") {
            $checkuser = Areamanager::where('id', $request->user_id)->update([
                'Password' => Hash::make($request->new_password)
            ]);
            return response()->json(['status' => true, 'data' => Areamanager::find($request->user_id), 'role' => "asm"]);
        } else if ($request->role == "sm") {
            $checkuser = Salemanager::where('id', $request->user_id)->update([
                // 'Photo'=>$request->Photo,
                'password' => Hash::make($request->new_password)
            ]);
            return response()->json(['status' => true, 'data' => Salemanager::find($request->user_id), 'role' => "asm"]);
        } else {
            $checkuser = SalePerson::where('id', $request->user_id)->update([
                'Password' => Hash::make($request->new_password)
            ]);
            return response()->json(['status' => true, 'data' => SalePerson::find($request->user_id), 'role' => "asm"]);
        }
    }

    public function save_lat_long(Request $request)
  {
    $current_date = date('Y-m-d');
    $check_exit = tracking::where('created_at', $current_date)
      ->orderby('id', 'desc')->first();
      dd($check_exit);
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
    return response()->json(['status' => true, 'data' => $tracking]);
  }

   public function calculate_distance($lat1, $long1, $lat2, $long2)
{ 

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
    dd((float)$dist);
    return (float)$dist;
    // dd($dist);
}


}
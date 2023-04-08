<?php

namespace App\Http\Controllers;

use App\Models\Areamanager;
use Illuminate\Http\Request;
use App\Models\state;
use App\Models\tehsil;
use App\Models\Distric;
use App\Models\city;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;

class Areamanagercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areamanager = Areamanager::join('state', 'state.id', '=', 'area_manager.State_id')
            ->join('distric', 'distric.id', '=', 'area_manager.District_id')
            ->join('tehsil', 'tehsil.id', '=', 'area_manager.Tehsil_id')
            ->join('city', 'city.id', '=', 'area_manager.City_id')
            ->join('region', 'region.id', '=', 'area_manager.Region_id')
            ->orderby('area_manager.id', 'desc')
            ->select('area_manager.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City', 'region.Region')
            ->get();


        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = Region::all();

        return view('area_manager', ['areamanagers' => $areamanager, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		

        $request->validate([

            'emp_id'  => 'required|max:6',
            'designation'  => 'required|max:40',
            'image'  => 'required',
            'name'  => 'required|max:30',
            'mobile_number'  => 'required|min:10',
            'email'  => 'required|max:30',
            'age'  => 'required',
            'gender'  => 'required|max:10',
            'add'  => 'required|max:40',
            'sup'  => 'required|max:40',
            'contact'  => 'required|min:10',
            'hrn'   => 'required|max:40',
            'hremail'  => 'required|max:40',
            'hr_number'  => 'required|min:10',
            'user' => 'required',
            'pass' => 'required',
            'city'   => 'required',
            'state'  => 'required',
            'distric'  => 'required',
            'tehsil'  => 'required',
            'region' => 'required'
        ]);

        $areamanager = new areamanager();
		
	
        
        $areamanager->Emp_id = $request->get('emp_id');
        $areamanager->Designation = $request->get('designation');
     
       
       
		 if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/upload_asm_img/'), $filename);
        }  
        $areamanager->Photo=$filename;
		
        $areamanager->Name = $request->get('name');
        $areamanager->Mobile_Number = $request->get('mobile_number');
        $areamanager->Email = $request->get('email');
        $areamanager->Age = $request->get('age');
        $areamanager->Gender = $request->get('gender');
        $areamanager->Address = $request->get('add');
        $areamanager->Sup_Name = $request->get('sup');
        $areamanager->Sup_Con = $request->get('contact');
        $areamanager->HR_Name = $request->get('hrn');
        $areamanager->HR_Email = $request->get('hremail');
        $areamanager->HR_Number = $request->get('hr_number');
        $areamanager->City_id = $request->get('city');
        $areamanager->State_id = $request->get('state');
        $areamanager->District_id = $request->get('distric');
        $areamanager->Tehsil_id = $request->get('tehsil');
        $areamanager->Region_id = $request->get('region');
        $areamanager->Username = $request->get('user');
        $areamanager->Password = Hash::make($request->get('pass'));

        $areamanager->save();

        return redirect()->back()->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
        // return redirect(route('area_manager-index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Areamanager  $areamanager
     * @return \Illuminate\Http\Response
     */
    public function show(Areamanager $areamanager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Areamanager  $areamanager
     * @return \Illuminate\Http\Response
     */
    public function edit(Areamanager $areamanager,$id)
    {
        $areamanager_edit = Areamanager::find($id);
        $areamanager_all = Areamanager::join('state', 'state.id', '=', 'area_manager.State_id')
            ->join('distric', 'distric.id', '=', 'area_manager.District_id')
            ->join('tehsil', 'tehsil.id', '=', 'area_manager.Tehsil_id')
            ->join('city', 'city.id', '=', 'area_manager.City_id')
            ->join('region', 'region.id', '=', 'area_manager.Region_id')
            ->orderby('area_manager.id', 'desc')
            ->select('area_manager.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City', 'region.Region')
            ->get();


        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = region::all();

        return view('edit_area_manager', ['areamanager_edit' => $areamanager_edit, 'areamanagers' => $areamanager_all, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Areamanager  $areamanager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        // dd($request->id);
		
		 if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/upload_asm_img/'), $filename);
        }  
        
        $areamanager_update = Areamanager::where('id', $request->id)->update(
            [
                'Emp_id' => $request->emp_id,
                'Name' => $request->name,
				'Photo' => $filename,
                 'Mobile_Number' => $request->mobile_number,
                'Email' => $request->email,
               'Age' => $request->age,
                'Gender' => $request->gender,
                'Address' => $request->add,
               'Sup_Name' => $request->sup,
               'Sup_Con' => $request->contact,
               'HR_Name' => $request->hrn,
               'HR_Email' => $request->hremail,
               'HR_Number' => $request->hr_number,
                'City_id' => $request->city,
                'Region_id' => $request->region,
                'State_id' => $request->state,
                // 'Pincode' => $request->pincode,
                'District_id' => $request->distric,
                'Tehsil_id' => $request->tehsil,
                'Username' => $request->user,
                'Password' => $request->pass
            ]
        );
        return redirect()->route('area_manager-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Areamanager  $areamanager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Areamanager $areamanager, $id)
    {
        $areamanager = Areamanager::where('id', $id)->delete();
        return redirect(route('area_manager-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }

    function get_district_by_id(Request $request)
    {
        $data = Distric::where('State_id', $request->id)->orderby('District', 'asc')->get();
        return response()->json($data);
    }

    function get_all_id(Request $request)
    {
        $data['district'] = Distric::where('State_id', $request->id)
        ->orderby('District', 'asc')->get();


         $data['tehsil'] = tehsil::where('District_id',$data['district'][0]['id'])
         ->orderby('Tehsil', 'asc')->get();
         
         $data['city'] = city::where('Tehsil_id',$data['tehsil'][0]['id'])
         ->orderby('City', 'asc')->get();

         $data['region'] = Region::where('State_id',$request->id)
         ->orderby('Region', 'asc')->get();

        return response()->json($data);
    }



    function get_tehsil_by_id(Request $request)
    {
        $data = tehsil::where('District_id', $request->id)->orderby('Tehsil', 'asc')->get();
        return response()->json($data);
    }
    function get_city_by_id(Request $request)
    {
        $data = city::where('Tehsil_id', $request->id)->orderby('city', 'asc')->get();
        return response()->json($data);
    }

    function get_region_by_id(Request $request)
    {
        $data = Region::where('State_id', $request->id)->orderby('region', 'asc')->get();
        return response()->json($data);
    }

    function all(Request $request)
    {
        // $data['district'] = Distric::where('State_id', $request->id)
        // ->orderby('District', 'asc')->get();


         $data['tehsil'] = tehsil::where('District_id',$request->id)
         ->orderby('Tehsil', 'asc')->get();
         
         $data['city'] = city::where('Tehsil_id',$data['tehsil'][0]['id'])
         ->orderby('City', 'asc')->get();

         return response()->json($data);

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\SalePerson;
use Illuminate\Http\Request;
use App\Models\state;
use App\Models\tehsil;
use App\Models\Distric;
use App\Models\city;
use App\Models\Region;
use App\Models\rolemaster;

use Facade\FlareClient\Stacktrace\File;
use Hash;
class SalePersoncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleperson = SalePerson::join('state', 'state.id', '=', 'sales_person.State_id')
            ->join('distric', 'distric.id', '=', 'sales_person.District_id')
            ->join('tehsil', 'tehsil.id', '=', 'sales_person.Tehsil_id')
            ->join('city', 'city.id', '=', 'sales_person.City_id')
            ->join('region', 'region.id', '=', 'sales_person.Region_id')
			->join('role_master', 'role_master.id', '=', 'sales_person.role_id')
            ->orderby('sales_person.id', 'desc')
            ->select('sales_person.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City',               'region.Region','role_master.Role')
            ->get();

        $role = rolemaster :: all();
        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = Region::all();

        return view('sales_person', ['salepersons' => $saleperson, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions,'roles' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'role'  => 'required|max:6',
            'emp_id'  => 'required|max:6',
            'image'  => 'required',
            'name'  => 'required|max:30',
            'number'  => 'required|min:10',
            'email'  => 'required|max:30',
            'add'  => 'required',
            'asm'  => 'required|max:20',
            'asm_number'  => 'required|min:10',
            'hrn'   => 'required|max:40',
            'hremail'  => 'required|max:40',
            'hr_number'  => 'required|min:10',
            'location'  => 'required',
            'user' => 'required',
           'pass' => 'required',
           'city'   => 'required',
           'state'  => 'required',
           'distric'  => 'required',
           'tehsil'  => 'required',
           'region' => 'required'
         ]);


        $saleperson = new saleperson();
		
		 
		
        $saleperson->role_id = $request->get('role');
        $saleperson->Emp_id = $request->get('emp_id');
         
		 if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/upload_sp_img/'), $filename);
        }  
        $saleperson->Photo=$filename;
		
		
        $saleperson->Name = $request->get('name');
        $saleperson->Mobile_Number = $request->get('number');
        $saleperson->Email = $request->get('email');
        $saleperson->Address = $request->get('add');
        $saleperson->ASM_Name = $request->get('asm');
        $saleperson->SM_No = $request->get('asm_number');
        $saleperson->HR_Name = $request->get('hrn');
        $saleperson->HR_Email = $request->get('hremail');
        $saleperson->HR_Number = $request->get('hr_number');
        $saleperson->City_id = $request->get('city');
        $saleperson->State_id = $request->get('state');
        $saleperson->District_id = $request->get('distric');
        $saleperson->Tehsil_id = $request->get('tehsil');
        $saleperson->Region_id = $request->get('region');
        $saleperson->Location = $request->get('location');
        $saleperson->Username = $request->get('user');
        $saleperson->Password = Hash::make($request->get('pass'));

        $saleperson->save();

        return redirect()->back()->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\SalePerson  $salePerson
     * @return \Illuminate\Http\Response
     */
    public function show(SalePerson $salePerson)
    {
        //
    }

   
    public function edit($id)
    {
        $saleperson_edit = SalePerson::find($id);
        $saleperson_all = SalePerson::join('state', 'state.id', '=', 'sales_person.State_id')
            ->join('distric', 'distric.id', '=', 'sales_person.District_id')
            ->join('tehsil', 'tehsil.id', '=', 'sales_person.Tehsil_id')
            ->join('city', 'city.id', '=', 'sales_person.City_id')
            ->join('region', 'region.id', '=', 'sales_person.Region_id')
			->join('role_master', 'role_master.id', '=', 'sales_person.role_id')
            ->orderby('sales_person.id', 'desc')
            ->select('sales_person.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City', 'region.Region')
            ->get();

       $role = rolemaster :: all();
        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = region::all();

        return view('edit_sales_person', ['saleperson_edit' => $saleperson_edit, 'salepersons' => $saleperson_all, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions, 'role' => $role]);
    }

   
    public function update(Request $request)
    {

        $saleserson =  SalePerson::where('id', $request->id)->first();

		 if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('images/upload_sp_img/'), $filename);
		 }
        SalePerson::where('id', $request->id)->update(
            [   
                'role_id'=>$request->role,
                'Emp_id' => $request->emp_id,
                'Photo' => $filename,
                'Name' => $request->name,
                'Mobile_Number' => $request->number,
                'Email' => $request->email,
                'Address' => $request->add,
                'ASM_Name' => $request->asm,
                'SM_No' => $request->asm_number,
                'HR_Name' => $request->hrn,
                'HR_Email' => $request->hremail,
                'HR_Number' => $request->hr_number,
                'City_id' => $request->city,
                'Region_id' => $request->region,
                'State_id' => $request->state,
                'District_id' => $request->distric,
                'Tehsil_id' => $request->tehsil,
                'Location' => $request->location,
                'Username' => $request->user,
                'Password' => $request->pass ? Hash::make($request->get('pass')) : $saleserson->Password,
            ]
        );
        return redirect()->route('sales_person-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalePerson  $salePerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saleperson = SalePerson::where('id', $id)->delete();
        return redirect(route('sales_person-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
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

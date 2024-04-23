<?php

namespace App\Http\Controllers;

use App\Models\Salemanager;
use App\Models\state;
use App\Models\tehsil;
use App\Models\Distric;
use App\Models\city;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
// use Log;
// use Path\To\Your\Log;

use Illuminate\Http\Request;

class Salemanagercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $salemanager = Salemanager::join('state', 'state.id', '=', 'sales_manager.State_id')
            ->join('distric', 'distric.id', '=', 'sales_manager.District_id')
            ->join('tehsil', 'tehsil.id', '=', 'sales_manager.Tahsil_id')
            ->join('city', 'city.id', '=', 'sales_manager.City_id')
            ->join('region', 'region.id', '=', 'sales_manager.Region_id')
            ->orderby('sales_manager.id', 'desc')
            ->select('sales_manager.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City', 'region.Region')
            ->get();


        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = Region::all();

        return view('sales_manager', ['salemanagers' => $salemanager, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'emp_id' => 'required|max:8',
            'name' => 'required|max:20',
            'mobile_no' => 'required|min:10',
            'email' => 'required|max:30',
            'address' => 'required|max:50',
            'pincode' => 'required|min:6',
            'Username' => 'required|max:20',
            'Password' => 'required',
            'city'   => 'required',
            'state'  => 'required',
            'distric'  => 'required',
            'tehsil'  => 'required',
            'region' => 'required'
        ]);

        $salemanager = new salemanager();
        $salemanager->Emp_id = $request->get('emp_id');
        $salemanager->Name = $request->get('name');
        $salemanager->Mobile_Number = $request->get('mobile_no');
        $salemanager->Email_id = $request->get('email');
        $salemanager->Address = $request->get('address');
        $salemanager->City_id = $request->get('city');
        $salemanager->Region_id = $request->get('region');
        $salemanager->State_id = $request->get('state');
        $salemanager->Pincode = $request->get('pincode');
        $salemanager->District_id = $request->get('distric');
        $salemanager->Tahsil_id = $request->get('tehsil');
        $salemanager->Username = $request->get('Username');
        $salemanager->Password = Hash::make($request->get('Password'));
        $salemanager->save();

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
     * @param  \App\Models\Salemanager  $salemanager
     * @return \Illuminate\Http\Response
     */
    public function show(Salemanager $salemanager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salemanager  $salemanager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salemanager_edit = Salemanager::find($id);
        $salemanager_all = Salemanager::join('state', 'state.id', '=', 'sales_manager.State_id')
            ->join('distric', 'distric.id', '=', 'sales_manager.District_id')
            ->join('tehsil', 'tehsil.id', '=', 'sales_manager.Tahsil_id')
            ->join('city', 'city.id', '=', 'sales_manager.City_id')
            ->join('region', 'region.id', '=', 'sales_manager.Region_id')
            ->orderby('sales_manager.id', 'desc')
            ->select('sales_manager.*', 'state.State_Name', 'distric.District', 'tehsil.Tehsil', 'city.City', 'region.Region')
            ->get();


        $state = state::all();
        $districs = Distric::all();
        $tehsils = tehsil::all();
        $citys = city::all();
        $regions = region::all();

        return view('sales_manager_edit', ['salemanager_edit' => $salemanager_edit, 'salemanagers' => $salemanager_all, 'states' => $state, 'districs' => $districs, 'tehsils' => $tehsils, 'citys' => $citys, 'regions' => $regions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salemanager  $salemanager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $salemanager = Salemanager::where('id',$request->id)->first();
        Salemanager::where('id', $request->id)->update(
            [
                'Emp_id' => $request->emp_id,
                'Name' => $request->name,
                'Mobile_Number' => $request->Mobile_Number,
                'Email_id' => $request->email,
                'Address' => $request->address,
                'City_id' => $request->city,
                'Region_id' => $request->region,
                'State_id' => $request->state,
                'Pincode' => $request->pincode,
                'District_id' => $request->distric,
                'Tahsil_id' => $request->tt,
                'Username' => $request->username,
                'Password' => $request->password ? Hash::make($request->get('password')) : $salemanager->password
            ]
        );
        return redirect()->route('sales_manager-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salemanager  $salemanager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salemanager $salemanager, $id)
    {
        $salemanager = Salemanager::where('id', $id)->delete();
        return redirect(route('sales_manager-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
function get_district_by_id(Request $request)
    {
        $data = Distric::where('State_id', $request->id)
        ->orderby('District', 'asc')->get();
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
        $data['tehsil1'] = tehsil::where('District_id', $request->id)->orderby('Tehsil', 'asc')->get();
        return response()->json($data);

        $data['city1'] = city::where('Tehsil_id',$data['tehsil1'][0]['id'])
        ->orderby('City', 'asc')->get();
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

<?php

namespace App\Http\Controllers;

use App\Models\city;
use Illuminate\Http\Request;
use App\Models\state;
use App\Models\Distric;
use App\Models\tehsil;

class citycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {

        return view('dashboard');
    }




    public function index()
    {  

        $citys = city::
        join('state','state.id','=','city.State_id')
        -> join('distric','distric.id','=','city.District_id')
        -> join('tehsil','tehsil.id','=','city.tehsil_id')
         
         ->orderby('city.id','desc')
         ->select('city.*','state.State_Name','distric.District','tehsil.Tehsil')
         ->get();
         $states = state::all();
         $districs = Distric::all();
         $tehsils = tehsil::all();

        return view('city',['citys'=>$citys,'states'=>$states,'districs'=>$districs,'tehsils'=>$tehsils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $City= new City;
        $City->State_id=$request->get('state');
        $City->District_id=$request->get('distric');
        $City->Tehsil_id=$request->get('tehsil');
        $City->City=$request->get('city_name');


        $City->save();

        return redirect(route('city-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city,$id)
    {
    $city_edit = city::find($id); 
    $citys = city::
    join('state','state.id','=','city.State_id')
    -> join('distric','distric.id','=','city.District_id')
    -> join('tehsil','tehsil.id','=','city.tehsil_id')
     
     ->orderby('city.id','desc')
     ->select('city.*','state.State_Name','distric.District','tehsil.Tehsil')
     ->get();
     $states = state::all();
     $districs = Distric::all();
     $tehsils = tehsil::all();

    return view('editcity',['city_edit'=>$city_edit,'citys'=>$citys,'states'=>$states,'districs'=>$districs,'tehsils'=>$tehsils]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        city::where('id',$request->id)->update(
    		[
    			'State_id'=>$request->state,
                'District_id'=>$request->distric,
                'Tehsil_id'=>$request->tehsil,
    			'City'=>$request->city_name,
    		]);
    	return redirect()->route('city-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(city $city,$id)
    {
       $city=city::where('id',$id)->delete();
       return redirect(route('city-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
 
    function get_tehsil_by_id(Request $request){
        $data['district'] = Distric::where('State_id', $request->id)
        ->orderby('District', 'asc')->get();


         $data['tehsil'] = tehsil::where('District_id',$data['district'][0]['id'])
         ->orderby('Tehsil', 'asc')->get();
        
    }


    function get_city_by_id(Request $request){
        $data=city::where('Tehsil_id',$request->id)->orderby('city','asc')->get();
        return response()->json($data);
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\tehsil;
use Illuminate\Http\Request;
use App\Models\state;
use App\Models\Distric;

class tehsilcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tehsils = tehsil::
        join('state','state.id','=','tehsil.State_id')
       -> join('distric','distric.id','=','tehsil.District_id')
        
        ->orderby('tehsil.id','desc')
        ->select('tehsil.*','state.State_Name','distric.District')
        ->get();
        $states = state::all();
        $districs = Distric::all();

        return view('tehsil',['tehsils'=>$tehsils,'states'=>$states,'districs'=>$districs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tehsil= new tehsil;
        $tehsil->State_id=$request->get('state');
        $tehsil->District_id=$request->get('distric');
        $tehsil->Tehsil=$request->get('tt');

        $tehsil->save();

        return redirect(route('tehsil-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function show(tehsil $tehsil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function edit(tehsil $tehsil,$id)
    {   
        $tehsil_edit = tehsil::find($id);
        // dd($request->all()); isme tumne id recieved kiye na ? $tehsil_edit me kiye na
        $tehsil_all = tehsil:: 
        join('state','state.id','=','tehsil.State_id')
       -> join('distric','distric.id','=','tehsil.District_id')
        
        ->orderby('tehsil.id','desc')
        ->select('tehsil.*','state.State_Name','distric.District')
        ->get();
        $states = state::all();
        $districs = Distric::where('State_id','1')->get();
        return view('edittehsil',['tehsil_edit'=>$tehsil_edit,'tehsils'=>$tehsil_all,'states'=>$states,'districs'=>$districs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tehsil $tehsil)
    {  
        tehsil::where('id',$request->id)->update(
    		[
    			'State_id'=>$request->state,
                'District_id'=>$request->distric,
                'Tehsil'=>$request->tt,
    		]);
    	return redirect()->route('tehsil-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tehsil  $tehsil
     * @return \Illuminate\Http\Response
     */
    public function destroy(tehsil $tehsil,$id)
    {
        $tehsil=tehsil::find($id);
        $tehsil->delete();
        return redirect(route('tehsil-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }

    function get_tehsil_by_id(Request $request){
        $data=tehsil::where('District_id',$request->id)->orderby('Tehsil','asc')->get();
        return response()->json($data);
        
    }
}

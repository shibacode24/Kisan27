<?php

namespace App\Http\Controllers;

use App\Models\Distric;
use Illuminate\Http\Request;
use App\Models\state;

class Districcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districs = Distric::
        join('state','state.id','=','distric.State_id')
        ->orderby('distric.id','desc')
        ->select('distric.*','state.State_Name')
        ->get();
        $states = state::all();
        return view('distric',['districs'=>$districs,'states'=>$states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $distric= new distric;
        $distric->State_id=$request->get('state');
        $distric->District=$request->get('dd');

        $distric->save();

        return redirect(route('distric-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\Distric  $distric
     * @return \Illuminate\Http\Response
     */
    public function show(Distric $distric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distric  $distric
     * @return \Illuminate\Http\Response
     */
    public function edit(Distric $distric,$id)
    {
        $distric_edit = Distric::find($id); 
        $distric_all = Distric::
        join('state','state.id','=','distric.State_id')
        ->orderby('distric.id','desc')
        ->select('distric.*','state.State_Name')
        ->get();
        $states = state::all();
        return view('editdistric',['distric_edit'=>$distric_edit,'districs'=>$distric_all,'states'=>$states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distric  $distric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distric $distric)
    {
        Distric::where('id',$request->id)->update(
    		[
    			'State_id'=>$request->state,
                'District'=>$request->dd,
    		]);
    	return redirect()->route('distric-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distric  $distric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distric $distric,$id)
    {
        $distric=Distric::where('id',$id)->delete();
        return redirect(route('distric-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }

    function get_district_by_id(Request $request){
        $data=Distric::where('State_id',$request->id)->orderby('District','asc')->get();
        return response()->json($data);
        
    }
}

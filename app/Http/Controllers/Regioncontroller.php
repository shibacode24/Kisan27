<?php

namespace App\Http\Controllers;

use App\Models\Region;

use App\Models\state;
use Illuminate\Http\Request;

class Regioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::
        join('state','state.id','=','region.State_id')
        ->orderby('region.id','desc')
        ->select('region.*','state.State_Name')
        ->get();
       
        $states = state::all();

        return view('region',['regions'=>$regions,'states'=>$states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $region= new region;
        $region->State_id=$request->get('state');
        $region->Region=$request->get('rr');

        $region->save();

        return redirect(route('region-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region,$id)
    {
        $region = Region::find($id); 
        $regions = Region::
        join('state','state.id','=','region.State_id')
        ->orderby('region.id','desc')
        ->select('region.*','state.State_Name')
        ->get();
        $states = state::all();

        return view('editregion',['region'=>$region,'regions'=>$regions,'states'=>$states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
       Region::where('id',$request->id)->update(
    		[
    			'State_id'=>$request->state,
                'Region'=>$request->rr,
    		]);
    	return redirect()->route('region-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region=Region::where('id',$id)->delete();
        return redirect(route('region-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

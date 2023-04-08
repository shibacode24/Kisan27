<?php

namespace App\Http\Controllers;

use App\Models\state;
use Illuminate\Http\Request;

class statecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = state::all();
        return view('state',['state'=>$states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $state= new state;
        $state->State_Name=$request->get('state_name');


        $state->save();

        return redirect(route('state-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show(state $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(state $state,$id)
    {
        $state_edit = state::find($id); 
        $state = state::all();
        return view('editstate',['state'=>$state_edit,'states'=>$state]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, state $state)
    {
        state::where('id',$request->id)->update(
    		[
    			'State_Name'=>$request->state_name,
    		]);
    	return redirect()->route('state-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\state  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(state $state,$id)
    {
        $state=state::find($id);
        $state->delete();
        return redirect(route('state-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }


}

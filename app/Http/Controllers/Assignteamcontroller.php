<?php

namespace App\Http\Controllers;

use App\Models\Assignteam;
use App\Models\Region;
use App\Models\SalePerson;
use App\Models\Areamanager;
use App\Models\Salemanager;
use Illuminate\Http\Request;

class Assignteamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['assigns'] = Assignteam::
        join('sales_manager', 'sales_manager.id', '=', 'assign_team.Select_SM')
        ->join('region', 'region.id', '=', 'assign_team.Region_id')
            ->orderby('assign_team.id', 'desc')
            ->select('sales_manager.Name', 'assign_team.*','region.Region')

            ->get();
        $this->data['sm'] = Salemanager::get();

        $this->data['region'] = Region::get();

        // $all_fruits=['apple','guava','berries'];
        // $fav_fruit='appl2   e';
        // if(in_array($fav_fruit,$all_fruits))
        // echo 'exist';
        // else
        // echo 'dont';
        // exit();



        return view('assign_team', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $assign = new Assignteam;
        $assign->Select_SM = $request->get('sm');

        $assign->Region_id = implode(',', $request->region);
        
        $assign->save();

        return redirect(route('assign_team-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\Assignteam  $assignteam
     * @return \Illuminate\Http\Response
     */
    public function show(Assignteam $assignteam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignteam  $assignteam
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignteam $assignteam, $id)
    {
        $assign_edit = Assignteam::find($id);
        $this->data['assigns'] = Assignteam::
        join('sales_manager', 'sales_manager.id', '=', 'assign_team.Select_SM')
        ->join('region', 'region.id', '=', 'assign_team.Region_id')
        ->orderby('assign_team.id', 'desc')
        ->select('sales_manager.Name', 'assign_team.*','region.Region')

            ->get();
        $this->data['sm'] = Salemanager::get();

        $this->data['region'] = Region::get();

        return view('editassign_team', $this->data,['assign_edit'=>$assign_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignteam  $assignteam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignteam $assignteam)
    {
        Assignteam::where('id', $request->id)->update(
            [
                'Select_SM' => $request->sm,
                'Region_id' => implode(',', $request->region)
            ]
        );
        return redirect()->route('assign_team-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignteam  $assignteam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignteam $assignteam, $id)
    {
        $assign = Assignteam::where('id', $id)->delete();
        return redirect(route('assign_team-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Areamanager;
use App\Models\rolemaster;
use App\Models\Salemanager;
use Illuminate\Http\Request;

class rolemastercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolemasters = rolemaster::
       join('sales_manager','sales_manager.id','=','role_master.sm_id')
      -> join('area_manager','area_manager.id','=','role_master.asm_id')
        ->orderby('role_master.id','desc')
        ->select('role_master.*','sales_manager.Name AS sm_name','area_manager.Name AS asm_name')
        ->get();

       $sales_manager = Salemanager :: all();
       $area_manager = Areamanager :: all();

        return view('role_master',['rolemasters'=>$rolemasters,'sales_manager'=>$sales_manager,'area_manager'=>$area_manager]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rolemaster= new rolemaster();
        $rolemaster->sm_id=$request->get('select_sm');
        $rolemaster->asm_id=$request->get('select_asm');
        $rolemaster->Role=$request->get('role');
        $rolemaster->save();

        return redirect(route('role_master-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
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
     * @param  \App\Models\rolemaster  $rolemaster
     * @return \Illuminate\Http\Response
     */
    public function show(rolemaster $rolemaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rolemaster  $rolemaster
     * @return \Illuminate\Http\Response
     */
    public function edit(rolemaster $rolemaster,$id)
    {
        $rolemasters = rolemaster::find($id)
       -> join('sales_manager','sales_manager.id','=','role_master.sm_id')
       -> join('area_manager','area_manager.id','=','role_master.asm_id')
         ->orderby('role_master.id','desc')
         ->select('role_master.*','sales_manager.Name AS sm_name','area_manager.Name AS asm_name')
         ->get();
 
        $sales_manager = Salemanager :: all();
        $area_manager = Areamanager :: all();
 
         return view('role_master',['rolemasters'=>$rolemasters,'sales_manager'=>$sales_manager,'area_manager'=>$area_manager]);

        // $rolemaster = rolemaster::find($id); 
        // $rolemasters = rolemaster::all();
        // return view('editrole',['rolemaster'=>$rolemaster,'rolemasters'=>$rolemasters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rolemaster  $rolemaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rolemaster $rolemaster)
    {
        rolemaster::where('id',$request->id)->update([
               
                'sm_id'=>$request->select_sm,
                'asm_id'=>$request->select_asm,
                'Role'=>$request->role,
    		]);
    	return redirect()->route('role_master-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rolemaster  $rolemaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(rolemaster $rolemaster,$id)
    {
        $rolemaster=rolemaster::where('id',$id)->delete();
        return redirect(route('role_master-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

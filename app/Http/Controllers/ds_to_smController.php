<?php

namespace App\Http\Controllers;

use App\Models\ds_to_sm;
use App\Models\Distributor;
use App\Models\Salemanager;
use Illuminate\Http\Request;


class ds_to_smController extends Controller
{
    public function index()
    {
        $this->data['ds_to_sm'] = ds_to_sm::join('distributor', 'distributor.id', '=', 'ds_to_sm.ds_id')
            ->orderby('ds_to_sm.id', 'desc')
            ->select('distributor.Name', 'ds_to_sm.*')

            ->get();
        $this->data['sms'] = Salemanager::get();

        $this->data['ds'] = Distributor::get();


        return view('distributor_to_sm', $this->data);
    }

    public function create(Request $request)
    {

        $ds_to_sm = new ds_to_sm;
        $ds_to_sm->ds_id = $request->ds;
        $ds_to_sm->sm_id = implode(',', $request->sm);


        // $ds_to_sm->City=('Wardha');
        // $ds_to_sm->State=('Maharashtra');
        $ds_to_sm->save();

        return redirect(route('ds_to_sm-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
    }

    public function edit($id)
    {
        $ds_to_sm_edit = ds_to_sm::find($id);
        $this->data['ds_to_sm'] = ds_to_sm::join('distributor', 'distributor.id', '=', 'ds_to_sm.ds_id')
        ->orderby('ds_to_sm.id', 'desc')
        ->select('distributor.Name', 'ds_to_sm.*')

            ->get();
        $this->data['sms'] = Salemanager::get();

        $this->data['ds'] = Distributor::get();




        return view('edit_ds_to_sm', $this->data,['ds_to_sm_edit'=>$ds_to_sm_edit]);
    }

    public function update(Request $request)
    {
        ds_to_sm::where('id', $request->id)->update(
            [
            'ds_id'=>$request->ds,
            'sm_id' => implode(',', $request->sm)
        
            ]
        );
        return redirect()->route('ds_to_sm-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }
    public function delete(Request $request)
    {    
        // dd($request->id);
        ds_to_sm::where('id', $request->id)->delete();

        return back()->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

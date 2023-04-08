<?php

namespace App\Http\Controllers;

use App\Models\sm_to_asm;
use App\Models\Areamanager;
use App\Models\Salemanager;
use Illuminate\Http\Request;


class sm_to_asmController extends Controller
{
    public function index()
    {
        $this->data['sm_to_asm'] = sm_to_asm::join('sales_manager', 'sales_manager.id', '=', 'sm_to_asm.sm_id')
            ->orderby('sm_to_asm.id', 'desc')
            ->select('sales_manager.Name AS sm_name', 'sm_to_asm.*')

            ->get();
        $this->data['sms'] = Salemanager::get();

        $this->data['asms'] = Areamanager::get();


        return view('sm_to_asm', $this->data);
    }

    public function create(Request $request)
    {

        $sm_to_asm = new sm_to_asm;
        $sm_to_asm->sm_id = $request->sm;
        $sm_to_asm->asm_id = implode(',', $request->asm);


        // $sm_to_asm->City=('Wardha');
        // $sm_to_asm->State=('Maharashtra');
        $sm_to_asm->save();

        return redirect(route('sm_to_asm-index'))->with(['success' => true, 'message' => 'Data Successfully Submitted !']);
    }

    public function edit($id)
    {
        $sm_to_asm_edit = sm_to_asm::find($id);
        $this->data['sm_to_asm'] = sm_to_asm::join('sales_manager', 'sales_manager.id', '=', 'sm_to_asm.sm_id')
            ->orderby('sm_to_asm.id', 'desc')
            ->select('sales_manager.Name AS sm_name', 'sm_to_asm.*')

            ->get();
        $this->data['sms'] = Salemanager::get();

        $this->data['asms'] = Areamanager::get();


        return view('edit_sm_to_asm', $this->data,['sm_to_asm_edit'=>$sm_to_asm_edit]);
    }

    public function update(Request $request)
    {
        sm_to_asm::where('id', $request->id)->update(
            [
            'sm_id'=>$request->sm,
            'asm_id' => implode(',', $request->asm)
        
            ]
        );
        return redirect()->route('sm_to_asm-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }
    public function delete(Request $request)
    {    
        // dd($request->id);
        sm_to_asm::where('id', $request->id)->delete();

        return back()->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

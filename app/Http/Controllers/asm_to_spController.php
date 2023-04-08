<?php

namespace App\Http\Controllers;

use App\Models\asm_to_sp;
use App\Models\Areamanager;
use App\Models\Salemanager;
use App\Models\SalePerson;
use Illuminate\Http\Request;

class asm_to_spController extends Controller
{
    public function index()
    {
        $this->data['asm_to_sp'] = asm_to_sp::join('area_manager', 'area_manager.id', '=', 'asm_to_sp.asm_id')
            ->orderby('asm_to_sp.id', 'desc')
            ->select('asm_to_sp.*', 'area_manager.Name AS asm_name')

            ->get();
        //  $this->data['sm'] = Salemanager::get();

        $this->data['asm'] = Areamanager::get();

        $this->data['sp'] = SalePerson::get();


        return view('asm_to_sp', $this->data);
    }

    public function create(Request $request)
    {
        // dd($request->all());

        $asm_to_sp = new asm_to_sp;

        $asm_to_sp->asm_id = $request->get('asm');

        $asm_to_sp->sp_id = implode(',', $request->sp);
        // $asm_to_sp->City=('Wardha');
        // $asm_to_sp->State=('Maharashtra');
        $asm_to_sp->save();

        return redirect(route('asm_to_sp-index'))->with(['success' => true, 'message' => 'Data Submitted Successfully  !']);;
    }
    public function edit($id)
    {
        $asm_to_sp_edit = asm_to_sp::find($id);
        $this->data['asm_to_sp'] = asm_to_sp::join('area_manager', 'area_manager.id', '=', 'asm_to_sp.asm_id')
            ->orderby('asm_to_sp.id', 'desc')
            ->select('asm_to_sp.*', 'area_manager.Name AS asm_name')

            ->get();
        //  $this->data['sm'] = Salemanager::get();

        $this->data['asm'] = Areamanager::get();

        $this->data['sp'] = SalePerson::get();


        return view('edit_asm_to_sp', $this->data,['asm_to_sp_edit'=>$asm_to_sp_edit]);
    }

    public function update(Request $request)
    {
        asm_to_sp::where('id', $request->id)->update(
            [
                'asm_id' => $request->asm,
                'sp_id' => implode(',', $request->sp)

            ]
        );
        return redirect()->route('asm_to_sp-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);
    }
    public function delete(Request $request)
    {
        asm_to_sp::where('id', $request->id)->delete();

        return back()->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

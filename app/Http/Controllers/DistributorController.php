<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();
        return view('distributor', ['distributor' => $distributor,]);
    }

    public function create(Request $request)
{
    $request->validate([
        'name' => 'required|max:20',
        'father_name' => 'required|max:20',
        'firm_name' => 'required|max:20',
        'aadhar_card' => 'required|max:20',
        'pan_card' => 'required|max:20',
        'mobile_no' => 'required|min:10',
        'address' => 'required|max:50',
        'zip_code' => 'required|max:20',
        'username' => 'required|max:20',
        'password' => 'required',
        'front_pic' => 'required', // assuming 'front_shop_pic' is an image file
    ]);

    $distributor = new Distributor();
    $distributor->Name = $request->get('name');
    $distributor->father_name = $request->get('father_name');
    $distributor->firm_name = $request->get('firm_name');
    $distributor->aadhar_card = $request->get('aadhar_card');
    $distributor->pan_card = $request->get('pan_card');
    $distributor->Mobile_Number = $request->get('mobile_no');
    $distributor->Address = $request->get('address');
    $distributor->zip_code = $request->get('zip_code');
    
    // Handle file upload
    if ($request->hasFile('front_pic')) {
        $image = $request->file('front_pic');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/distributor'), $imageName);
        $distributor->front_pic = $imageName;
    }
    
    $distributor->Username = $request->get('username');
    $distributor->Password = Hash::make($request->get('password'));
    $distributor->save();

    return redirect()->back()->with(['success' => true, 'message' => 'Data Successfully Submitted!']);
}

public function edit($id)
    {
        $distributor_edit = Distributor::find($id);
        $distributor = Distributor::all();

        return view('distributor_edit', ['distributor_edit' => $distributor_edit, 'distributor' => $distributor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salemanager  $salemanager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $distributor = Distributor::find($request->id);
    $distributor->Name = $request->get('name');
    $distributor->firm_name = $request->get('firm_name');
    $distributor->aadhar_card = $request->get('aadhar_card');
    $distributor->Mobile_Number = $request->get('mobile_no');
    $distributor->Address = $request->get('address');
    
    // Handle file upload
    if ($request->hasFile('front_pic')) {
        $image = $request->file('front_pic');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/distributor'), $imageName);
        $distributor->front_pic = $imageName;
    }
    
    $distributor->Username = $request->get('username');
    // $distributor->$request->Password? Hash::make($request->get('password')) : $distributor->password;
     $distributor->Password= Hash::make($request->get('password'));

    $distributor->save();

        return redirect()->route('distributor-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);

    }


public function destroy($id)
    {
        $distributor = Distributor::where('id', $id)->delete();
        return redirect(route('distributor-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retailers;
use Illuminate\Support\Facades\Hash;

class RetailersController extends Controller
{
    public function index()
    {
        $retailers = Retailers::all();
        return view('retailers', ['retailers' => $retailers,]);
    }

    public function create(Request $request)
{
    $request->validate([
        'name' => 'required|max:20',
        'firm_name' => 'required|max:20',
        'aadhar_card' => 'required|max:20',
        'mobile_no' => 'required|min:10',
        'address' => 'required|max:50',
        'username' => 'required|max:20',
        'password' => 'required',
        'front_shop_pic' => 'required', // assuming 'front_shop_pic' is an image file
    ]);

    $retailers = new Retailers();
    $retailers->Name = $request->get('name');
    $retailers->firm_name = $request->get('firm_name');
    $retailers->aadhar_card = $request->get('aadhar_card');
    $retailers->Mobile_Number = $request->get('mobile_no');
    $retailers->Address = $request->get('address');
    
    // Handle file upload
    if ($request->hasFile('front_shop_pic')) {
        $image = $request->file('front_shop_pic');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/retailers'), $imageName);
        $retailers->front_shop_pic = $imageName;
    }
    
    $retailers->Username = $request->get('username');
    $retailers->Password = Hash::make($request->get('password'));
    $retailers->save();

    return redirect()->back()->with(['success' => true, 'message' => 'Data Successfully Submitted!']);
}

public function edit($id)
    {
        $retailers_edit = Retailers::find($id);
        $retailers = Retailers::all();

        return view('retailers_edit', ['retailers_edit' => $retailers_edit, 'retailers' => $retailers]);
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
        $retailers = Retailers::find($request->id);
    $retailers->Name = $request->get('name');
    $retailers->firm_name = $request->get('firm_name');
    $retailers->aadhar_card = $request->get('aadhar_card');
    $retailers->Mobile_Number = $request->get('mobile_no');
    $retailers->Address = $request->get('address');
    
    // Handle file upload
    if ($request->hasFile('front_shop_pic')) {
        $image = $request->file('front_shop_pic');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/retailers'), $imageName);
        $retailers->front_shop_pic = $imageName;
    }
    
    $retailers->Username = $request->get('username');
    // $retailers->$request->Password? Hash::make($request->password) : $retailers->password;
    $retailers->Password= Hash::make($request->password);
    $retailers->save();

        return redirect()->route('retailers-index')->with(['success' => true, 'message' => 'Data Successfully Updated !']);

    }


public function destroy($id)
    {
        $retailers = Retailers::where('id', $id)->delete();
        return redirect(route('retailers-index'))->with(['success' => true, 'message' => 'Data Successfully Deleted !']);
    }

}

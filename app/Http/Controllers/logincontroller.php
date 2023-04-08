<?php

namespace App\Http\Controllers;

use App\Models\login;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class logincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
           
        return view('loginform');
    }

    public function check_login(Request $request){
        // dd($request->all()); //yaha hamne dd ka use kiya hi kyki hame request se data print karna tha and code end karna tha
        if (auth()->attempt(array('email' => $request['email'], 'password' => $request['password']))) 
        {
           return redirect()->route('dashboard-view');
       }
       else{
        // echo "error','Invalid Login Credentials.";
         return redirect()->back()->with('error','Invalid Login Credentials.');  
           }     
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        // $loginform= new login;
        // $loginform->email=$request->get('email');
        // $loginform->password=Hash::make($request->get('password'));
        // $loginform->save();

        // echo "<h1>Login Successfully...</h1>";
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(login $login)
    {
        $login=login::all();
        return view('show',['login'=>$login]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(login $login)
    {
        //
    }
}

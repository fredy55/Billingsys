<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;
use App\Models\Compinfo;

class ClientsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Clients::all();
        
        return view('admin.clients.list', ['clients'=>$clients]); 
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients=Clients::find($id);

        return view('admin.clients.details', ['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $companyInfo = Compinfo::where('IsActive', 1)->get(['id','ctname']);
        
        return view('admin.clients.create', ['compInfo'=>$companyInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form data
        $this->validate($request,[
            'ctname'=>'string|required',
            'compinfo'=>'numeric|required',
            'email'=>'string|required',
            'phone'=>'numeric|required',
            'address1'=>'string|required',
            'city'=>'string|required',
            'state'=>'string|required',
            'country'=>'string|required'
        ]);
        
        //product does not exist
        $exist=Clients::where('email', $request->post('email'))->doesntExist();

        if($exist){
            $clients = new Clients;
            $clients->compId = $request->post('compinfo');
            $clients->ctname = $request->post('ctname');
            $clients->email = $request->post('email');
            $clients->phone_no = $request->post('phone');
            $clients->addressln1 = $request->post('address1');
            $clients->city = $request->post('city');
            $clients->state = $request->post('state');
            $clients->country = $request->post('country');

            if($clients->save()){
                return redirect()->route('clients.list')->with(['success'=>'Clients added successfully!']);
            }else{
                return redirect()->route('clients.add')->with(['danger'=>'Clients NOT added!']);  
            }
        }else{
            return redirect()->route('clients.add')->with(['warning'=>'Clients already exist!']);  
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients=Clients::find($id);

        return view('admin.clients.edit', ['clients'=>$clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       //validate form data
       //validate form data
       $this->validate($request,[
            'ctname'=>'string|required',
            'email'=>'string|required',
            'phone'=>'numeric|required',
            'address1'=>'string|required',
            'city'=>'string|required',
            'state'=>'string|required',
            'country'=>'string|required'
        ]);
        
        //Clients exist
        $exist=Clients::where('id',$request->post('id'))->exists();

        if($exist){
            $clients = Clients::find($request->post('id'));
            $clients->ctname = $request->post('ctname');
            $clients->email = $request->post('email');
            $clients->phone_no = $request->post('phone');
            $clients->addressln1 = $request->post('address1');
            $clients->city = $request->post('city');
            $clients->state = $request->post('state');
            $clients->country = $request->post('country');

            if($clients->save()){
                return redirect()->route('clients.list')->with(['success'=>'Clients updated successfully!']);
            }else{
                return redirect()->route('clients.add')->with(['danger'=>'Clients NOT updated!']);  
            }
        }else{
            return redirect()->route('clients.add')->with(['warning'=>'Clients already exist!']);  
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ///product does exist
        $exist=Clients::where('id',$id)->exists();

        if($exist){
            $clients = Clients::find($id);

            if($clients->delete()){
                return redirect()->route('clients.list')->with(['success'=>'Clients deleted successfully!']);
            }else{
                return redirect()->route('clients.list')->with(['danger'=>'Clients NOT deleted!']);  
            }
        }else{
            return redirect()->route('clients.list')->with(['warning'=>'Clients does Not exist!']);  
        }
    }
}   

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Compinfo;
use App\Traits\Imgupload;

class CompinfoController extends Controller
{
   //Call the image upload trait
   use Imgupload;
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compinfo=Compinfo::all();
        
        return view('admin.company.list', ['compinfo'=>$compinfo]); 
    }

    public function show($id)
    {
        $compinfo=Compinfo::find($id);

        return view('admin.company.details', ['compinfo'=>$compinfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       return view('admin.company.create');
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
            'cacnum'=>'string|required',
            'email'=>'string|required',
            'phone'=>'numeric|required',
            'address1'=>'string|required',
            'city'=>'string|required',
            'state'=>'string|required',
            'country'=>'string|required'
        ]);
        
        //Upload image
        $img_url = $this->getSingleImg($request, 'logo');

        //product does not exist
        $exist=Compinfo::where('email', $request->post('email'))->doesntExist();

        if($exist){
            if($img_url!="nill"){
                $company = new Compinfo;
                $company->ctname = $request->post('ctname');
                $company->cac_num = $request->post('cacnum');
                $company->email = $request->post('email');
                $company->phone_no = $request->post('phone');
                $company->addressln1 = $request->post('address1');
                $company->city = $request->post('city');
                $company->state = $request->post('state');
                $company->country = $request->post('country');
                $company->img_url = $img_url;

                if($company->save()){
                    return redirect()->route('company.list')->with(['success'=>'Company added successfully!']);
                }else{
                    return redirect()->route('company.add')->with(['danger'=>'Company NOT added!']);  
                }
            }else{
                return redirect()->route('company.add')->with(['warning'=>'Upload company logo!']);  
            }
        }else{
            return redirect()->route('company.add')->with(['warning'=>'Company already exist!']);  
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
        $compinfo=Compinfo::find($id);

        return view('admin.company.edit', ['compinfo'=>$compinfo]);
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
            'cacnum'=>'string|required',
            'email'=>'string|required',
            'phone'=>'numeric|required',
            'address1'=>'string|required',
            'city'=>'string|required',
            'state'=>'string|required',
            'country'=>'string|required'
        ]);
        
        //Company exist
        $exist=Compinfo::where('id',$request->post('id'))->exists();

        if($exist){
            $company = Compinfo::find($request->post('id'));
            $company->ctname = $request->post('ctname');
            $company->cac_num = $request->post('cacnum');
            $company->email = $request->post('email');
            $company->phone_no = $request->post('phone');
            $company->addressln1 = $request->post('address1');
            $company->city = $request->post('city');
            $company->state = $request->post('state');
            $company->country = $request->post('country');

            if($company->save()){
                return redirect()->route('company.list')->with(['success'=>'Company updated successfully!']);
            }else{
                return redirect()->route('company.add')->with(['danger'=>'Company NOT updated!']);  
            }
        }else{
            return redirect()->route('company.add')->with(['warning'=>'Company already exist!']);  
        }

    }

    public function updateImg(Request $request, $id)
    {
        $img_url = $this->getSingleImg($request, 'image');

        //Company exist
        $imgQuery=Compinfo::where('id',$id);

        //check previous image
        $previmg = $imgQuery->get(['img_url']);

        //dd($previmg[0]['img_url']);

        if($previmg[0]['img_url']!=="nil"){
             unlink($previmg[0]['img_url']);
        }

        if($imgQuery->exists()){

            $uploadImg = $imgQuery->update(['img_url'=>$img_url]);

            if($uploadImg){
                return redirect()->route('company.details', ['id'=>$id])->with(['success'=>'Company Logo updated successfully!']);
            }else{
                return redirect()->route('company.details', ['id'=>$id])->with(['warning'=>'Company Logo NOT updated!']);  
            }
        }else{
            return redirect()->route('company.details', ['id'=>$id])->with(['danger'=>'Company does NOT exist!']);  
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
        $imgQuery=Compinfo::where('id',$id);

        //check previous image
        $previmg = $imgQuery->get(['img_url']);

        //dd($previmg[0]['img_url']);

        if($previmg[0]['img_url']!=="nil"){
             unlink($previmg[0]['img_url']);
        }

        if($imgQuery->exists()){
            $company = Compinfo::find($id);

            if($company->delete()){
                return redirect()->route('company.list')->with(['success'=>'Company deleted successfully!']);
            }else{
                return redirect()->route('company.list')->with(['danger'=>'Company NOT deleted!']);  
            }
        }else{
            return redirect()->route('company.list')->with(['warning'=>'Company does Not exist!']);  
        }
    }
}

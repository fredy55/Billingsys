<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servcat;

class ServcatController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servcat=Servcat::all();
        
        return view('admin.servicat.list', ['servcat'=>$servcat]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicat.create');
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
            'catname'=>'string|required',
            'catdesc'=>'string|required',
        ]);
        
        //product does not exist
        $exist=Servcat::where('category',$request->post('catname'))->doesntExist();

        if($exist){
            $cat = new Servcat;
            $cat->category_id = date('Gis',time());
            $cat->category = $request->post('catname');
            $cat->description = $request->post('catdesc');

            if($cat->save()){
                return redirect()->route('service.category.list')->with(['success'=>'Service category added successfully!']);
            }else{
                return redirect()->route('service.category.add')->with(['danger'=>'Service category NOT added!']);  
            }
        }else{
            return redirect()->route('service.category.add')->with(['warning'=>'Service category already exist!']);  
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product=Servcat::where('product_id', $id)->first(); //when using product_id
        $product=Servcat::find($id);

        return view('details', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Servcat::find($id);

        return view('admin.servicat.edit', ['category'=>$category]);
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
       $this->validate($request,[
            'catname'=>'string|required',
            'catdesc'=>'string|required',
        ]);
        
        //product does not exist
        $exist=Servcat::where('id',$request->post('id'))->exists();

        if($exist){
            $cat = Servcat::find($request->post('id'));
            $cat->category = $request->post('catname');
            $cat->description = $request->post('catdesc');

            if($cat->save()){
                return redirect()->route('service.category.list')->with(['success'=>'Service category updated successfully!']);
            }else{
                return redirect()->route('service.category.edit',['id'=>$request->post('id')])->with(['danger'=>'Service category NOT updated!']);  
            }
        }else{
            return redirect()->route('service.category.edit',['id'=>$request->post('id')])->with(['warning'=>'Service category does Not exist!']);  
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
        $exist=Servcat::where('id',$id)->exists();

        if($exist){
            $cat = Servcat::find($id);

            if($cat->delete()){
                return redirect()->route('service.category.list')->with(['success'=>'Service category deleted successfully!']);
            }else{
                return redirect()->route('service.category.list')->with(['danger'=>'Service category NOT deleted!']);  
            }
        }else{
            return redirect()->route('service.category.list')->with(['warning'=>'Service category does Not exist!']);  
        }
    }
}

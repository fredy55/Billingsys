<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;

class ServicesController extends Controller
{
    //Admin authentication
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$services=Services::all();
        
        $services= DB::table('service')
                        ->where('servicat.IsActive', '=', 1)
                        ->orderBy('sname', 'asc')
                        ->leftJoin('servicat', 'servicat.category_id', '=', 'service.category_id')
                        ->select('service.*','servicat.category','servicat.category_id')
                        ->get();
        
        return view('admin.services.list', ['services'=>$services]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $services= DB::table('servicat')
                        ->where('servicat.IsActive', '=', 1)
                        ->orderBy('category', 'asc')
                        ->select('servicat.category','servicat.category_id')
                        ->get();

        return view('admin.services.create', ['services'=>$services]);
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
            'servname'=>'string|required',
            'servcat'=>'string|required',
            'servprice'=>'numeric|required',
            'servdesc'=>'string|required',
        ]);
        
        //product does not exist
        $exist=Services::where('sname',$request->post('servname'))->doesntExist();

        if($exist){
            $serv = new Services;
            $serv->service_id = date('Gis',time());
            $serv->category_id = $request->post('servcat');
            $serv->sname = $request->post('servname');
            $serv->price = $request->post('servprice');
            $serv->description = $request->post('servdesc');

            if($serv->save()){
                return redirect()->route('service.list')->with(['success'=>'Service added successfully!']);
            }else{
                return redirect()->route('service.add')->with(['danger'=>'Service NOT added!']);  
            }
        }else{
            return redirect()->route('service.add')->with(['warning'=>'Service already exist!']);  
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
        //$product=Services::where('product_id', $id)->first(); //when using product_id
        $product=Services::find($id);

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
        $serv=DB::table('service')
                    ->where('service.id', $id)
                    ->where('service.IsActive', 1)
                    ->leftJoin('servicat', 'servicat.category_id', '=', 'service.category_id')
                    ->select('service.*','servicat.category','servicat.category_id')
                    ->get();
        //var_dump($serv[0]->sname); exit();

        $services= DB::table('servicat')
                        ->where('servicat.IsActive', '=', 1)
                        ->orderBy('category', 'asc')
                        ->select('servicat.category','servicat.category_id')
                        ->get();

        return view('admin.services.edit', ['services'=>$services,'serv'=>$serv]);
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
            'servname'=>'string|required',
            'servcat'=>'string|required',
            'servprice'=>'numeric|required',
            'servdesc'=>'string|required',
        ]);
        
        //Service exist
        $exist=Services::where('id',$request->post('id'))->exists();

        if($exist){
            $serv = Services::find($request->post('id'));
            $serv->service_id = date('Gis',time());
            $serv->category_id = $request->post('servcat');
            $serv->sname = $request->post('servname');
            $serv->price = $request->post('servprice');
            $serv->description = $request->post('servdesc');

            if($serv->save()){
                return redirect()->route('service.list')->with(['success'=>'Service updated successfully!']);
            }else{
                return redirect()->route('service.add')->with(['danger'=>'Service NOT updated!']);  
            }
        }else{
            return redirect()->route('service.add')->with(['warning'=>'Service already exist!']);  
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
        $exist=Services::where('id',$id)->exists();

        if($exist){
            $serv = Services::find($id);

            if($serv->delete()){
                return redirect()->route('service.list')->with(['success'=>'Service deleted successfully!']);
            }else{
                return redirect()->route('service.list')->with(['danger'=>'Service NOT deleted!']);  
            }
        }else{
            return redirect()->route('service.list')->with(['warning'=>'Service does Not exist!']);  
        }
    }
}

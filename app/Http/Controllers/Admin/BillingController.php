<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Billingitem;
use App\Models\Compinfo;
use App\Models\Clients;
use App\Models\Services;

class BillingController extends Controller
{
    public $data = [];
    //Admin authentication
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $compinfo=Compinfo::all();
        
        return view('admin.billings.list', ['compinfo'=>$compinfo]); 
    }

    public function addBill(Request $request, $id)
    { 
        $data['services'] = Services::where('IsActive', 1)->get(['service_id', 'sname','price','description']);
        $data['client'] = Clients::find($id);
        $data['compinfo'] = Compinfo::find($data['client']['compId']);

        //dd($val);
        return view('admin.billings.create',$data);
    }

    public function getBillOptions(Request $request)
    { 
        $service = Services::where('service_id', $request->input('code'))->get(['service_id', 'sname','price','description']);

        return response()->json($service);
    }

    public function saveBill(Request $request)
    { 
        //validate form data
        $this->validate($request,[
            'clientId'=>'numeric|required',
            'totCost'=>'numeric|required',
        ]);
        
        //product does not exist
        //$exist=Clients::where('email', $request->post('email'))->doesntExist();
        $bill_no = date('Gis');

        $bills = new Billing;
        $bills->bill_no = $bill_no;
        $bills->client_id = $request->post('clientId');
        $bills->type = 'Web';
        $bills->total_amt = $request->post('totCost');
        $bills->amt_paid = 0;
        $bills->balance = $request->post('totCost');

        if($bills->save()){
           for($i=0; $i<count($request->post('name')); ++$i){
                $billItem = new Billingitem;
                $billItem->bill_no = $bill_no;
                $billItem->service_id = $request->post('servId')[$i];
                $billItem->item = $request->post('name')[$i];
                $billItem->price = $request->post('price')[$i];
                $billItem->quantity = $request->post('qty')[$i];
                $billItem->total = $request->post('total')[$i];
                $billItem->save();
           }
            
            return redirect()->route('clients.list')->with(['success'=>'Clients added successfully!']);
        }else{
            return redirect()->route('clients.add')->with(['danger'=>'Clients NOT added!']);  
        }
    }
    
}

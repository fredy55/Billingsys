<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Billingitem;
use App\Models\Clients;
use App\Models\Compinfo;
use App\Models\Services;

class BillingController extends Controller
{
    public $data = [];
    //Admin authentication
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }
    
    public function index()
    {
        $billinfo=Billing::all();
        
        return view('admin.billings.list', ['billinfo'=>$billinfo]); 
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
            'amtpaid'=>'numeric|required',
            'totbal'=>'numeric|required',
        ]);
        
        //product does not exist
        //$exist=Clients::where('email', $request->post('email'))->doesntExist();
        $bill_no = date('Gis');

        $bills = new Billing;
        $bills->bill_no = $bill_no;
        $bills->client_id = $request->post('clientId');
        $bills->type = 'Web';
        $bills->total_amt = $request->post('totCost');
        $bills->amt_paid = $request->post('amtpaid');
        $bills->balance = $request->post('totbal');

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

           return response()->json(['status' => 'success', 'message' => 'Bills saved successfully!', 'billno' => $bill_no]);
        }else{
            return response()->json(['status' => 'failed', 'message' => 'An error occurred please try again ']);
        }
    }

    public function payUpdate(Request $request)
    { 
        //validate form data
        $this->validate($request,[
            'totgrand'=>'numeric|required',
            'id'=>'numeric|required',
            'totpay'=>'numeric|required',
            'baltot'=>'numeric|required',
            'payamt'=>'numeric|required',
        ]);
        
        
        $bills = Billing::find($request->post('id'));
        $bills->amt_paid = $request->post('totpay') + $request->post('payamt');
        $bills->balance = $request->post('totgrand') - ($request->post('totpay') + $request->post('payamt'));
        $bills->updated_at = date("Y-m-d h:i:s");

        if($bills->save()){
            return redirect()->route('bills.details', ['id'=>$bills->bill_no])->with(['success'=>'Billing updated successfully!']);
        }else{
            return redirect()->route('bills.details', ['id'=>$bills->bill_no])->with(['success'=>'Billing NOT updated!']);
        }
    }

    public function show($id)
    {
        $data['bllinfo'] = Billing::where(['IsActive' => 1, 'bill_no'=>$id])->get(['id','client_id', 'bill_no', 'total_amt', 'amt_paid','balance']);

        $data['billitems'] = Billingitem::select('billing_items.bill_no','service.sname','service.description','billing_items.price','billing_items.quantity','billing_items.total')
                                          ->join('service', 'service.service_id', '=', 'billing_items.service_id')
                                          ->where('billing_items.bill_no', $data['bllinfo'][0]->bill_no)
                                          ->get();

        $data['client'] = Clients::find($data['bllinfo'][0]->client_id);
        $data['compinfo'] = Compinfo::find($data['client']['compId']);

        //dd($data['bllinfo'][0]->total_amt);
        
        return view('admin.billings.details',$data); 
    }

    public function generateInvc($id)
    {
        $data['bllinfo'] = Billing::where(['IsActive' => 1, 'bill_no'=>$id])->get(['client_id', 'bill_no', 'total_amt', 'amt_paid','balance']);

        $data['billitems'] = Billingitem::select('billing_items.bill_no','service.sname','service.description','billing_items.price','billing_items.quantity','billing_items.total')
                                          ->join('service', 'service.service_id', '=', 'billing_items.service_id')
                                          ->where('billing_items.bill_no', $data['bllinfo'][0]->bill_no)
                                          ->get();

        $data['client'] = Clients::find($data['bllinfo'][0]->client_id);
        $data['compinfo'] = Compinfo::find($data['client']['compId']);

        //dd($data['bllinfo'][0]->total_amt);
        
        return view('admin.billings.invoice',$data); 
    }
    
    public function generateRecpt($id)
    {
        $data['bllinfo'] = Billing::where(['IsActive' => 1, 'bill_no'=>$id])->get();

        $data['billitems'] = Billingitem::select('billing_items.bill_no','service.sname','service.description','billing_items.price','billing_items.quantity','billing_items.total')
                                          ->join('service', 'service.service_id', '=', 'billing_items.service_id')
                                          ->where('billing_items.bill_no', $data['bllinfo'][0]->bill_no)
                                          ->get();

        $data['client'] = Clients::find($data['bllinfo'][0]->client_id);
        $data['compinfo'] = Compinfo::find($data['client']['compId']);

        //dd($data['bllinfo'][0]->total_amt);
        
        return view('admin.billings.receipt',$data); 
    }

    public function destroy($id)
    {
        $billQuery=Billing::where('bill_no', $id);
        $bitemQuery=Billingitem::where('bill_no', $id);

        if($billQuery->exists()){
            $delbill= $billQuery->delete();
            $delbitem= $bitemQuery->delete();

            if($delbill && $delbitem){
                
                return redirect()->route('bills.list')->with(['success'=>'Billing deleted successfully!']);
            }else{
                return redirect()->route('bills.details', ['id'=>$id])->with(['warning'=>'Billing NOT deleted!']);
            }
        }else{
            return redirect()->route('bills.details', ['id'=>$id])->with(['danger'=>'An error occured! Please, try again.']);
        }
        
    }
    
}

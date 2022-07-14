<?php

namespace App\Http\Controllers;
use App\Models\invoice;
use Illuminate\Http\Request;

class invoiceController extends Controller
{
    public function invoices(Request $request, invoice $invoice)
    {
        $statuses=[];
        if(!empty($request->status_draft)){
                array_push($statuses,$request->status_draft);  
        }
        if(!empty($request->status_sent)){
                array_push($statuses,$request->status_sent);  
        }
        if(!empty($request->status_accepted)){
                array_push($statuses,$request->status_accepted);  
        }
        if(!empty($request->status_decline)){
                array_push($statuses,$request->status_decline);  
        }
        if(!empty($request->status_aged)){
                array_push($statuses,$request->status_aged);  
        }
        if(empty($request->date)==true){
                return $invoice->where('company', 'like', '%'.$request->search.'%')->whereIn('status',$statuses)->paginate(10);
        }else{
                return $invoice->where('company', 'like', '%'.$request->search.'%')->where('date', $request->date)->whereIn('status',$statuses)->paginate(10);
        }


                  
    }

    public function addinvoice(Request $request, invoice $invoice )
    {

            return $invoice->insert([
                        'date' => $request->date,
                        'company' => $request->company,
                        'contact' => $request->contact,
                        'description' => $request->description,
                        'invoice_address' => $request->invoice_address,
                        'site_address' => $request->site_address,
                        'assign_user' => $request->assign_user,
                        'linkedjob'=>$request->linkedjob,
                        'status' => $request->status,
                        'quote_no' => $request->quote_no,
                        'net' => $request->net
                    ]);

        
    }

    public function deleteinvoice(Request $request, invoice $invoice )
    {
            $result= $invoice->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getinvoice(Request $request, invoice $invoice )
    {
            return $invoice->where('id',$request->id)->first();
 
    }

    public function updateinvoice(Request $request, invoice $invoice )
    {
            $result= $invoice->where('id',$request->id)->update([
                        'date' => $request->date,
                        'company' => $request->company,
                        'contact' => $request->contact,
                        'description' => $request->description,
                        'invoice_address' => $request->invoice_address,
                        'site_address' => $request->site_address,
                        'assign_user' => $request->assign_user,
                        'linkedjob'=>$request->linkedjob,
                        'status' => $request->status,
                        'quote_no' => $request->quote_no,
                        'net' => $request->net
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }
}

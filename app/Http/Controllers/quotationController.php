<?php

namespace App\Http\Controllers;
use App\Models\quotation;
use Illuminate\Http\Request;

class quotationController extends Controller
{
        
    public function quotations(Request $request, quotation $quote)
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
                return $quote->where('company', 'like', '%'.$request->search.'%')->whereIn('status',$statuses)->paginate(10);
        }else{
                return $quote->where('company', 'like', '%'.$request->search.'%')->where('date', $request->date)->whereIn('status',$statuses)->paginate(10);
        }


                  
    }

    public function addquotation(Request $request, quotation $quote )
    {

            return $quote->insert([
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
                        'next' => $request->next
                    ]);

        
    }

    public function deletequotation(Request $request, Quotation $quote )
    {
            $result= $quote->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getquotation(Request $request, Quotation $quote )
    {
            return $quote->where('id',$request->id)->first();
 
    }

    public function updatequotation(Request $request, Quotation $quote )
    {
            $result= $quote->where('id',$request->id)->update([
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
                        'next' => $request->next
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }
}

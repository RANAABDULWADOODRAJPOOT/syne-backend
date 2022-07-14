<?php

namespace App\Http\Controllers;
use App\Models\businessinfo;
use App\Models\branding;
use Illuminate\Http\Request;

class businessController extends Controller
{
    public function getBusinessInfo(businessinfo $businessinformation){
        return $businessinformation->first();
    }

    public function insertBusinessInfo(businessinfo $businessinformation){
        $result = $businessinformation->insert([
            'businessname' => $request->date,
            'moto' => $request->company,
            'address1' => $request->contact,
            'address2' => $request->description,
            'address3' => $request->invoice_address,
            'town' => $request->site_address,
            'country' => $request->assign_user,
            'state'=>$request->linkedjob,
            'postCode' => $request->status,
            'town' => $request->quote_no,
            'tel' => $request->net,
            'mob' => $request->mob,
            'email' => $request->email,
            'fax' => $request->fax,
            'tax_number' => $request->tax_number,
            'company_number' => $request->company_number
        ]);

        if($result==1){  
            return response()->json([ 'message' => 'Successfull'], 200);
        }else{
            return response()->json([ 'message' => 'Error'], 403);
        }
    }

    public function updateBusinessInfo(Request $request){

        $result= $businessinformation->where('id', $request->id)->update([
            'businessname' => $request->businessname,
            'moto' => $request->moto,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'address3' => $request->address3,
            'country' => $request->country,
            'state'=> $request->state,
            'postCode' => $request->postCode,
            'town' => $request->town,
            'tel' => $request->tel,
            'mob' => $request->mob,
            'email' => $request->email,
            'fax' => $request->fax,
            'tax_number' => $request->tax_number,
            'company_number' => $request->company_number
        ]);
        
        if($result==1){  
            return response()->json([ 'message' => 'Successfull'], 200);
        }else{
            return response()->json([ 'message' => 'Error'], 403);
        }
    }
}

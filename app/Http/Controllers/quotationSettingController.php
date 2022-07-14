<?php

namespace App\Http\Controllers;
use App\Models\quotationdefault;
use App\Models\customquotationfields;
use App\Models\customquotationfieldlabels;
use App\Models\customquotationlineitemlabels;
use App\Models\quotationshowhideeditfields;
use App\Models\quotationshowhidelineitemcolumns;
use App\Models\quotationshowhidelistcolumns;
use App\Models\quotationpdfsettings;
use App\Models\quotationstatuses;

use Illuminate\Http\Request;

class quotationSettingController extends Controller
{

    public function getquotationdefault(Request $request, quotationdefault $qdefault)
    {
                return $qdefault->paginate(10);
    }

    public function addquotationdefault(Request $request, quotationdefault $qdefault )
    {
            $result= $qdefault->insert([
                        'startreference' => $request->startreference,
                        'startingnumber' => $request->startingnumber,
                        'valid_days' => $request->valid_days,
                        'auto_depreceation_old_version' => $request->auto_depreceation_old_version,
                        'note' => $request->note,
                        'allow_company_customization_quotations' => $request->allow_company_customization_quotations,
                        'allow_company_customization_line_items' => $request->allow_company_customization_line_items,
                        'allow_company_to_deselect_section'=>$request->allow_company_to_deselect_section,
                        'customize_version_checked' => $request->customize_version_checked,
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function updatequotationdefault(Request $request, quotationdefault $qdefault )
    {
            $result= $qdefault->where('id',$request->id)->update([
                        'startreference' => $request->startreference,
                        'startingnumber' => $request->startingnumber,
                        'valid_days' => $request->valid_days,
                        'auto_depreceation_old_version' => $request->auto_depreceation_old_version,
                        'note' => $request->note,
                        'allow_company_customization_quotations' => $request->allow_company_customization_quotations,
                        'allow_company_customization_line_items' => $request->allow_company_customization_line_items,
                        'allow_company_to_deselect_section'=>$request->allow_company_to_deselect_section,
                        'customize_version_checked' => $request->customize_version_checked,
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function deletequotationdefault(Request $request, quotationdefault $qdefault )
    {
            $result= $qdefault->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }



    // Custom Quotation Field


    public function getcustomequotationfields(Request $request, customquotationfields $quotationfields)
    {
                return $quotationfields->paginate(10);
    }


    public function addcustomequotationfields(Request $request, customquotationfields $quotationfields )
    {

            return $quotationfields->insert([
                        'type' => $request->type,
                        'tagname' => $request->tagname,
                        'labelnameonscreen' => $request->labelnameonscreen,
                        'net' => $request->net
                    ]);

        
    }

    public function deletecustomequotationfields(Request $request, customquotationfields $quotationfields )
    {
            $result= $quotationfields->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getcustomequotationfield(Request $request, customquotationfields $quotationfields)
    {
            return $quotationfields->where('id',$request->id)->first();
 
    }

    public function updatecustomequotationfields(Request $request, customquotationfields $quotationfields)
    {
            $result= $quotationfields->where('id',$request->id)->update([
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


    // Custom Quotation Field Labels


    public function getcustomequotationfieldlabels(Request $request, customquotationfieldlabels $quotationfieldslabels)
    {
                return $quotationfieldslabels->paginate(10);
    }


    public function addcustomefieldlabel(Request $request, customquotationfieldlabels $quotationfieldslabels )
    {

            return $quotationfieldslabels->insert([
                        'field' => $request->type,
                        'label' => $request->tagname,
                    ]);

        
    }

    public function deletecustomequotationfieldlabel(Request $request, customquotationfieldlabels $quotationfieldslabels )
    {
            $result= $quotationfieldslabels->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getcustomequotationfieldlabel(Request $request, customquotationfieldlabels $quotationfieldslabels)
    {
            return $quotationfieldslabels->where('id',$request->id)->first();
 
    }

    public function updatecustomequotationfieldlabel(Request $request, customquotationfieldlabels $quotationfieldslabels )
    {
            $result= $quotationfieldslabels->where('id',$request->id)->update([
                'field' => $request->type,
                'label' => $request->tagname,
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }



    // Custom Quotation Field Line Items Labels


    public function getcustomequotationfieldlineitems(Request $request, customquotationlineitemlabels $quotationfieldslabels)
    {
                return $quotationfieldslabels->paginate(10);
    }


    public function addcustomefieldlineitems(Request $request, customquotationlineitemlabels $quotationfieldslabels )
    {

            return $quotationfieldslabels->insert([
                        'field' => $request->type,
                        'label' => $request->tagname,
                    ]);

        
    }

    public function deletecustomequotationfieldlineitems(Request $request, customquotationlineitemlabels $quotationfieldslabels )
    {
            $result= $quotationfieldslabels->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getcustomequotationfieldlineitem(Request $request, customquotationlineitemlabels $quotationfieldslabels)
    {
            return $quotationfieldslabels->where('id',$request->id)->first();
 
    }

    public function updatecustomequotationfieldlineitems(Request $request, customquotationlineitemlabels $quotationfieldslabels )
    {
            $result= $quotationfieldslabels->where('id',$request->id)->update([
                'field' => $request->type,
                'label' => $request->tagname,
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    // Quotation Show Hide List Columns


    public function getshowhidelistcolumns(Request $request, quotationshowhidelistcolumns $quote)
    {
                return $quote->paginate(10);
    }


    public function addshowhidelistcolumns(Request $request, quotationshowhidelistcolumns $quote )
    {

            return $quote->insert([
                'name' => $request->name,
                'customfields' => $request->customfields,
                'search_page' => $request->search_page,
                    ]);

        
    }

    public function deleteshowhidelistcolumns(Request $request, quotationshowhidelistcolumns $quote )
    {
            $result= $quote->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getshowhidelistcolumn(Request $request, quotationshowhidelistcolumns $quote)
    {
            return $quote->where('id',$request->id)->first();
 
    }

    public function updateshowhidelistcolumns(Request $request, quotationshowhidelistcolumns $quote )
    {
            $result= $quote->where('id',$request->id)->update([
                'name' => $request->name,
                'customfields' => $request->customfields,
                'search_page' => $request->search_page,
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }




    // Quotation Show Hide Edit Fields


    public function getshowhideeditfields(Request $request, quotationshowhideeditfields $quote)
    {
                return $quote->paginate(10);
    }


    public function addshowhideeditfields(Request $request, quotationshowhideeditfields $quote )
    {

            return $quote->insert([
                'name' => $request->name,
                'customfields' => $request->customfields,
                'search_page' => $request->search_page,
                    ]);

        
    }

    public function deleteshowhideeditfields(Request $request, quotationshowhideeditfields $quote )
    {
            $result= $quote->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getshowhideeditfield(Request $request, quotationshowhideeditfields $quote)
    {
            return $quote->where('id',$request->id)->first();
 
    }

    public function updateshowhideeditfields(Request $request, quotationshowhideeditfields $quote )
    {
            $result= $quote->where('id',$request->id)->update([
                'name' => $request->name,
                'customfields' => $request->customfields,
                'search_page' => $request->search_page,
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }


    // Quotation Show Hide Line Items


    public function getshowhidelineitemcolumns(Request $request, quotationshowhidelineitemcolumns $quote)
    {
                return $quote->paginate(10);
    }


    public function addshowhidelineitemcolumns(Request $request, quotationshowhidelineitemcolumns $quote )
    {

            return $quote->insert([
                'name' => $request->name,
                'customfields' => $request->customfields,
                'search_page' => $request->search_page,
                    ]);

        
    }

    public function deleteshowhidelineitemcolumns(Request $request, quotationshowhidelineitemcolumns $quote )
    {
            $result= $quote->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getshowhidelineitemcolumn(Request $request, quotationshowhidelineitemcolumns $quote)
    {
            return $quote->where('id',$request->id)->first();
 
    }

    public function updateshowhidelineitemcolumns(Request $request, quotationshowhidelineitemcolumns $quote )
    {
            $result= $quote->where('id',$request->id)->update([
                'name' => $request->name,
                'customfields' => $request->customfields,
                'search_page' => $request->search_page,
        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }


    // Quotation PDF Template


    public function getpdftsettings(Request $request, quotationpdfsettings $quote)
    {
                return $quote->paginate(10);
    }


    public function addpdftsettings(Request $request, quotationpdfsettings $quote )
    {

            return $quote->insert([
                'format' => $request->format,
                'file_name' => $request->file_name,
                'archive' => $request->archive,
                'size' => $request->size,
                    ]);

        
    }

    public function deletepdftsettings(Request $request, quotationpdfsettings $quote )
    {
            $result= $quote->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getpdftsetting(Request $request, quotationpdfsettings $quote)
    {
            return $quote->where('id',$request->id)->first();
 
    }

    public function updatepdftsettings(Request $request, quotationpdfsettings $quote )
    {
            $result= $quote->where('id',$request->id)->update([
                'format' => $request->format,
                'file_name' => $request->file_name,
                'archive' => $request->archive,
                'size' => $request->size,

        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }



    // Quotation Statuese


    public function getstatuses(Request $request, quotationstatuses $quote)
    {
                return $quote->paginate(10);
    }


    public function addstatuses(Request $request, quotationstatuses $quote )
    {

            return $quote->insert([
                'default_name' => $request->default_name,
                'name' => $request->name,
                'hex' => $request->hex,
                'format' => $request->format,
                'description' => $request->description,
                'note' => $request->note,
                'show' => $request->show,
                'edit' => $request->edit,
                    ]);

        
    }

    public function deletestatuses(Request $request, quotationstatuses $quote )
    {
            $result= $quote->find($request->id)->delete();
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }

    public function getstatuse(Request $request, quotationstatuses $quote)
    {
            return $quote->where('id',$request->id)->first();
 
    }

    public function updatestatuses(Request $request, quotationstatuses $quote )
    {
            $result= $quote->where('id',$request->id)->update([
                'default_name' => $request->default_name,
                'name' => $request->name,
                'hex' => $request->hex,
                'format' => $request->format,
                'description' => $request->description,
                'note' => $request->note,
                'show' => $request->show,
                'edit' => $request->edit,

        ]);
            if($result==1){  
                return response()->json([ 'message' => 'Successfull'], 200);
            }else{
                return response()->json([ 'message' => 'Error'], 403);
            }
 
    }
}

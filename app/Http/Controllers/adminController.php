<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\contact;
use App\Models\tax;

class adminController extends Controller
{
    public function getCompanies()
    {
        $companies = company::select('*')
                            ->get();
        return response(['data'=> $companies, 'Message'=> 'Data Fetched.']);
    }

    public function addCompany(Request $request)
    {   
        $validatedData = $request->validate([
            'company'=>'required',
            'parent_company' => 'required',
            'town' => 'required',
            'address' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'tags' => 'required'
        ]);

        $company = company::create($validatedData);

        return response(['data'=> $company, 'Message'=> 'New Company Added']);
    }

    public function updateCompany(Request $request,$id)
    {   
        $company = company::find($id);
        
        $company->update($request->post());

        return response(['data'=> $company, 'Message'=> 'Company updated']);
    }

    public function deleteCompany($id)
    {
        $company = new company();
        $company::destroy($id);
        return response(['message'=>'Company and all its related data deleted.']);
    }

    // -------------------------------------------------
    public function getContacts()
    {
        $contacts = contact::select('*')
                            ->get();
        return response(['data'=> $contacts, 'Message'=> 'Data Fetched.']);
    }

    public function addContact(Request $request)
    {   
        $validatedData = $request->validate([
            'title'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'company'=>'required',
            'town'=>'required',
            'address'=>'required',
            'email'=>'required',
            'telephone'=>'required',
            'mobile'=>'required',
            'tags'=>'required'
        ]);

        $contact = contact::create($validatedData);

        return response(['data'=> $contact, 'Message'=> 'New Contact Added']);
    }

    public function updateContact(Request $request,$id)
    {   
        $contact = contact::find($id);
        
        $contact->update($request->post());

        return response(['data'=> $contact, 'Message'=> 'Contact updated']);
    }

    public function deleteContact($id)
    {
        $contact = new contact();
        $contact::destroy($id);
        return response(['message'=>'Contact and all its related data deleted.']);
    }

    // -------------------------------------------------
    public function getTaxes()
    {
        $tax = tax::select('*')
                            ->get();
        return response(['data'=> $tax, 'Message'=> 'Data Fetched.']);
    }

    public function addTax(Request $request)
    {   
        $validatedData = $request->validate([
            'code'=>'required',
            'description'=>'required',
            'rate'=>'required'
        ]);

        $tax = tax::create($validatedData);

        return response(['data'=> $tax, 'Message'=> 'New Tax Added']);
    }

    public function updateTax(Request $request,$id)
    {   
        $tax = tax::find($id);
        
        $tax->update($request->post());

        return response(['data'=> $tax, 'Message'=> 'Tax updated']);
    }

    public function deleteTax($id)
    {
        $tax = new tax();
        $tax::destroy($id);
        return response(['message'=>'Tax and all its related data deleted.']);
    }
}

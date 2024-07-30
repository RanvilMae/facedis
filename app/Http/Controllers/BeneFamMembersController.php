<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BeneficiaryFamMember;
use App\Models\AuditLogs;

class BeneFamMembersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $companies = Company::orderBy('id','desc')->paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('companies.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
       try{

            $benefam = new BeneficiaryFamMember;
            $benefam->id = NULL;
            $benefam->uuid = uniqid();;
            $benefam->serial_no = $request->serial_no;
            $benefam->first_name = strip_tags($request->first_name);
            $benefam->middle_name = strip_tags($request->middle_name);
            $benefam->last_name = strip_tags($request->last_name);
            $benefam->ext_name = $request->ext_name;
            if($request->rel_hh != NULL){
                $benefam->rel_hh = strip_tags($request->rel_hh);
            }
            $benefam->gender = $request->gender;
            $benefam->civil_status = $request->civil_status;
            if($request->rel_hh != NULL){
                $benefam->educ = strip_tags($request->educ);
            }
            if($request->rel_hh != NULL){
                $benefam->skill = strip_tags($request->skill);
            }
            if($request->rel_hh != NULL){
                $benefam->remarks = strip_tags($request->remarks);
            }
            $benefam->save() or die('ERROR ADDING NEW TAG!'); 

            $log = new AuditLogs;
            $log->id = NULL;
            $log->user_id = 883;
            $log->action = 'BENE_CRUD';
            $log->log = 'Add beneficiary family member/s';
            $log->reference_id = $benefam->id;
            $log->save() or die('ERROR ADDING NEW TAG!');


            return redirect()->route('beneficiary_roster.index')->with('success','Beneficiary family member has been submitted successfully!');
       } catch (Exception $e) {
           $error_code = $e->errorInfo[1];
           return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
       }
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }
}
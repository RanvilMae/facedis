<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AuditLogs;
use App\Models\UserList;
use App\Models\BeneficiaryRoster;
use App\Models\Employees;


class AuditLogsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $title = "AUDIT LOGS";
            $title2 = "LIST";
            $users = Userlist::get();
            $employees = Employees::orderby('name', 'ASC')->get();
            return view('logs.index', compact('title','title2', 'session','users', 'employees'));
        }
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
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
           try{

                $benefam = new AuditLogs;
                $benefam->id = NULL;
                $benefam->user_id = $user_id;
                $benefam->action = $request->action;
                $benefam->log = $request->log;
                $benefam->reference_id = $request->reference_id;
                $benefam->save() or die('ERROR ADDING NEW TAG!'); 
                return redirect()->route('beneficiary_roster.index')->with('success','Beneficiary family member has been submitted successfully!');
           } catch (Exception $e) {
               $error_code = $e->errorInfo[1];
               return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
           }
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
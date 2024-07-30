<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AssistanceRecords;
use App\Models\AuditLogs;
use App\Models\UserList;

class AssistanceProviderController extends Controller
{
  
    public function store(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
           try{

                $benefam = new AssistanceRecords;
                $benefam->id = NULL;
                $benefam->uuid = uniqid();;
                $benefam->serial_no = $request->serial_no;
                $benefam->beneficiary_id = strip_tags($request->beneficiary_id);
                $benefam->kind_type = strip_tags($request->kind_type);
                $benefam->date = $request->date;
                $benefam->qty = $request->qty;
                $benefam->unit = $request->unit;
                $benefam->cost = $request->cost;
                $benefam->provider = strip_tags($request->provider);
                $benefam->save() or die('ERROR ADDING NEW TAG!'); 

                $log = new AuditLogs;
                $log->id = NULL;
                $log->user_id = 883;
                $log->action = 'ASSISTANCE_RECORD';
                $log->log = 'Add assistance provided'; 
                $log->reference_id = $benefam->id;
                $log->save() or die('ERROR ADDING NEW TAG!');


                return redirect()->route('beneficiary_roster.index')->with('success','Assistance provided has been submitted successfully!');
           } catch (Exception $e) {
               $error_code = $e->errorInfo[1];
               return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
           }
       }
    }

}
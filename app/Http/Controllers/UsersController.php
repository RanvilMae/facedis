<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AuditLogs;
use App\Models\UserList;
use App\Models\BeneficiaryRoster;
use App\Models\Employees;

class UsersController extends Controller
{
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

    public function store(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{

           try{
            $check = Userlist::where('user_id', $request->id)->first();
            
            if($check == NULL){
                $check_e = Employees::where('id', $request->id)->first();
                    $adduser = new UserList;
                    $adduser->id = NULL;
                    $adduser->uuid = uniqid();
                    $adduser->user_id = $request->id;
                    $adduser->uname = $check_e->username;
                    $adduser->password = 'pass123';
                    $adduser->name = $check_e->name;
                    $adduser->email = $check_e->email;
                    $adduser->user_level = $request->user_level;
                    $adduser->save() or die('ERROR ADDING NEW TAG!'); 

                    $logs = new AuditLogs;
                    $logs->id = NULL;
                    $logs->user_id = $user_id;
                    $logs->action = 'USER_CRUD';
                    $logs->log = 'Added user '.$request->user_level.' with ID no: '.$request->id;
                    $logs->reference_id = $adduser->id;
                    $logs->save() or die('ERROR ADDING NEW TAG!'); 

                    return redirect()->route('users.index')->with('success','User has been submitted successfully!');
            }else{
               return redirect()->route('users.index')->with('error','User alrewdy exists!'); 
            }
               

           } catch (Exception $e) {

               $error_code = $e->errorInfo[1];
               return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
           }
        }
    }

    public function update(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
           $session = Userlist::where('id', $request->id)->update(['name' => $request->name, 'email' => $request->email]);
           return redirect()->route('users.index')->with('success','User has been updated successfully!');
        }
    }

    public function revoke(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $session = Userlist::where('id', $request->id)->update(['user_level' => $request->user_level]);
            $logs = new AuditLogs;
            $logs->id = NULL;
            $logs->user_id = $user_id;
            $logs->action = 'USER_CRUD';
            $logs->log = 'Updated user level '.$request->user_level.' with ID no: '.$request->id;
            $logs->reference_id = $request->id;
            $logs->save() or die('ERROR ADDING NEW TAG!'); 
           return redirect()->route('users.index')->with('success','User has been updated successfully!');
        }
    }

    public function destroy(Request $request)
    {
        Userlist::where('id', $request->id)->delete();
        return redirect()->route('users.index')->with('success','Unit has been deleted successfully');
    }


}

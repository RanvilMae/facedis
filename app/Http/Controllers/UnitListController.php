<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AuditLogs;
use App\Models\UserList;
use App\Models\BeneficiaryRoster;
use App\Models\Employees;
use App\Models\UnitList;

class UnitListController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $title = "UNITS";
            $title2 = "LIST";
            $units = UnitList::get();
            $employees = Employees::orderby('name', 'ASC')->get();
            return view('units.index', compact('title','title2', 'session','units', 'employees'));
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
            $check = Userlist::where('name', strip_tags($request->name))->first();
            
            if($check == NULL){
                    $addunit = new UnitList;
                    $addunit->id = NULL;
                    $addunit->name = strip_tags($request->name);
                    $addunit->save() or die('ERROR ADDING NEW TAG!'); 

                    $logs = new AuditLogs;
                    $logs->id = NULL;
                    $logs->user_id = $user_id;
                    $logs->action = 'UNIT_CRUD';
                    $logs->log = 'Added unit '.$addunit->id;
                    $logs->reference_id = $addunit->id;
                    $logs->save() or die('ERROR ADDING NEW TAG!'); 

                    return redirect()->route('units.index')->with('success','Unit has been submitted successfully!');
            }else{
               return redirect()->route('units.index')->with('error','Unit already exists!'); 
            }
               

           } catch (Exception $e) {

               $error_code = $e->errorInfo[1];
               return redirect()->route('units.index')->with('error','There is something wrong!');
           }
        }
    }

    public function destroy(Request $request)
    {
        UnitList::where('id', $request->id)->delete();
        return redirect()->route('units.index')->with('success','Unit has been deleted successfully');
    }


}

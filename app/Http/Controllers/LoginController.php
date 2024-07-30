<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserList;
use App\Models\Employees;

class LoginController extends Controller
{


    public function index(Request $request)
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $session = UserList::where('uname', strip_tags($request->username))->where('password', $request->password)->first();
        if($session == NULL){
            return redirect('/')->with('error','Login error!');
        }else{
            $user_list = UserList::where('uname', strip_tags($request->username))->where('password', $request->password)->first();

            $request->session()->put('session',$user_list);
            $request->session()->put('user_id',$user_list->user_id);
            $request->session()->put('user_level',$user_list->user_level);
            return redirect()->route('dashboard.index')->with(['session' => $user_list, 'success' => 'Assistance provided has been submitted successfully!']);
        }
    }

    public function logout(Request $request) {
        session_start();
        session_destroy();
        $_SESSION = array();
        $request->session()->flush();
        return redirect('/')->with('success','User logged out!');
    }
}

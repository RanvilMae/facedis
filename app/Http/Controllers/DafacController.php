<?php

namespace App\Http\Controllers;

use App\Models\Dafac_Card;
use App\Models\UserList;
use Illuminate\Http\Request;

class DafacController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $dafac = Dafac_Card::orderBy('created_at','ASC')->get();
            $title = "DAFAC";
            $title2 = "";
            return view('dafac.index', compact('dafac', 'title','title2', 'session'));
        }
    }

    public function create()
    {
        return view('dafac.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'uuid' => 'required',
            'beneficiary_id' => 'required',
            'fam_member' => 'required',
            'description' => 'required',
            'action_by' => 'required',
        ]);
        
        Dafac_Card::create($request->post());

        return redirect()->route('dafac.index')->with('success','Disaster Assistance Family Acces Card has been created successfully.');
    }

    public function show(Dafac_Card $dafac)
    {
        return view('dafac.show',compact('dafac'));
    }

    public function edit(Dafac_Card $dafac)
    {
        return view('dafac.edit',compact('dafac'));
    }

    public function update(Request $request, Dafac_Card $dafac)
    {
        $request->validate([
            'uuid' => 'required',
            'beneficiary_id' => 'required',
            'fam_member' => 'required',
            'description' => 'required',
            'action_by' => 'required',
        ]);
        
        $dafac->fill($request->post())->save();

        return redirect()->route('dafac.index')->with('success','Disaster Assistance Family Acces Card has been updated successfully');
    }

    public function destroy(Dafac_Card $dafac)
    {
        $dafac->delete();
        return redirect()->route('dafac.index')->with('success','Disaster Assistance Family Acces Card has been deleted successfully');
    }





}

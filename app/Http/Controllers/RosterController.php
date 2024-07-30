<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeneficiaryRoster;
use DataTables;
class RosterController extends Controller
{
    public function index(Request $request)
    {
        $rosters = BeneficiaryRoster::orderBy('first_name','ASC')->paginate(20);
        return view('rosters.index', compact('rosters'));
    }

    public function show($id)
    {
        $beneficiary_roster = BeneficiaryRoster::find($id);
        return response()->json($beneficiary_roster);
    }
}

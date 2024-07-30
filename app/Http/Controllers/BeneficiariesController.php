<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\Beneficiaries;
use App\Models\Region;
use App\Models\Province;
use App\Models\CityMun;
use App\Models\Barangay;
use App\Models\Religion;
use App\Models\IPGroup;

use Input;
use Carbon\Carbon;
use Session;
class BeneficiariesController extends Controller
{
   public function index()
    {
        $beneficiaries = Beneficiaries::orderBy('name','ASC')->get();
        $title = "BENEFICIARY ROSTER";
        return view('beneficiaries.index', compact('beneficiaries','title'));
    }

    public function create()
    {
        return view('beneficiaries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'uuid' => 'required',
            'household_id' => 'required',
            'rel_hh' => 'required',
            'bday' => 'required',
            'gender' => 'nullable',
            'civil_status' => 'required',
            'educ' => 'required',
            'skill' => 'required',
            'remarks' => 'required',
        ]);
        
        Beneficiaries::create($request->post());

        return redirect()->route('beneficiaries.index')->with('success','Beneficiary Roster has been created successfully.');
    }

    public function show(Beneficiaries $beneficiaries_rooster)
    {
        return view('beneficiaries.show',compact('beneficiaries'));
    }

    public function edit(Beneficiaries $beneficiaries_rooster)
    {
        return view('beneficiaries.edit',compact('beneficiaries'));
    }

    public function update(Request $request, Beneficiaries $beneficiaries)
    {
        $request->validate([
            'uuid' => 'required',
            'household_id' => 'required',
            'rel_hh' => 'required',
            'bday' => 'required',
            'gender' => 'nullable',
            'civil_status' => 'required',
            'educ' => 'required',
            'skill' => 'required',
            'remarks' => 'required',
        ]);
        
        $beneficiaries->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success','Beneficiary Roster has been updated successfully');
    }

    public function destroy(Beneficiaries $beneficiaries)
    {
        $beneficiaries->delete();
        return redirect()->route('beneficiaries.index')->with('success','Beneficiary Roster has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Exports\RDSExport;
use App\Exports\RDSDailyExport;
use App\Exports\RDSMonthlyExport;
use App\Exports\RDSQuarterlyExport;
use App\Exports\RDSSemestralExport;
use App\Exports\RDSAnnualExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\BeneficiaryRoster;
use App\Models\Region;
use App\Models\Province;
use App\Models\CityMun;
use App\Models\Barangay;
use App\Models\AssistanceRecords;
use App\Models\BeneficiaryFamMember;
use App\Models\Religion;
use App\Models\IPGroup;
use App\Models\UserList;
use App\Models\UnitList;
use App\Models\AuditLogs;

use Input;
use Carbon\Carbon;
use Session;
use PDF;
use DataTables;

use Illuminate\Support\Str;

class BeneficiaryRosterController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $beneficiary_roster = BeneficiaryRoster::orderBy('first_name','ASC')->get();
            if(\request()->ajax()){
                $data = BeneficiaryRoster::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            $regions = Region::orderBy('abbreviation','ASC')->get();
            $provinces = Province::orderBy('province_m','ASC')->get();
            $barangays = Barangay::orderBy('barangay_m','ASC')->get();
            $religions = Religion::orderBy('name','ASC')->get();
            $units = UnitList::orderBy('name','ASC')->get();
            $title = "BENEFICIARY ROSTER"; 
            $title2 = "LIST";
            return view('beneficiary_rosters.index', compact('beneficiary_roster','title','regions','provinces','barangays','religions','title2', 'session','units'));
        }
    }


    public function create()
    {
        return view('beneficiary_rosters.create');
    }



    public function store(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{

                $the_files = $request->file('uploaded_file')->getClientOriginalExtension();
                if($the_files != "xls" AND $the_files != "xlsx"){
                    return redirect()->route('beneficiary_roster.index')->with('error','Wrong file type!');
                }else{
                    $the_file = $request->file('uploaded_file');

                    try{
                        $spreadsheet = IOFactory::load($the_file->getRealPath());
                        $sheetname    = $spreadsheet->getSheetNames();
                        $sheet        = $spreadsheet->getActiveSheet();
                        $startcount = 0;
                        $data = array();

                        if($sheet->getTitle() == 'DAFAC'){
                            $row_limit    = $sheet->getHighestDataRow();
                            $column_limit = $sheet->getHighestDataColumn();
                            $row_range    = range( 8, $row_limit );
                            $column_range = range( 'AC', $column_limit );

                            foreach ( $row_range as $row ) { 
                                $data[] = [
                                   'Serial Number
(Province-City/Municipality-Brgy-Num)' =>$sheet->getCell( 'A' . $row )->getValue(),
                                   'Region' => $sheet->getCell( 'B' . $row )->getValue(),
                                   'Province' => $sheet->getCell( 'C' . $row )->getValue(),
                                   'City / Municipality' => $sheet->getCell( 'D' . $row )->getValue(),
                                   'Barangay' => $sheet->getCell( 'E' . $row )->getValue(),
                                   'Surname' =>$sheet->getCell( 'F' . $row )->getValue(),
                                   'First Name' =>$sheet->getCell( 'G' . $row )->getValue(),
                                   'Middle Name' =>$sheet->getCell( 'H' . $row )->getValue(),
                                   'Ext.Name' =>$sheet->getCell( 'I' . $row )->getValue(),
                                   'Gender' =>$sheet->getCell( 'J' . $row )->getValue(),
                                   'Civil Status' =>$sheet->getCell( 'K' . $row )->getValue(),
                                   'Religion' =>$sheet->getCell( 'L' . $row )->getValue(),
                                   'Date of Birth
(DD/MM/YYYY)' =>$sheet->getCell( 'M' . $row )->getValue(),
                                   'Age' =>$sheet->getCell( 'N' . $row )->getValue(),
                                   'Occupation' =>$sheet->getCell( 'O' . $row )->getValue(),
                                   'Total Monthly Income' =>$sheet->getCell( 'P' . $row )->getValue(),
                                   '4Ps Beneficiary' =>$sheet->getCell( 'Q' . $row )->getValue(),
                                   'IP - Type of Ethnicity' =>$sheet->getCell( 'R' . $row )->getValue(),
                                   'No. of Family Members' =>$sheet->getCell( 'S' . $row )->getValue(),
                                   'House Ownership' =>$sheet->getCell( 'T' . $row )->getValue(),
                                   'Code' =>$sheet->getCell( 'U' . $row )->getValue(),
                                   'Housing Condition' =>$sheet->getCell( 'V' . $row )->getValue(),
                                   'Casualty' =>$sheet->getCell( 'W' . $row )->getValue(),
                                   'Health Condition' =>$sheet->getCell( 'X' . $row )->getValue(),
                                   'Date
(DD/MM/YYYY)' =>$sheet->getCell( 'Y' . $row )->getValue(),
                                   'Kind / Type' =>$sheet->getCell( 'Z' . $row )->getValue(),
                                   'Quantity' =>$sheet->getCell( 'AA' . $row )->getValue(),
                                   'Cost' =>$sheet->getCell( 'AB' . $row )->getValue(),
                                   'Provider' =>$sheet->getCell( 'AC' . $row )->getValue(),
                               ];

                            }//foreach

                            $cnt_data = count($data);
                            for ($cnt=0; $cnt < $cnt_data; $cnt++) {
                                if($data[$cnt]['Serial Number
(Province-City/Municipality-Brgy-Num)'] != NULL){
                                    if($data[$cnt]['Region'] > 9){
                                        $region_c = Region::where('region_c','0'.$data[$cnt]['Region'])->first();
                                    }else{
                                        $region_c = Region::where('region_c',$data[$cnt]['Region'])->first();
                                    }

                                    $province_c = Province::where('province_m',$data[$cnt]['Province'])
                                                ->where('region_c',$region_c->region_c)
                                                ->first();
                                    $citymun_c = CityMun::where('citymun_m',$data[$cnt]['City / Municipality'])
                                                ->where('region_c',$region_c->region_c)
                                                ->where('province_c',$province_c->province_c)
                                                ->first();
                                    $brgy_c = Barangay::where('barangay_m',$data[$cnt]['Barangay'])
                                                ->where('region_c',$region_c->region_c)
                                                ->where('province_c',$province_c->province_c)
                                                ->where('citymun_c',$citymun_c->citymun_c)
                                                ->first();
                                    $religionid = Religion::where('name',$data[$cnt]['Religion'])->first();
                                    if($religionid == NULL){
                                        $religion_id = NULL;
                                    }else{
                                        $religion_id = $religionid->id;
                                    }
                                    if($data[$cnt]['IP - Type of Ethnicity'] == 'N/A' OR $data[$cnt]['IP - Type of Ethnicity'] == NULL){
                                        $ip_group_id = NULL;
                                    }else{
                                        $ip_group_idd = IPGroup::where('name',$data[$cnt]['IP - Type of Ethnicity'])->first();
                                        $ip_group_id = $ip_group_idd->id;
                                    }

                                    $check_ben = BeneficiaryRoster::where('last_name', $data[$cnt]['Surname'])
                                        ->where('first_name', $data[$cnt]['First Name'])
                                        ->where('last_name', $data[$cnt]['Surname'])
                                        ->where('province_c', $province_c->province_c)
                                        ->where('citymun_c', $citymun_c->citymun_c)
                                        ->where('brgy_c', $brgy_c->barangay_c)
                                        ->count();

                                    if($province_c->province_m == 'ILOCOS SUR'){
                                        $prov = 'IS';
                                    }elseif ($province_c->province_m == 'ILOCOS NORTE') {
                                        $prov = 'IN';
                                    }elseif ($province_c->province_m == 'LA UNION') {
                                        $prov = 'LU';
                                    }elseif ($province_c->province_m == 'PANGASINAN') {
                                        $prov = 'PANG';
                                    }else{
                                         $prov = $province_c->province_m;
                                    }

                                    $check_sn = BeneficiaryRoster::where('sn',$prov.'-'.$citymun_c->citymun_m.'-'.$brgy_c->barangay_m)->count();
                                    if($check_sn <= 9){
                                        $cntr = '000'.$check_sn+1;
                                    }elseif($check_sn < 99){
                                        $cntr = '00'.$check_sn+1;
                                    }elseif($check_sn < 999){
                                        $cntr = '0'.$check_sn+1;
                                    }else{
                                        $cntr = $check_sn+1;
                                    }

                                    if($check_ben == 0){
                                        $bene = new BeneficiaryRoster;
                                        $bene->id = NULL;
                                        $bene->uuid = uniqid();
                                        $bene->sn = $prov.'-'.$citymun_c->citymun_m.'-'.$brgy_c->barangay_m;
                                        $bene->serial_no = $prov.'-'.$citymun_c->citymun_m.'-'.$brgy_c->barangay_m.'-'.$cntr;
                                        $bene->region_c = $region_c->region_c;
                                        $bene->province_c = $province_c->province_c;
                                        $bene->citymun_c = $citymun_c->citymun_c;
                                        $bene->brgy_c = $brgy_c->barangay_c;
                                        $bene->last_name = $data[$cnt]['Surname'];
                                        $bene->first_name = $data[$cnt]['First Name'];
                                        $bene->middle_name = $data[$cnt]['Middle Name'];
                                        $bene->ext_name = $data[$cnt]['Ext.Name'];
                                        $bene->sex = $data[$cnt]['Gender'];
                                        $bene->civil_status = $data[$cnt]['Civil Status'];
                                        $bene->religion_id = 1;
                                        $bene->bday = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date:: excelToDateTimeObject($data[$cnt]['Date
(DD/MM/YYYY)']));
                                        $bene->occupation = $data[$cnt]['Occupation'];
                                        $bene->monthly_net = $data[$cnt]['Total Monthly Income'];
                                        $bene->is_4ps_bene = $data[$cnt]['4Ps Beneficiary'];
                                        $bene->ip_group_id = $ip_group_id;
                                        $bene->fam_members = $data[$cnt]['No. of Family Members'];
                                        $bene->house_ownership = $data[$cnt]['House Ownership'];
                                        $bene->code = $data[$cnt]['Code'];
                                        $bene->house_cond = $data[$cnt]['Housing Condition'];
                                        $bene->casualty = $data[$cnt]['Casualty'];
                                        $bene->health_cond = $data[$cnt]['Health Condition'];
                                        $bene->save() or die('ERROR ADDING NEW TAG!');

                                        $logs = new AuditLogs;
                                        $logs->id = NULL;
                                        $logs->user_id = $user_id;
                                        $logs->action = 'BENE_ROSTER_CRUD';
                                        $logs->log = 'Added Roster and Assistance Received';
                                        $logs->reference_id = $bene->id;
                                        $logs->save() or die('ERROR ADDING NEW TAG!');

                                        $check_assistance = AssistanceRecords::where('beneficiary_id', $bene->id)
                                        ->where('kind_type',$data[$cnt]['Kind / Type'])
                                        ->where('cost',$data[$cnt]['Cost'])
                                        ->where('provider',$data[$cnt]['Provider'])
                                        ->where('qty',$data[$cnt]['Quantity'])
                                        ->where('date',Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date:: excelToDateTimeObject($data[$cnt]['Date
(DD/MM/YYYY)']))) ->count();
                                        if($check_assistance < 1){
                                            $asr = new AssistanceRecords;
                                            $asr->id = NULL;
                                            $asr->uuid = uniqid();
                                            $asr->serial_no = $bene->serial_no;
                                            $asr->beneficiary_id = $bene->id;
                                            $asr->kind_type = $data[$cnt]['Kind / Type'];
                                            $asr->date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date:: excelToDateTimeObject($data[$cnt]['Date
(DD/MM/YYYY)']));
                                            $asr->qty = $data[$cnt]['Quantity'];
                                            $asr->cost = $data[$cnt]['Cost'];
                                            $asr->provider = $data[$cnt]['Provider'];
                                            $asr->save() or die('ERROR ADDING NEW TAG!');
                                        }//store assistance
                                    }//Uploading

                                }
                            }//counterfor
                            return redirect()->route('beneficiary_roster.index')->with('success','Beneficiaries successfully added!');
                        }else{
                            return redirect()->route('beneficiary_roster.index')->with('error','Please use given template!');
                        }//DAFACSheet
                        

                    }catch (Exception $e) {
                        $error_code = $e->errorInfo[1];
                        return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
                    }
                }//file validator
            
        }
        
    }



    public function save(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
               try{
                    $check_ben = BeneficiaryRoster::where('last_name', $request->last_name)
                                ->where('first_name', $request->first_name)
                                ->where('middle_name', $request->middle_name)
                                ->where('province_c', $request->province_c)
                                ->where('citymun_c', $request->citymun_c)
                                ->where('brgy_c', $request->barangay_c)->first();
                    if($request->region_c != 1){
                        return redirect()->route('beneficiary_roster.index')->with('error','This system is intended for Region 1 only!');
                    }else{
                        if($request->province_c == '29'){
                            $prov = 'IS';
                        }elseif ($request->province_c == '28') {
                            $prov = 'IN';
                        }elseif ($request->province_c == '33') {
                            $prov = 'LU';
                        }else{
                            $prov = 'PANG';
                        } 
                        $province_c = Province::where('province_c',$request->province_c)
                                ->where('region_c',$request->region_c)
                                ->first();
                        $citymun_c = CityMun::where('citymun_c', $request->citymun_c)
                            ->where('region_c',$request->region_c)
                            ->where('province_c',$request->province_c)
                            ->first();
                        $brgy_c = Barangay::where('barangay_c', $request->brgy_c)
                            ->where('region_c',$request->region_c)
                            ->where('province_c',$request->province_c)
                            ->where('citymun_c', $request->citymun_c)
                            ->first();
                        $check_sn = BeneficiaryRoster::where('sn',$prov.'-'.$citymun_c->citymun_m.'-'.$brgy_c->barangay_m)
                                    ->count();
                            if($check_sn <= 9){
                                $cntr = '000'.$check_sn+1;
                            }elseif($check_sn < 99){
                                $cntr = '00'.$check_sn+1;
                            }elseif($check_sn < 999){
                                $cntr = '0'.$check_sn+1;
                            }else{
                                $cntr = $check_sn+1;
                            }


                    if($check_ben == NULL){
                        $bene = new BeneficiaryRoster;
                        $bene->id = NULL;
                        $bene->uuid = uniqid();
                        $bene->sn = $prov.'-'.$citymun_c->citymun_m.'-'.$brgy_c->barangay_m;
                        $bene->serial_no = $prov.'-'.$citymun_c->citymun_m.'-'.$brgy_c->barangay_m.'-'.$cntr;
                        $bene->region_c = $request->region_c;
                        $bene->province_c = $request->province_c;
                        $bene->citymun_c = $request->citymun_c;
                        $bene->brgy_c = $request->brgy_c;
                        $bene->last_name = strip_tags($request->last_name);
                        $bene->first_name = strip_tags($request->first_name);
                        $bene->middle_name = strip_tags($request->middle_name);
                        $bene->ext_name = $request->ext_name;
                        $bene->sex = $request->sex;
                        $bene->civil_status = $request->civil_status;
                        $bene->religion_id = $request->religion_id;
                        $bene->bday = $request->bday;
                        $bene->occupation = strip_tags($request->occupation);
                        $bene->monthly_net = $request->monthly_net;
                        $bene->is_4ps_bene = $request->is_4ps_bene;
                        $bene->ip_group_id = $request->ip_group_id;
                        $bene->house_ownership = $request->house_ownership;
                        $bene->code = $request->code;
                        $bene->house_cond = $request->house_cond;
                        $bene->casualty =  strip_tags($request->casualty);
                        $bene->health_cond = $request->health_cond;
                        $bene->save() or die('ERROR ADDING NEW TAG!');


                            $logs = new AuditLogs;
                            $logs->id = NULL;
                            $logs->user_id = $user_id;
                            $logs->action = 'BENE_ROSTER_CRUD';
                            $logs->log = 'Added Roster data';
                            $logs->reference_id = $bene->id;
                            $logs->save() or die('ERROR ADDING NEW TAG!');

                        return redirect()->route('beneficiary_roster.index')->with('success','Beneficiary has been submitted successfully!');
                    }else{
                        return redirect()->route('beneficiary_roster.index')->with('error','Beneficiary already exist!');
                    }
                }
                    
               } catch (Exception $e) {
                   $error_code = $e->errorInfo[1];
                   return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
               }
       

        }
        
    }




    public function show($id)
    {
        $beneficiary_roster = BeneficiaryRoster::find($id);
        return response()->json($beneficiary_roster);
    }



    public function edit(BeneficiaryRoster $beneficiaries)
    {
        return view('beneficiary_rosters.edit',compact('beneficiaries'));
    }



    public function update(Request $request, BeneficiaryRoster $beneficiaries)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $check = BeneficiaryRoster::where('id',$request->id)->first();
            if($check->region_c == $request->region_c AND $check->province_c == $request->province_c AND $check->citymun_c == $request->citymun_c AND $check->brgy_c == $request->brgy_c){

                try{
                    $ss = BeneficiaryRoster::where('id',$request->id)->update([
                        'region_c' => strip_tags($request->region_c),
                        'province_c' => strip_tags($request->province_c),
                        'citymun_c' => strip_tags($request->citymun_c),
                        'brgy_c' => strip_tags($request->brgy_c),
                        'last_name' => strip_tags($request->last_name),
                        'first_name' => strip_tags($request->first_name),
                        'middle_name' => strip_tags($request->middle_name),
                        'ext_name' => $request->ext_name,
                        'civil_status' => strip_tags($request->civil_status),
                        'religion_id' => strip_tags($request->religion_id),
                        'bday' => $request->bday,
                        'occupation' => strip_tags($request->occupation),
                        'monthly_net' => strip_tags($request->monthly_net),
                        'is_4ps_bene' => strip_tags($request->is_4ps_bene),
                        'ip_group_id' => $request->ip_group_id,
                        'fam_members' => strip_tags($request->fam_members),
                        'house_ownership' => strip_tags($request->house_ownership),
                        'code' => strip_tags($request->code),
                        'house_cond' => strip_tags($request->house_cond),
                        'casualty' => strip_tags($request->casualty),
                        'health_cond' => strip_tags($request->health_cond)
                    ]);

                                $log = new AuditLogs;
                                $log->id = NULL;
                                $log->user_id = 883;
                                $log->action = 'BENE_ROSTER_CRUD';
                                $log->log = 'Updated Roster details';
                                $log->reference_id = $check->serial_no;
                                $log->save() or die('ERROR ADDING NEW TAG!');

                    return redirect()->route('beneficiary_roster.index')->with('success','Beneficiary has been updated successfully');

                } catch (Exception $e) {
                    $error_code = $e->errorInfo[1];
                    return redirect()->route('beneficiary_roster.index')->with('error','There was a problem updating the data!');
                }  
            }else{
                return redirect()->route('beneficiary_roster.index')->with('error','Please contact your MSWD for updating your address!');
            }  
        }

        
    }



    public function destroy(BeneficiaryRoster $beneficiaries)
    {
        $beneficiaries->delete();
        return redirect()->route('beneficiary_rosters.index')->with('success','Beneficiary has been deleted successfully');
    }




    public function region(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $region = $request->region;
            $province = $request->province;
            $citymun = $request->citymun;
            $barangay = $request->barangay;
            if($region != NULL AND $province != NULL AND $citymun != NULL AND $barangay != NULL){
                $beneficiary_roster = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$region)
                                ->where('province_c',$province)
                                ->where('citymun_c',$citymun)
                                ->where('brgy_c',$barangay)
                                ->get();
                $regionsfilter = Region::where('region_c',$region)->orderBy('abbreviation','ASC')->first();
                $provincesfilter = Province::where('region_c',$region)->where('province_c',$province)->orderBy('province_m','ASC')->first();
                $citymunfilter = CityMun::where('region_c',$region)->where('province_c',$province)->where('citymun_c',$citymun)->orderBy('citymun_m','ASC')->first();
                $barangaysfilter = Barangay::where('region_c',$region)->where('province_c',$province)->where('citymun_c',$citymun)->where('barangay_c',$barangay)->orderBy('barangay_m','ASC')->first();
            }elseif($region != NULL AND $province != NULL AND $citymun != NULL){
               $beneficiary_roster = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$region)
                                ->where('province_c',$province)
                                ->where('citymun_c',$citymun)
                                ->get();
                $regionsfilter = Region::where('region_c',$region)->orderBy('abbreviation','ASC')->first();
                $provincesfilter = Province::where('region_c',$region)->where('province_c',$province)->orderBy('province_m','ASC')->first();
                $citymunfilter = CityMun::where('region_c',$region)->where('province_c',$province)->where('citymun_c',$citymun)->orderBy('citymun_m','ASC')->first();
                $barangaysfilter = '';
            }elseif($region != NULL AND $province != NULL ){
                $beneficiary_roster = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$region)
                                ->where('province_c',$province)
                                ->get();
                $regionsfilter = Region::where('region_c',$region)->orderBy('abbreviation','ASC')->first();
                $provincesfilter = Province::where('region_c',$region)->where('province_c',$province)->orderBy('province_m','ASC')->first();
                $citymunfilter = '';
                $barangaysfilter = '';

            }else{
               $beneficiary_roster = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$region)
                                ->get();
                $regionsfilter = Region::where('region_c',$region)->orderBy('abbreviation','ASC')->first();
                $provincesfilter = '';
                $citymunfilter = '';
                $barangaysfilter = '';

            }
            $regions = Region::orderBy('abbreviation','ASC')->get();
            $provinces = Province::orderBy('province_m','ASC')->get();
            $barangays = Barangay::orderBy('barangay_m','ASC')->get();
            $religions = Religion::orderBy('name','ASC')->get();
            $title = "BENEFICIARY ROSTER";
            $title2 = "FILTER BENEFICIARY";
            $regionfilter = Region::orderBy('abbreviation','ASC')->where('region_c',$request->p)->first();
            return view('beneficiary_rosters/filteraddress', compact('beneficiary_roster','regions','provinces','barangays','title','regionsfilter','provincesfilter','citymunfilter','barangaysfilter','religions','regionfilter','title2','session'));
        }
    }


    public function fetchProvince(Request $request)
    {
        $data['province'] = Province::where("region_c", $request->region_c)->orderBy('province_m','ASC')
                            ->get(["region_c", "province_m", "province_c"]);
        return response()->json($data);
    }

    public function fetchCitymun(Request $request)
    {
        $data['citymun'] = CityMun::where("province_c", $request->province_c)->orderBy('citymun_m','ASC')
                            ->get(["citymun_c", "citymun_m"]);
        return response()->json($data);
    }

    public function fetchBarangay(Request $request)
    {
        $data['barangay'] = Barangay::where("citymun_c", $request->citymun_c)->where("province_c", $request->province_c)->orderBy('barangay_m','ASC')
                            ->get(["barangay_c", "barangay_m"]);
        return response()->json($data);
    }

    public function generatePDF(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $arr = explode("-", $request->data, 4);
            if($arr[0] != NULL AND $arr[1] != NULL AND $arr[2] != NULL AND $arr[3] != NULL){
                $bene = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$arr[0])
                                ->where('province_c',$arr[1])
                                ->where('citymun_c',$arr[2])
                                ->where('brgy_c',$arr[3])
                                ->get();
            }elseif($arr[0] != NULL AND $arr[1] != NULL AND $arr[2] != NULL){
               $bene = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$arr[0])
                                ->where('province_c',$arr[1])
                                ->where('citymun_c',$arr[2])
                                ->get();
            }elseif($arr[0] != NULL AND $arr[1] != NULL){
                $bene = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$arr[0])
                                ->where('province_c',$arr[1])
                                ->get();
            }else{
               $bene = BeneficiaryRoster::orderBy('first_name','ASC')
                                ->where('region_c',$arr[0])
                                ->get();
            }
      
            $data = [
                'title' => 'SAMPLE',
                'date' =>  date('M d Y'),
                'bene' => $bene
            ]; 
                
            $pdf = PDF::loadView('beneficiary_rosters/generatePDF', $data)->setPaper('Legal', 'landscape');
         
            return $pdf->stream('generatePDF.pdf');
        }
    }


    public function generateDAFACcard(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $sn = $request->sn;
            $beneficiary_roster = BeneficiaryRoster::where('serial_no', $sn)->first();
            $province = Province::where('province_c', $beneficiary_roster->province_c)->first();
            $citymun = CityMun::where('province_c', $beneficiary_roster->province_c)->where('citymun_c', $beneficiary_roster->citymun_c)->first();
            $brgy = Barangay::where('province_c', $beneficiary_roster->province_c)->where('barangay_c', $beneficiary_roster->brgy_c)->where('citymun_c', $beneficiary_roster->citymun_c)->first();
            $religion = Religion::where('id', $beneficiary_roster->religion_id)->first();
            $fam_members = BeneficiaryFamMember::where('serial_no', $sn)->get();
            $assistance_records = AssistanceRecords::where('serial_no', $sn)->get();

            if($province == NULL){
                return redirect()->route('beneficiary_roster.index')->with('error','Please check address of the beneficiary!');
            }
            if($citymun == NULL){
                return redirect()->route('beneficiary_roster.index')->with('error','Please check address of the beneficiary!');
            }
            if($brgy == NULL){
                return redirect()->route('beneficiary_roster.index')->with('error','Please check address of the beneficiary!');
            }
            if($religion == NULL){
                return redirect()->route('beneficiary_roster.index')->with('error','Please check religion of the beneficiary!');
            }

            $data = [
                'title' => 'SAMPLE',
                'date' =>  date('M d Y'),
                'bene' => $beneficiary_roster,
                'province' => $province,
                'brgy' => $brgy,
                'citymun' => $citymun,
                'religion' => $religion,
                'fam_members' => $fam_members,
                'assistance_records' => $assistance_records,
            ]; 
                
            $pdf = PDF::loadView('beneficiary_rosters/generateDAFACcard', $data)->setPaper('Letter', 'landscape');
         
            return $pdf->stream('generateDAFACcard.pdf');
        }
    }


    public function export() 
    {
        $year = date('Y');
        return Excel::download(new RDSExport, 'RELIEF-DISTRIBUTION-SHEET-RDS-MONITORING-AND-DATABASE-CY-'.$year.'.xlsx');

    }

    public function daily(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
               try{
                $date = date($request->day);
                $data = AssistanceRecords::where('date',$request->day)->get();
                if(count($data) == 0){
                    return redirect()->route('beneficiary_roster.index')->with('error','No data available!');
                }else{
                        return Excel::download(new RDSDailyExport($data), 'RELIEF-DISTRIBUTION-SHEET-RDS-MONITORING-AND-DATABASE-CY-'.$date.'.xlsx');
                }
                    
               } catch (Exception $e) {
                   $error_code = $e->errorInfo[1];
                   return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
               }
       

        }
        
    }


    public function monthly(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
               try{
                $month = $request->month;
                $year = $request->year;
                $data = AssistanceRecords::whereYear('date', '=', $year)->whereMonth('date', '=', $month)->get();
                if(count($data) == 0){
                    return redirect()->route('beneficiary_roster.index')->with('error','No data available!');
                }else{
                        return Excel::download(new RDSMonthlyExport($data), 'RELIEF-DISTRIBUTION-SHEET-RDS-MONITORING-AND-DATABASE-CY-'.$month.'-'.$year.'.xlsx');
                }
                    
               } catch (Exception $e) {
                   $error_code = $e->errorInfo[1];
                   return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
               }
       

        }
        
    }


    public function quarterly(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
               try{
                $quarter = $request->quarter;
                $year = $request->year;
                if($quarter == 1){
                    $from = Carbon::createFromFormat('Y-d-m', $year.'-01-01');
                    $to = Carbon::createFromFormat('Y-d-m', $year.'-31-03');
                }elseif($quarter == 2){
                    $from = Carbon::createFromFormat('Y-d-m', $year.'-01-04');
                    $to = Carbon::createFromFormat('Y-d-m', $year.'-30-06');
                }elseif($quarter == 3){
                    $from = Carbon::createFromFormat('Y-d-m', $year.'-01-07');
                    $to = Carbon::createFromFormat('Y-d-m', $year.'-30-9');
                }else{
                    $from = Carbon::createFromFormat('Y-d-m', $year.'-01-10');
                    $to = Carbon::createFromFormat('Y-d-m', $year.'-31-12');
                }
                
                $data = AssistanceRecords::whereBetween('date', [$from, $to])->get();
                if(count($data) == 0){
                    return redirect()->route('beneficiary_roster.index')->with('error','No data available!');
                }else{
                        return Excel::download(new RDSQuarterlyExport($data), 'RELIEF-DISTRIBUTION-SHEET-RDS-MONITORING-AND-DATABASE-CY-'.$from.'-to-'.$to.'.xlsx');
                }
                    
               } catch (Exception $e) {
                   $error_code = $e->errorInfo[1];
                   return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
               }
        }
    }
       


    public function semestral(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
               try{
                $semester = $request->semester;
                $year = $request->year;
                if($semester == 1){
                    $from = Carbon::createFromFormat('Y-d-m', $year.'-01-01');
                    $to = Carbon::createFromFormat('Y-d-m', $year.'-30-06');
                }else{
                    $from = Carbon::createFromFormat('Y-d-m', $year.'-01-7');
                    $to = Carbon::createFromFormat('Y-d-m', $year.'-31-12');
                }
                
                $data = AssistanceRecords::whereBetween('date', [$from, $to])->get();
                if(count($data) == 0){
                    return redirect()->route('beneficiary_roster.index')->with('error','No data available!');
                }else{
                        return Excel::download(new RDSSemestralExport($data), 'RELIEF-DISTRIBUTION-SHEET-RDS-MONITORING-AND-DATABASE-CY-'.$from.'-to-'.$to.'.xlsx');
                }
                    
               } catch (Exception $e) {
                   $error_code = $e->errorInfo[1];
                   return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
               }
       

        }
        
    }
       


    public function annual(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
               try{
                $year = $request->year;
                
                $data = AssistanceRecords::whereYear('date', $year)->get();
                if(count($data) == 0){
                    return redirect()->route('beneficiary_roster.index')->with('error','No data available!');
                }else{
                        return Excel::download(new RDSAnnualExport($data), 'RELIEF-DISTRIBUTION-SHEET-RDS-MONITORING-AND-DATABASE-CY-'.$year.'.xlsx');
                }
               } catch (Exception $e) {
                   $error_code = $e->errorInfo[1];
                   return redirect()->route('beneficiary_roster.index')->with('error','There is something wrong!');
               }
       

        }
        
    }


    





}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use DB;
use App\Models\BeneficiaryRoster;
use App\Models\UserList;
use App\Models\AssistanceRecords;

use App\Charts\DAFACCharts;

class DashboardController extends Controller
{
    public function index(Request $request, DAFACCharts $chart)
    {
        $user_id = $request->session()->get('user_id');
        $session = Userlist::where('user_id', $user_id)->first();
        if($session == NULL){
            $request->session()->flush();
            return redirect('/')->with('error','ERROR! Unauthorized login.');
        }else{
            $title = "DASHBOARD";
            $title2 = "";
            $bene = BeneficiaryRoster::count();
            $in = BeneficiaryRoster::where('province_c', '28')->count();
            $is = BeneficiaryRoster::where('province_c', '29')->count();
            $p = BeneficiaryRoster::where('province_c', '55')->count();
            $lu = BeneficiaryRoster::where('province_c', '33')->count();
            if($in == 0){
                $cnt_in = 0;
            }else{
                $cnt_in = $in/$bene*100;
            }

            if($is == 0){
                $cnt_is = 0;
            }else{
                $cnt_is = $is/$bene*100;
            }

            if($lu == 0){
                $cnt_lu = 0;
            }else{
                $cnt_lu = $lu/$bene*100;
            }

            if($p == 0){
                $cnt_p = 0;
            }else{
                $cnt_p = $p/$bene*100;
            }
            
        
            $assistance = AssistanceRecords::get();
            if(count($assistance) == 0){
                $in_m_a = 0;
                $is_m_a = 0;
                $lu_m_a = 0;
                $p_m_a = 0;
                $in_fm_a = 0;
                $is_fm_a = 0;
                $lu_fm_a = 0;
                $p_fm_a = 0;

                $totalna = 0;
                $totalolder = 0;
                $totallactating = 0;
                $totalpwd = 0;
                $totalpregnant = 0;
                $totalsolo = 0;

                $totalfemale = 0;
                $totalmale = 0;
                
                $in_total = 0;
                $is_total = 0;
                $lu_total = 0;
                $p_total = 0;
            }else{
                $in_m_a = 0;
                $is_m_a = 0;
                $lu_m_a = 0;
                $p_m_a = 0;
                $in_fm_a = 0;
                $is_fm_a = 0;
                $lu_fm_a = 0;
                $p_fm_a = 0;
                $in_total = 0;
                $is_total = 0;
                $lu_total = 0;
                $p_total = 0;

                $totalna = 0;
                $totalolder = 0;
                $totallactating = 0;
                $totalpwd = 0;
                $totalpregnant = 0;
                $totalsolo = 0;

                $totalfemale = 0;
                $totalmale = 0;

                foreach($assistance as $a){

                    $inm_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '28')->where('sex', 'Male')
                         ->first();
                    $ism_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '29')->where('sex', 'Male')
                         ->first();
                    $lum_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '33')->where('sex', 'Male')
                         ->first();
                    $pm_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '55')->where('sex', 'Male')
                         ->first();
                    if($inm_a != NULL){
                        $in_m_a ++;
                    }
                    if($ism_a != NULL){
                        $is_m_a ++;
                    }
                    if($lum_a != NULL){
                        $lu_m_a ++;
                    }
                    if($pm_a != NULL){
                        $p_m_a ++;
                    }

                    $tfemale = BeneficiaryRoster::where('sex', 'Female')->where('serial_no', $a->serial_no)
                         ->first();

                    $tmale = BeneficiaryRoster::where('sex', 'Male')->where('serial_no', $a->serial_no)
                         ->first();
                    if($tfemale != NULL){
                        $totalfemale ++;
                    }
                    if($tmale != NULL){
                        $totalmale ++;
                    }

                    $tna = BeneficiaryRoster::where('code', 'N/A')->where('serial_no', $a->serial_no)
                         ->first();

                    $tolder = BeneficiaryRoster::where('code', 'Older Person')->where('serial_no', $a->serial_no)
                         ->first();

                    $tlactating = BeneficiaryRoster::where('code', 'Lactating Mother')->where('serial_no', $a->serial_no)
                         ->first();

                    $tpwd = BeneficiaryRoster::where('code', 'PWD')->where('serial_no', $a->serial_no)
                         ->first();

                    $tpregnant = BeneficiaryRoster::where('code', 'Pregnant Mother')->where('serial_no', $a->serial_no)
                         ->first();

                    $tsolo = BeneficiaryRoster::where('code', 'Solo Parent')->where('serial_no', $a->serial_no)
                         ->first();

                    if($tna != NULL){
                        $totalna ++;
                    }
                    if($tolder != NULL){
                        $totalolder ++;
                    }
                    if($tlactating != NULL){
                        $totallactating ++;
                    }
                    if($tpwd != NULL){
                        $totalpwd ++;
                    }
                    if($tpregnant != NULL){
                        $totalpregnant ++;
                    }
                    if($tsolo != NULL){
                        $totalsolo ++;
                    }


                    $infm_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '28')->where('sex', 'Female')
                         ->first();
                    $isfm_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '29')->where('sex', 'Female')
                         ->first();
                    $lufm_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '33')->where('sex', 'Female')
                         ->first();
                    $pfm_a = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '55')->where('sex', 'Female')
                         ->first();

                    if($infm_a != NULL){
                        $in_fm_a ++;
                    }
                    if($isfm_a != NULL){
                        $is_fm_a ++;
                    }
                    if($lufm_a != NULL){
                        $lu_fm_a ++;
                    }
                    if($pfm_a != NULL){
                        $p_fm_a ++;
                    }

                    $intotal = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '28')
                         ->first();
                    $istotal = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '29')
                         ->first();
                    $lutotal = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '33')
                         ->first();
                    $ptotal = BeneficiaryRoster::where('serial_no', $a->serial_no)->where('province_c', '55')
                         ->first();

                    if($intotal != NULL){
                        $in_total ++;
                    }else{
                        $in_total = 0;
                    }
                    if($istotal != NULL){
                        $is_total ++;
                    }else{
                        $is_total = 0;
                    }
                    if($lutotal != NULL){
                        $lu_total ++;
                    }else{
                        $lu_total = 0;
                    }
                    if($ptotal != NULL){
                        $p_total ++;
                    }else{
                        $p_total = 0;
                    }

                }

            }
       
            return view('dashboard.index', compact('title','in','is','p','lu','in_total','is_total','p_total','lu_total','in_m_a','is_m_a','p_m_a','lu_m_a','in_fm_a','is_fm_a','p_fm_a','lu_fm_a','bene','cnt_in','cnt_is','cnt_p','cnt_lu','title2', 'session', 'totalfemale', 'totalmale', 'totalna', 'totalpwd', 'totalolder', 'totallactating', 'totalpregnant', 'totalsolo'));
        }
    }
}

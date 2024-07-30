<?php

namespace App\Exports;

use App\Models\BeneficiaryRoster;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Carbon\Carbon;

class RDSQuarterlyExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $all = $this->data;
        $d = Carbon::now();
        $date = $d->format('Y');
        foreach($all as $key => $a){
             $data[$key] = BeneficiaryRoster::join('assistance_records', 'assistance_records.serial_no', '=', 'beneficiary_roster.serial_no')
                    ->join('psgc_provinces', 'psgc_provinces.province_c', '=', 'beneficiary_roster.province_c')
                    ->where('beneficiary_roster.serial_no', $a->serial_no)
                    ->get(['beneficiary_roster.id','beneficiary_roster.casualty','beneficiary_roster.date','beneficiary_roster.last_name','beneficiary_roster.first_name','beneficiary_roster.middle_name','beneficiary_roster.ext_name','beneficiary_roster.sex','beneficiary_roster.bday','beneficiary_roster.ext_name','beneficiary_roster.ext_name','beneficiary_roster.age', 'beneficiary_roster.civil_status','beneficiary_roster.code','beneficiary_roster.is_4ps_bene', 'beneficiary_roster.brgy_c','beneficiary_roster.citymun_c','psgc_provinces.province_m', 'assistance_records.kind_type']);

            }
        return collect($data);
        
    }

    public function headings(): array
    {
        
        return [
        ['Department of Social Welfare and Development'],
        ['Field Office I'],
        ['Quezon Avenue, City of San Fernando, La Union 2500'],
        [''],
        ['RELIEF DISTRIBUTION SHEET DATABASE'],
        ['CY _________'],
        [''],
        [''],
        ["#",
        "NAME OF EVENT / NATURE OF AUGMENTATION",
        "DATE OF DISTRIBUTION",
        "LAST NAME",
        "FIRST NAME", 
        "MIDDLE NAME",
        "EXT NAME
        Jr., Sr., III, etc.",
        "SEX",
        "BIRTHDAY",
        "AGE",
        "CIVIL STATUS",
        "SECTORS",
        "Member of Indigenous People 
 (specify)",
        "BARANGAY",    
        "CITY / MUNICIPALITY",
        "PROVINCE",
        "ASSISTANCE RECEIVED",
        "REMARKS" ],                                                         
        ];
    }
}

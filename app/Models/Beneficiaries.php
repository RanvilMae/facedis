<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    use HasFactory;


    protected $fillable = [ 'uuid', 
                            'first_name', 
                            'middle_name',
                            'last_name',
                            'ext_name',
                            'address',
                            'ip_group_id',
                            'sex',
                            'province_c',
                            'citymun_c',
                            'brgy_c',
                            'bday',
                            'civil_status',
                            'is_4ps_bene',
                            'occupation',
                            'monthly_net',
                            'religion_id',
                            'type',
                            'household_id'
                        ];

    protected $table = 'beneficiaries';



}

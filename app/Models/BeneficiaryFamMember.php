<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryFamMember extends Model
{
    use HasFactory;

      protected $fillable = ['uuid', 'serial_no', 'first_name', 'middle_name', 'last_name','ext_name','rel_hh','gender','civil_status','educ','skill', 'remarks'];

    protected $table = 'bene_fam_members';
}

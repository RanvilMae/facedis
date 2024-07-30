<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistanceRecords extends Model
{
    use HasFactory;
    protected $fillable = [ 'uuid', 
                            'beneficiary_id', 
                            'kind_type',
                            'date',
                            'qty',
                            'unit',
                            'cost',
                            'provider'
                        ];
    protected $table = 'assistance_records';
}

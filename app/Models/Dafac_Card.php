<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dafac_Card extends Model
{
    use HasFactory;

    protected $fillable = [ 'uuid', 
                            'beneficiary_id', 
                            'fam_member',
                            'description',
                            'action_by '
                        ];

    protected $table = 'dafac_card';
}

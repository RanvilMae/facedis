<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitList extends Model
{
    protected $connection = 'mysql';
    protected $fillable = ['name'];

    protected $table = 'unit_list';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLogs extends Model
{
    use HasFactory;

    protected $fillable = ['user_id ', 'action', 'log', 'reference_id'];
    
    protected $table = 'audit_logs';
}

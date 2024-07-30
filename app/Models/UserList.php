<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $connection = 'mysql';
    protected $fillable = ['uname', 'email', 'password', 'user_level','name'];

    protected $table = 'user_list';
}

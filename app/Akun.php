<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = "akun";
    protected $fillable = ['name', 'user_id', 'role', 'email'];
}

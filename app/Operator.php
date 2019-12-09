<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "operator";
    protected $fillable = ['name', 'operator_id', 'name_doc', 'ktp', 'ijazah', 'akte', 'keterangan', 'instansi'];
}

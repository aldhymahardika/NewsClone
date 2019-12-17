<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "operator";
    protected $fillable = ['name', 'name_doc', 'ktp', 'ijazah', 'akte', 'keterangan', 'instansi', 'operator_id'];
}

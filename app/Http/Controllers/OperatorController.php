<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use \App\Operator;

class OperatorController extends Controller
{
    public function data_doc(){
    	return view('/operator.data_doc');
    }

    public function tambah_doc(){
    	$operator = Operator::all();
    	return view('/operator.tambah_doc');
    }

    public function store_doc(){
    	// $user = User::create([
        //     'name' => $request->name,
        //     'role' => $request->role,
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // $akun = Akun::create([
        //     'nama' => $user->name,
        //     'role' => $user->role,
        //     'email' => $user->email,
        //     'user_id' => $user->id
        // ]);
        $akun = \App\Akun::create($request->all());
        return redirect('operator.data_doc');
    }
}

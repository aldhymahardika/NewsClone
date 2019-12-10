<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\User;
use App\Operator;

class AdminController extends Controller
{
    public function index(){
    	return view('/admin');
    }

    public function dashboard(){
    	return view('/dashboard');
    }

    public function data_user(){
        $akun = Akun::all();
    	return view('admin.data_user',['akun' => $akun]);
    }

    public function tambah_akun(){
    	return view('admin.tambah');
    }

    public function store(Request $request){
        $operator = new \App\Operator;
        $user = new \App\User;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $akun = \App\Akun::create($request->all());
        
        // if($request->user()->role == 'user'){
        //     $request->request->add(['operator_id' => $user->id]);
        //     $request->request->add(['name' => $user->name]);
        //     $operator = \App\Operator::create($request->all());
        // }else{
        // }
        return redirect('admin.data_user');
    }
}

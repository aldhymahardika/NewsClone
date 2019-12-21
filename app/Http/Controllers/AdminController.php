<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $user = User::all();
    	return view('admin.data_user',['user' => $user]);
    }

    public function tambah_akun(){
    	return view('admin.tambah');
    }

    public function store(Request $request){
        $user = new \App\User;
        $user->name = $request->name;
        $user->role = 'user';
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();
        $request->request->add(['operator_id' => $user->id]);
        $request->request->add(['name' => $user->name]);
        $operator = \App\Operator::create($request->all());
        
        return redirect('admin.data_user');
    }

    public function hapus($id)
    {
        $user = \App\User::find($id);
        $user->delete($user);
         $operator = Operator::find($id);
            $operator->delete();
        return redirect('/admin.data_user');
    }
}

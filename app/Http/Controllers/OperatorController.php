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

    public function store_doc(Request $request){
    	$this->validate($request, [
    		'name' => 'required',
    		'name_doc'=> 'required',
			'ktp' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'ijazah' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'akte' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
			'instansi' => 'required',
		]);

        $ktp = $request->file('file');
        $ijazah = $request->file('file');
        $akte = $request->file('file');
        $name_ktp = $file->getClientOriginalName();
        $name_ijazah = $file->getClientOriginalName();
        $name_akte = $file->getClientOriginalName();
        $tujuan = 'upload';
        $ktp->move($tujuan, $name_ktp);
        $ijazah->move($tujuan, $name_ijazah);
        $akte->move($tujuan, $name_akte);

        Operator::create([
        	'name' => $request->name,
        	'name_doc' => $request->name_doc,
        	'ktp' => $name_ktp,
        	'ijazah' => $name_ijazah,
        	'akte' => $name_akte,
        	'keterangan' => $request->keterangan,
        	'instansi' => $request->instansi
        ]);

        return redirect('operator.data_doc');
    }
}

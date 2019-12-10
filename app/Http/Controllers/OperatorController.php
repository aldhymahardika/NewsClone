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

        $operator = new \App\Operator;
        $operator->name = $request->name;
        $operator->name_doc = $request->name_doc;
        $ktp = $request->file('file');
        $ijazah = $request->file('file');
        $akte = $request->file('file');
        $name_ktp = $ktp->getClientOriginalExtension();
        $name_ijazah = $ijazah->getClientOriginalExtension();
        $name_akte = $akte->getClientOriginalExtension();
        $tujuan = 'upload';
        $ktp->move($tujuan, $name_ktp);
        $ijazah->move($tujuan, $name_ijazah);
        $akte->move($tujuan, $name_akte);

        // Operator::create([
        // 	'name' => $request->name,
        // 	'name_doc' => $request->name_doc,
        // 	'ktp' => $name_ktp,
        // 	'ijazah' => $name_ijazah,
        // 	'akte' => $name_akte,
        // 	'keterangan' => $request->keterangan,
        // 	'instansi' => $request->instansi
        // ]);

        $operator->ktp = $name_ktp;
        $operator->ijazah = $name_ijazah;
        $operator->akte = $name_akte;
        $operator->keterangan = $request->keterangan;
        $operator->instansi = $request->instansi;
        $operator->save();

        return redirect('operator.data_doc');
    }
}

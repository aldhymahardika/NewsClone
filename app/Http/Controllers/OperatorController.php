<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Operator;

class OperatorController extends Controller
{
    public function data_doc(){
        $operator = Operator::all();
    	return view('operator.data_doc',['operator' => $operator]);
    }

    public function tambah_doc(){
    	return view('/operator.tambah_doc');
    }

    public function store_doc(Request $request){

        // $operator = new \App\Operator;
        // $operator->name = $request->name;
        // $operator->name_doc = $request->name_doc;
        // $ktp = $request->input('file');
        // $ijazah = $request->input('file');
        // $akte = $request->input('file');
        // $name_ktp = $request->file('file')->getClientOriginalName();
        // $name_ijazah = $request->file('file')->getClientOriginalName();
        // $name_akte = $request->file('file')->getClientOriginalName();
        // $tujuan = base_path() . '/public/uploads';
        // $ktp->move($tujuan, $name_ktp);
        // $ijazah->move($tujuan, $name_ijazah);
        // $akte->move($tujuan, $name_akte);

        Operator::create([
        	'name' => $request->name,
        	'name_doc' => $request->name_doc,
        	'ktp' => $request->ktp,
        	'ijazah' => $request->ijazah,
        	'akte' => $request->akte,
        	'keterangan' => $request->keterangan,
        	'instansi' => $request->instansi,
        ]);

        // $operator->ktp = $name_ktp;
        // $operator->ijazah = $name_ijazah;
        // $operator->akte = $name_akte;
        // $operator->keterangan = $request->keterangan;
        // $operator->instansi = $request->instansi;
        // $operator->save();

        return redirect('operator.data_doc');
    }

    public function edit_doc($id){
        $operator = Operator::findOrFail($id);
        return view('/operator.edit_doc', ['operator' => $operator]);
    }

    public function update_doc($id, Request $request)
    {
        $operator = Operator::find($id);
        $operator->name = $request->name;
        $operator->name_doc = $request->name_doc;
        $operator->ktp = $request->ktp;
        $operator->ijazah = $request->ijazah;
        $operator->akte = $request->akte;
        $operator->keterangan = $request->keterangan;
        $operator->instansi = $request->instansi;
        $operator->save();
        return redirect('/operator.data_doc');
    }

    public function hapus_doc($id)
    {
        $operator = Operator::find($id);
        $operator->delete();
        return redirect('/operator.data_doc');
    }

}

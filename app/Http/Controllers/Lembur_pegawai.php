<?php

namespace App\Http\Controllers;

use Request;
use App\pegawai;
use App\pegawailembur;
use App\kategoriL;
use App\User;
use App\golongan;
use App\jabatan;
use Validator;
Use Input;
class Lembur_pegawai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembur=pegawailembur::with('pegawai','golongan','jabatan')->get();
        return view('LemburPegawai.index', compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=kategoriL::all();
        $Pegawai=pegawai::all();   
        $user=User::all(); 
        return view('LemburPegawai.create', compact('kategori','Pegawai','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $alamat =[
        //     'kode_lembur_id' => 'required',
        //     'pegawai_id' => 'required',
        //     'jumlah_jam' => 'required'];

        //      $valid=Validator::make(Input::all(),$alamat);
        // if ($valid->fails()){ 
        //         return redirect()->back()
        //         ->withErrors($valid)
        //         ->withInput();
        //     }
                $lembur=Request::all();
            pegawailembur::create($lembur);
            return redirect('Lembur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kateg=kategoriL::all();
        $pegawai=pegawai::all();
        $lemburr = pegawailembur::find($id);
        return view('LemburPegawai.edit', compact('lemburr','pegawai','kateg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $lembur=pegawailembur::find($id);
        // if ($lembur['kode_lembur_id'] != Request('kode_lembur_id')) {
        //     # code...
        // $rules =[
            
        //     'pegawai_id' => 'required',
        //     'jumlah_jam' => 'required'
        //     ];
        // }
        // else{
        //     $rules =[
            
        //     'pegawai_id' => 'required',
        //     'jumlah_jam' => 'required'
        //     ];   
        //   }

        // $validate=Validator::make(Input::all(),$rules);

        // if ($validate->fails()){
        //         return redirect()->back()
        //         ->withErrors($validate)
        //         ->withInput();
        // }
        // $aku =pegawailembur::find($id);
        // // $aku->kode_lembur_id=Input::get('kode_lembur_id');
        // $aku->pegawai_id=Input::get('pegawai_id');
        // $aku->jumlah_jam=Input::get('jumlah_jam');
        // $aku->update();
        // return redirect('Lembur');
        $LUpdate=request::all();
        $lemburr=pegawailembur::find($id);
        $lemburr->update($LUpdate);
        return redirect('Lembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

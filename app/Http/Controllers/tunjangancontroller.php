<?php

namespace App\Http\Controllers;

use Request;
use App\golongan;
use App\jabatan;
use App\tunjangan;
use Input;
use Validator;
class tunjangancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjang=tunjangan::all();
        return view('Tunjangan.index', compact('tunjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan=golongan::all();
        $jabatan=jabatan::all();
        return view('Tunjangan.create',compact('golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules=[
        'kode_tunjangan' => 'required|unique:tunjangan,kode_tunjangan',
        'jumlah_anak' => 'required',
        'besaran_uang' => 'required'
        ];

        $sms=[
        'kode_tunjangan.unique'=>'Data Sudah Terdaftar',
        'jabatan_id.required'=>'Tidak Boleh Kosong',
        'golongan_id.required'=>'Tidak Boleh Kosong',
        'status.required'=>'Tidak Boleh Kosong',
        'jumlah_anak.required'=>'Tidak Boleh Kosong',
        'besaran_uang.required'=>'Tidak Boleh Kosong'
        ];
        $v=Validator::make(Input::all(),$rules,$sms);
        if ($v->fails()) {
            return redirect()->back()
            ->withErrors($v)
            ->withInput();
            # code...
        }
         else {
        $a =new tunjangan;
        $a->kode_tunjangan=Input::get('kode_tunjangan');
        $a->jabatan_id=Input::get('jabatan_id');
        $a->golongan_id=Input::get('golongan_id');
        $a->status=Input::get('status');
        $a->jumlah_anak=Input::get('jumlah_anak');
        $a->besaran_uang=Input::get('besaran_uang');
        $a->save();
        return redirect('tunjangan');
    }
            // $tunjang=Request::all();
            // tunjangan::create($tunjang);
            // return redirect('tunjangan');
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
        $jab = jabatan::all();
        $gol = golongan::all();
        $tunjangan = tunjangan::find($id);
        return view('Tunjangan.edit', compact('tunjangan', 'gol', 'jab'));
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
        $tunjanganUpdate = Request::all();
        $tunjangan = tunjangan::find($id);
        $tunjangan->update($tunjanganUpdate);
        return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tunjangan::find($id)->delete();
        return redirect('tunjangan');
    }
}

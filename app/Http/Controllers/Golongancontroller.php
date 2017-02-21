<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\golongan;
use Validator;
use Input;
class Golongancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golong=golongan::all();
        return view('Golongan.index', compact('golong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'kode_golongan' => 'required|unique:golongan,kode_golongan',
            'nama_golongan' => 'required',
            'besaran_uang' => 'required'];
            
            $sms =[
            'kode_golongan.unique' => 'Data Sudah Ada',
            'nama_golongan.required' => 'Data Tidak Boleh Kosong',
            'besaran_uang.required' => 'Data Tidak Boleh Kosong'];

        $validate=Validator::make(Input::all(),$rules,$sms);
        if ($validate->fails()){ 
                return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }
        else {
        $a =new golongan;
        $a->kode_golongan=Input::get('kode_golongan');
        $a->nama_golongan=Input::get('nama_golongan');
        $a->besaran_uang=Input::get('besaran_uang');
        $a->save();
        return redirect('golongan');
    }

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
        $golong = golongan::find($id);
        return view('Golongan.edit', compact('golong'));
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
        $rules =[
            'kode_golongan' => 'required|unique:golongan,kode_golongan',
            'nama_golongan' => 'required',
            'besaran_uang' => 'required'
            ];
            $sms =[
            'kode_golongan.required' => 'Data Tidak Boleh Kosong',
            'kode_golongan.unique' => 'Kode Yang Di Input Sudah Ada',
            'nama_golongan.required' => 'Data Tidak Boleh Kosong',
            'besaran_uang.required' => 'Data Tidak Boleh Kosong'
            ];

        $validate=Validator::make(Input::all(),$rules,$sms);
        if ($validate->fails()){
                return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }
        $a =golongan::find($id);
        $a->kode_golongan=Input::get('kode_golongan');
        $a->nama_golongan=Input::get('nama_golongan');
        $a->besaran_uang=Input::get('besaran_uang');
        $a->update();
        return redirect('golongan');
    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        golongan::find($id)->delete();
        return redirect('golongan');
    }
}

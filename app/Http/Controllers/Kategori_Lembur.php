<?php

namespace App\Http\Controllers;

use Request;

use App\kategoriL;
use App\pegawai;
use App\golongan;
use App\jabatan;
use Validator;
use Input;
class Kategori_Lembur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorii=kategoriL::all();
        return view('KategoriLembur.index', compact('kategorii'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongann=golongan::all();
        $jabatann=jabatan::all();
        return view('KategoriLembur.create', compact('golongann','jabatann'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alamat =[
            'kode_lembur' => 'required|unique:kategori_lembur,kode_lembur',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'besaran_uang' => 'required'];
            
            // $pesan =[
            // 'kode_lembur.unique' => 'Data Sudah Ada',
            // 'nama_golongan.required' => 'Data Tidak Boleh Kosong',
            // 'nama_jabatan.required'=> 'Data Tidak Boleh Kosong',
            // 'besaran_uang.required' => 'Data Tidak Boleh Kosong'];

        $validet=Validator::make(Input::all(),$alamat);
        if ($validet->fails()){ 
                return redirect()->back()
                ->withErrors($validet)
                ->withInput();
        }
        // else{
        // $d =new kategoriL;
        // $d->kode_lembur=Request('kode_lembur');  
        // $d->nama_jabatan=Request('nama_jabatan');
        // $d->nama_golongan=Request('nama_golongan');
        // $d->besaran_uang=Request('besaran_uang');
        // $d->save();
    
         $kategorii=Request::all();
            kategoriL::create($kategorii);
            return redirect('kategori');

        // return redirect('/kategori');
    // }
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
         $kateg = kategoriL::find($id);
         $jabatann = Jabatan::all();
        $golongann = Golongan::all();
        return view('KategoriLembur.edit', compact('kateg','jabatann','golongann'));


        
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
        $katego=kategoriL::find($id);
        if ($katego['kode_lembur'] != Request('kode_lembur')) {
            # code...
        $rules =[
            'kode_lembur' => 'required|unique:kategori_lembur,kode_lembur',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'besaran_uang' => 'required'
            ];
        }
        else{
            $rules =[
            'kode_lembur' => 'required',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'besaran_uang' => 'required'
            ];   
          }

        $validate=Validator::make(Input::all(),$rules);

        if ($validate->fails()){
                return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }
        $aku =kategoriL::find($id);
        $aku->kode_lembur=Input::get('kode_lembur');
        $aku->jabatan_id=Input::get('jabatan_id');
        $aku->golongan_id=Input::get('golongan_id');
        $aku->besaran_uang=Input::get('besaran_uang');
        $aku->update();
        return redirect('kategori');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategoriL::find($id)->delete();
        return redirect('kategori');
    }
}

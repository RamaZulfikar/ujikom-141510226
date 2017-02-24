<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\penggajian ;
use App\tunjangan_pegawai ;
use App\pegawai ;
use App\tunjangan ;
use App\jabatan ;
use App\golongan;
use App\kategori_lembur ;
use App\pegawailembur ;
use Input ;
use Validator ;
use auth ;

class penggajiancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('keuangan');
    }
    
    public function index()
    {
        $penggajian=penggajian::paginate(3);
        return view('Penggajian.index',compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan=tunjangan_pegawai::paginate(10);
        return view('Penggajian.create',compact('tunjangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajian=Input::all();
         // dd($penggajian);
        $where=tunjangan_pegawai::where('id',$penggajian['id_tunjangan_pegawai'])->first();
        // dd($where);
        $wherepenggajian=penggajian::where('id_tunjangan_pegawai',$where->id)->first();
        // dd($wherepenggajian);
        $wheretunjangan=tunjangan::where('id',$where->id_tunjangan)->first();
        // dd($where);
        $wherepegawai=pegawai::where('id',$where->id_pegawai)->first();
        // dd($wherepegawai);
        $wherekategorilembur=kategori_lembur::where('id_jabatan',$wherepegawai->id_jabatan)->where('id_golongan',$wherepegawai->id_golongan)->first();
        // dd($wherekategorilembur);
        $wherelemburpegawai=pegawai_lembur::where('id_pegawai',$wherepegawai->id)->first();
        // dd($wherelemburpegawai);
        $wherejabatan=jabatan::where('id',$wherepegawai->id_jabatan)->first();
        // dd($wherejabatan);
        $wheregolongan=golongan::where('id',$wherepegawai->id_golongan)->first();
        // dd($wheregolongan);

        $penggajian=new penggajian ;
        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjangan=tunjangan_pegawai::paginate(10);
            return view('penggajian.create',compact('tunjangan','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->gaji_total=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->gaji_total=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        else{

            $penggajian->jumlah_jam_lembur=$wherelemburpegawai->jumlah_jam;
            $penggajian->jumlah_uang_lembur=$wherelemburpegawai->jumlah_jam*$wherekategorilembur->besaran_uang ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->gaji_total=($wherelemburpegawai->jumlah_jam*$wherekategorilembur->besaran_uang)+($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajian->tanggal_pengambilan =date('d-m-y');
            $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
            }
            return redirect('penggajian');
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
        //
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
        //
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

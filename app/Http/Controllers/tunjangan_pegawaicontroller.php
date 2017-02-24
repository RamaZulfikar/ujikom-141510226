<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Request;
use Validator;  
use Input;
use App\tunjangan;
use App\tunjangan_pegawai;
use App\pegawai;


class tunjangan_pegawaicontroller extends Controller
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
        
        $tunjang =tunjangan_pegawai::all();
        return view('Tunjanganpegawai.index', compact('tunjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan=tunjangan::all();
        $pegawai=pegawai::all();
        return view('Tunjanganpegawai.create', compact('pegawai','tunjangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $roles=[
            'pegawai_id'=>'required|unique:tunjangan_pegawai',
            'jumlah_anak'=>'required|numeric',
            'status'=>'required',
        ];
        $sms=[
            'kode_tunjangan.unique'=>'data Sudah ada', 
            'pegawai_id.required'=>'jangan kosong',
            'pegawai_id.unique'=>'data Sudah ada',
            'jumlah_anak.numeric'=>'harus angka',
            'jumlah_anak.required'=>'jangan kosong',
            'status.required'=>'jangan kosong',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect('tunjangpegawai/create')
                    ->WithErrors($validasi)
                    ->WithInput();
        }
        else{
        $pegawai=pegawai::where('id',Request('pegawai_id'))->first();
        $tunjangan=tunjangan::where('jabatan_id',$pegawai->jabatan_id)
                            ->where('golongan_id',$pegawai->golongan_id)
                            ->where('status',Request('status'))
                            ->where('jumlah_anak',Request('jumlah_anak'))
                            ->first();
            if($tunjangan){
                $tunjanganp=new tunjangan_pegawai;
                $tunjanganp->pegawai_id=Request('pegawai_id');
                $tunjanganp->kode_tunjangan_id=$tunjangan->id;
                $tunjanganp->save();
                return redirect('tunjangpegawai');
            
            
            }
        }
        $tunjang =Request::all();
        tunjangan_pegawai::create($tunjang);
        return redirect('tunjangpegawai');

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

        $tunjanganpegawai=tunjangan_pegawai::find($id);
        $pegawai=pegawai::all();
        return view('Tunjanganpegawai.edit',compact('tunjanganpegawai','pegawai'));
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
        $tunjanganpegawai=tunjangan_pegawai::find($id);
        // dd($wherepegawai);
        if ($tunjanganpegawai->tunjangan->kode_tunjangan != Request('kode_tunjangan')) {
            $rules =['kode_tunjangan' => 'required|unique:tunjangan',
                    'pegawai_id' => 'required',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        }
        elseif ($tunjanganpegawai->pegawai_id != Request('pegawai_id')) {
            $rules =['kode_tunjangan' => 'required',
                    'pegawai_id' => 'required|unique:tunjangan_pegawai',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        }
        else
        {

            $rules =['pegawai_id' => 'required',
                'kode_tunjangan' => 'required',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        }

        $message =['pegawai_id.required' => 'Wajib Isi',
                    'pegawai_id.unique' => 'Tunjangan Hanya Bisa Satu Kali',
                    'kode_tunjangan.required' => 'Silahkan Input',
                    'kode_tunjangan.unique' => 'Gunakan kode Lain',
                    'jumlah_anak.required' => 'Silahkan Input',                    
                    'jumlah_anak.numeric'=>'Input Numerik',
                    'jumlah_anak.min'=>'Minimal 0',
                    'besaran_uang.required'=>'Silahkan Input',
                    'besaran_uang.numeric'=>'Input Numerik',
                    'besaran_uang.min'=>'Minimal 0'];
    

            $validate=Validator::make(Input::all(),$rules,$message);
            if ($validate->fails()) {
                return redirect('Tunjanganpegawai/'.$id.'/edit')
                ->withErrors($validate)
                ->withInput();
            }
    
     $update=Input::all();
            $tunjangan_pegawai=tunjangan_pegawai::find($id);
            $tunjangan_pegawai->update($update);


            return redirect('tunjangpegawai');
          }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tunjangan_pegawai::find($id)->delete();
        return redirect('tunjangpegawai');
    }
}

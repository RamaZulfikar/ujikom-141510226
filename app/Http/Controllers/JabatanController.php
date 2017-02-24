<?php

namespace App\Http\Controllers;

use Request;
use App\jabatan;
use Validator;
use Input;
class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $jabatans=jabatan::all();
        return view('Jabatan.index',compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $jabatan=request::all();
        // jabatan::create($jabatan);
        // return redirect('jabatan');
        $rules=[
        'kode_jabatan' => 'required|unique:jabatan,kode_jabatan',
        'nama_jabatan' => 'required',
        'besaran_uang' => 'required'
        ];

        $sms=[
        'kode_jabatan.unique'=>'Data Sudah Ada',
        'nama_jabatan.required'=>'Tidak Boleh Kosong',
        'besaran_uang.required'=>'Tidak Boleh Kosong'
        ];
        $v=Validator::make(Input::all(),$rules,$sms);
        if ($v->fails()) {
            return redirect()->back()
            ->withErrors($v)
            ->withInput();
            # code...
        }
            $jabatan=Request::all();
            jabatan::create($jabatan);
            return redirect('jabatan');
            // $da=new jabatan;
            // $da->kode_jabatan=Input::get('kode_jabatan');
            // $da->nama_jabatan=Input::get('nama_jabatan');
            // $da->besaran_uang=Input::get('besaran_uang');
            // $da->save();
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
        $jabatan = jabatan::find($id);
        return view('Jabatan.edit', compact('jabatan'));
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
        $jabatanUpdate=request::all();
        $jabatan=jabatan::find($id);
        $jabatan->update($jabatanUpdate);
        return redirect('jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jabatan::find($id)->delete();
        return redirect('jabatan');
    }
}

<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\jabatan;
use App\pegawai;
use App\golongan;
use Validator;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function __construct()
    {
        $this->middleware('auth');
    }
        use RegistersUsers;

    public function index()
    {
        $pegawaii=pegawai::with('User','jabatan','golongan')->get();
        return view('Pegawai.index',compact('pegawaii'));
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
        $user=User::all();
        return view('Pegawai.create',compact('golongan','jabatan','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name' => 'required',
        //     'nip' => 'required|numeric|min:8',
        //     'email' => 'required|email|max:255|unique:users',
        //     'password' => 'required|min:5|confirmed',

        //     ]);

        // $user=User::create([
        //     'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        //     'password' => bcrypt($request->get('password')),
        //     ]);

        // $pegawai=new pegawai;
        // $pegawai->nip =$request->get('nip');
        // $pegawai->jabatan_id =$request->get('jabatan_id');
        // $pegawai->golongan_id =$request->get('golongan_id');
        // $pegawai->user_id =
        $rules=[
        'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ];

        $sms=[
        'name.required'=>'Tidak Boleh Kosong',
        'email.unique'=>'Email Sudah Terdaftar',
        'password.required'=>'Tidak Boleh Kosong', 
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
            $user= new user;
            $user->name=Request('name');
            $user->email=Request('email');
            $user->permission=Request('permission');
            $user->password=bcrypt(Request('password'));
            $user->save();
            
            $file=Input::file('foto');
            $destination=public_path().'/assets/image';
            $filename=$file->getClientOriginalName();
            $uploadsuccess=$file->move($destination,$filename);

            if (Input::hasFile('foto')) {
                # code...
            
            $pegawai= new Pegawai;
            $pegawai->nip = Request('nip');
            $pegawai->user_id =$user->id;
            $pegawai->jabatan_id = Request('jabatan_id');
            $pegawai->golongan_id = Request('golongan_id');
            $pegawai->foto = $filename;
            $pegawai->save();
            return redirect('pegawai');
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
        $golongan=golongan::all();
        $jabatan=jabatan::all();
        $user=User::all();
        $pegawai=pegawai::find($id);
   return view('Pegawai.show',compact('pegawai','user','golongan','jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        pegawai::find($id)->delete();
        return redirect('pegawai');
    }
}

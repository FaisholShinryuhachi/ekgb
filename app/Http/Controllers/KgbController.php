<?php

namespace App\Http\Controllers;

use App\Models\Ekgb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KgbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk menampilkan data
        $kgb=Ekgb::get();
        return view('folderkgb.manage.tampil',compact('kgb')); //kembalikan le folder.folder.nama view, kemudian dilempar ke variable awal
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk menampikan form tambah
        return view('folderkgb.manage.create'); //kembalikan le folder.folder.nama view, kemudian dilempar ke variable awal
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk tambah data
       

       // if ($request->file('pdf') == null) {
         //   $file = "";
       // }else{
         //  $file = $request->file('pdf')->store('pdf');  
       // } 
       ///ddd($request);
        $validated=$request->validate([
            'nip'=>'required',
            'nama_pegawai'=>'required|min:3',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'kgb_terakhir' => 'required',
            'status' => 'required',
            'pendukung' => 'required|max:1024',
        ]);
        if($request->file('pendukung')){
            $validated['pendukung'] = $request->file('pendukung')->store('gambar');
        }
        //bikin variabel baru tujuan ke model, filed database request pairingkan ke nama filed yang ada di form create 
        $kgb=new Ekgb;
        $kgb->nip=$request->nip;
        $kgb->nama_pegawai=$request->nama_pegawai;
        $kgb->jabatan=$request->jabatan;
        $kgb->pangkat=$request->pangkat;
        $kgb->kgb_terakhir=$request->kgb_terakhir;
        $kgb->status=$request->status;
        $kgb->pendukung=$request->pendukung->hashName();
        $kgb->save();
        if(!$kgb){
            return back()->with('error','Data gagal disimpan, cek kodingan!');
        }
        else{
            return back()->with('success','Data berhasil disimpan ya gaes');
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
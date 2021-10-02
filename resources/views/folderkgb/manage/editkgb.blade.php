@extends('layouts.app')
@section('container')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">{{ session::get('success') }} </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">{{ session::get('error') }} </div>
@endif
<div class="container">
    <div class="col-md-16 mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Entry Data KGB</h3>
            </div>
            <div class="card-body">
    
    <form method="POST" action="{{ route('tampil.edit',$kgb->id) }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        
        <div class="mb-3">
            <label class="form-label"> NIP </label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip',$kgb->nip) }}" autofocus>
            @error('nip')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                
    
        </div>
        <div class="mb-3">
            <label class="form-label"> Nama </label>
            <input type="text" class="form-control" name="nama_pegawai" value="{{ old('nama_pegawai',$kgb->nama_pegawai) }}" autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label"> Jabatan </label>
            <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan',$kgb->jabatan) }}" autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label"> Pangkat </label>
            <input type="text" class="form-control" name="pangkat" value="{{ old('pangkat',$kgb->pangkat) }}" autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label"> KGB Terakhir </label>
            <input type="date" class="form-control" name="kgb_terakhir" value="{{ old('kgb_terakhir',$kgb->kgb_terakhir) }}" autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label"> Status </label>
            <select name="status" class="form-control"> 
                <option value="Belum Diverifikasi">Belum Diverifikasi</option>
                <option value="Sudah Diverifikasi">Sudah Diverifikasi</option>
            </select>
        </div>
        <div class="mb-3">
        <label class="form-label" >Pendukung</label>
                        <div class="col-xs-8">
						<input class="form-control" type="file" name="pendukung">
                        </div>
       <div class="mt-3">
        <center><button type="submit" class="btn btn-primary">Simpan Data</button></center>
       </div>
       <div class="mt-3">
       <center><button type="reset" class="btn btn-warning">Reset</button></center>
       </div>
       </form>
        </div>
@endsection

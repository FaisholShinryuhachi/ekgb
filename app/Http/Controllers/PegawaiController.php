<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ekgb;
use App\Models\User;
use Illuminate\Support\Facades\File;


class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('material.user.user');
    }

    public function getProfile()
    {
        $profile = User::select('profile','name')->where('id', Auth::id())->first();
        if ($profile->profile == null){
            $profile = ['name' => $profile->name, 'profile' => null];
        }
        
        $userId = Auth::id();
        $kgb = Ekgb::where('id_user', $userId)->first();

        if ($kgb == null) {
            return response()->json(['id' => 'null', 'kgb' => null, 'profile' => $profile]);
        } else {

            return response()->json(['id' => $kgb->id, 'kgb' => $kgb, 'profile' => $profile]);
        }
    }

    public function filePegawai(Request $request)
    {
        $fetch = Ekgb::select('pendukung', 'pendukung2')->where('id', $request->id)->first();

        $file = [];

        if ((is_null($request->pendukung)) && (is_null($request->pendukung2)) && (is_null($request->pendukung3))) {
            return response()->json(['status' => 'Tidak Ada Perubahan']);
        }

        if (isset($request->pendukung)) {
            $pendukung = ['pendukung' => $request->pendukung->hashName(),];
            $file = array_merge($file, $pendukung);
            if (file_exists(storage_path("app\gambar\\" . $fetch->pendukung))) {
                File::delete(storage_path("app\gambar\\" . $fetch->pendukung));
            }
            if ($request->file('pendukung')) {
            }
            $validated['pendukung'] = $request->file('pendukung')->store('gambar');
        }

        if (isset($request->pendukung2)) {
            $pendukung2 = ['pendukung2' => $request->pendukung2->hashName(),];
            $file = array_merge($file, $pendukung2);
            if (file_exists(storage_path("app\gambar\\" . $fetch->pendukung2))) {
                File::delete(storage_path("app\gambar\\" . $fetch->pendukung2));
            }
            if ($request->file('pendukung2')) {
                $validated['pendukung2'] = $request->file('pendukung2')->store('gambar');
            }
        }

        if (isset($request->pendukung3)) {
            $profile = User::find(Auth::id());

            $data = ['profile' => $request->pendukung3->hashName(),];

            if (file_exists(storage_path("app\gambar\\" . $profile->profile))) {
                File::delete(storage_path("app\gambar\\" . $profile->profile));
            }

            if ($request->file('pendukung3')) {
                $validated['pendukung3'] = $request->file('pendukung3')->store('gambar');
            }

            $result_profile = User::where('id', Auth::id())->update($data);

            if (!$result_profile) {
                return response()->json(['status' => 'Pengubahan Foto Data Gagal']);
            }
        }
        if($file == null){
            return response()->json(['status' => 'Pengubahan Foto Data Berhasil']);
        }
        $result = Ekgb::where('id', $request->id)->update($file);

        if (!$result) {
            return response()->json(['status' => 'Pengubahan Tes Data Gagal']);
        } else {
            return response()->json(['status' => 'Pengubahan Data Sukses']);
        }
    }
}

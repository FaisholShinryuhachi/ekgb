<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ekgb;
use Illuminate\Support\Facades\File;


class PegawaiController extends Controller
{
    public function index()
    {
        return view('material.user.user');
    }

    public function getProfile()
    {
        $userId = Auth::id();
        $kgb = Ekgb::where('id_user', $userId)->first();

        if ($kgb == null) {
            return response()->json(['id' => 'null', 'kgb' => null]);
        } else {

            return response()->json(['id' => $kgb->id, 'kgb' => $kgb]);
        }
    }

    public function filePegawai(Request $request)
    {
        $fetch = Ekgb::select('pendukung', 'pendukung2')->where('id', $request->id)->first();

        $file = [
        ];

        if ((is_null($request->pendukung)) && (is_null($request->pendukung2))) {
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

        $result = Ekgb::where('id', $request->id)->update($file);

        if (!$result) {
            return response()->json(['status' => 'Pengubahan Data Gagal']);
        } else {
            return response()->json(['status' => 'Pengubahan Data Sukses']);
        }
    }
}

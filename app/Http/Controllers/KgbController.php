<?php

namespace App\Http\Controllers;

use App\Models\Ekgb;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class KgbController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk menampilkan data
        $kgb = Ekgb::get();
        //kembalikan le folder.folder.nama view, kemudian dilempar ke variable awal
        return view('folderkgb.manage.tampil', compact('kgb'));
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
        $validated = $request->validate([
            'nip' => 'required',
            'nama_pegawai' => 'required|min:3',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'kgb_terakhir' => 'required',
            'status' => 'required',
            'pendukung' => 'required|max:1024',
        ]);
        if ($request->file('pendukung')) {
            $validated['pendukung'] = $request->file('pendukung')->store('gambar');
        }
        //bikin variabel baru tujuan ke model, filed database request pairingkan ke nama filed yang ada di form create 
        $kgb = new Ekgb;
        $kgb->nip = $request->nip;
        $kgb->nama_pegawai = $request->nama_pegawai;
        $kgb->jabatan = $request->jabatan;
        $kgb->pangkat = $request->pangkat;
        $kgb->kgb_terakhir = $request->kgb_terakhir;
        $kgb->status = $request->status;
        $kgb->pendukung = $request->pendukung->hashName();
        $kgb->save();
        if (!$kgb) {
            return back()->with('error', 'Data gagal disimpan, cek kodingan!');
        } else {
            return back()->with('success', 'Data berhasil disimpan ya gaes');
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
        //untuk mengedit data
        $kgb = Ekgb::find($id);
        return view('folderkgb.manage.editkgb', compact('kgb')); //kembalikan le folder.folder.nama view, kemudian dilempar ke variable awal
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
        dd($request);
        //
        $validated = $request->validate([
            'nip' => 'required',
            'nama_pegawai' => 'required|min:3',
            'jabatan' => 'required',
            'pangkat' => 'required',
            'kgb_terakhir' => 'required',
            'status' => 'required',
            'pendukung' => 'required|max:1024',
        ]);

        //bikin variabel baru tujuan ke model, filed database request pairingkan ke nama filed yang ada di form create 
        $kgb = Ekgb::find($id);
        $kgb->nip = $request->nip;
        $kgb->nama_pegawai = $request->nama_pegawai;
        $kgb->jabatan = $request->jabatan;
        $kgb->pangkat = $request->pangkat;
        $kgb->kgb_terakhir = $request->kgb_terakhir;
        $kgb->status = $request->status;
        $kgb->pendukung = $request->pendukung->hashName();
        $kgb->save();
        if (!$kgb) {
            return back()->with('error', 'Data gagal disimpan, cek kodingan!');
        } else {
            return back()->with('success', 'Data berhasil disimpan ya gaes');
        }
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

    public function getEkgb()
    {
        $kgb = Ekgb::all();
        return Datatables::of($kgb)
            ->addColumn('action', function ($kgb) {
                return '
                        <a target="_blank" rel="noopener noreferrer" href="file/' . $kgb->pendukung . '"><button class="btn btn-primary btn-sm"> <i class="material-icons">picture_as_pdf</i> </button></a>
                        <a target="_blank" rel="noopener noreferrer" href="file/' . $kgb->pendukung2 . '"><button class="btn btn-primary btn-sm"> <i class="material-icons">picture_as_pdf</i> </button></a>
                        <button class="edit-button-table btn btn-warning btn-sm" value=' . $kgb->id . '> <i class="material-icons">mode_edit</i> </button>
                        <button class="delete btn btn-success btn-sm" value=' . $kgb->id . '> <i class="material-icons">delete</i> </button>
                        ';
            })
            ->make(true);
    }


    // Custom fahmi
    public function postEkgb(Request $request)
    {
        $check = Ekgb::where('id_user', $request->id_user)->get()->count();

        if ($check > 0) {
            return response()->json(['status' => 'Pegawai Sudah Terdaftar', 'code' => '01']);
        }

        if ($request->file('pendukung') && $request->file('pendukung2')) {
            $validated['pendukung'] = $request->file('pendukung')->store('gambar');
            $validated['pendukung2'] = $request->file('pendukung2')->store('gambar');
        }

        $kgb = new Ekgb;
        $kgb->nip = $request->nip;
        $kgb->id_user = $request->id_user;
        $kgb->jabatan = $request->jabatan;
        $kgb->pangkat = $request->pangkat;
        $kgb->kgb_terakhir = $request->kgb_terakhir;
        $kgb->status = $request->status;
        $kgb->gaji = $request->gaji;
        $kgb->pendukung = $request->pendukung->hashName();
        $kgb->pendukung2 = $request->pendukung2->hashName();
        $kgb->save();

        if (!$kgb) {
            return response()->json(['status' => 'Penambahan Data Gagal', 'code' => '01']);
        } else {
            return response()->json(['status' => 'Penambahan Data Sukses', 'code' => '02']);
        }
    }

    public function editEkgb(Request $request)
    {
        $id = $request->id;
        $id_user = $request->id_user;

        $id_check = Ekgb::select('id')->where('id_user', $id_user)->first();

        if ($id_check != null) {
            if ($id_check->id != $id) {
                return response()->json(['status' => 'User Sudah Terdaftar', 'code' => '01']);
            }
        }

        $fetch = Ekgb::select('pendukung', 'pendukung2')->where('id', $request->id)->first();
        $kgb = [
            'nip' => $request->nip,
            'id_user' => $request->id_user,
            'jabatan' => $request->jabatan,
            'pangkat' => $request->pangkat,
            'kgb_terakhir' => $request->kgb_terakhir,
            'status' => $request->status,
            'gaji' => $request->gaji,
        ];

        if (isset($request->pendukung)) {
            $pendukung = ['pendukung' => $request->pendukung->hashName(),];
            $kgb = array_merge($kgb, $pendukung);
            if (file_exists(storage_path("app\gambar\\" . $fetch->pendukung))) {
                File::delete(storage_path("app\gambar\\" . $fetch->pendukung));
            }
            if ($request->file('pendukung')) {
                $validated['pendukung'] = $request->file('pendukung')->store('gambar');
            }
        }

        if (isset($request->pendukung2)) {
            $pendukung2 = ['pendukung2' => $request->pendukung2->hashName(),];
            $kgb = array_merge($kgb, $pendukung2);
            if (file_exists(storage_path("app\gambar\\" . $fetch->pendukung2))) {
                File::delete(storage_path("app\gambar\\" . $fetch->pendukung2));
            }
            if ($request->file('pendukung2')) {
                $validated['pendukung2'] = $request->file('pendukung2')->store('gambar');
            }
        }

        $result = Ekgb::where('id', $request->id)->update($kgb);

        if (!$result) {
            return response()->json(['status' => 'Update Data Gagal', 'code' => '01']);
        } else {
            return response()->json(['status' => 'Update Data Sukses', 'code' => '02']);
        }
    }

    public function getForEdit($id)
    {
        $kgb = Ekgb::where('id', $id)->first();
        return response()->json(['data' => $kgb]);
    }

    public function deleteEkgb($id)
    {
        $kgb = Ekgb::where('id', $id)->first();
        $kgb->delete();
        if (!$kgb) {
            return response()->json(['status' => 'Gagal']);
        } else {
            return response()->json(['status' => 'Sukses']);
        }
    }

    public function getFile($name)
    {

        $myFile = storage_path("app/gambar/" . $name);
        return response()->file($myFile);
    }

    public function deadlineEkgb()
    {

        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');

        $result = DB::table('ekgbs')
            ->select('ekgbs.*', 'users.name as nama_pegawai')
            ->join('users', 'users.id', '=', 'ekgbs.id_user')
            ->whereRaw('DATEDIFF( DATE_ADD(kgb_terakhir, INTERVAL 2 YEAR), "' . $date_now . '") <= 60')
            ->get();
        // return response()->json(['data' => $result]);

        return Datatables::of($result)
            ->addColumn('action', function ($kgb) {
                return '
                        <a target="_blank" rel="noopener noreferrer" href="file/' . $kgb->pendukung . '"><button class="btn btn-primary btn-sm"> <i class="material-icons">picture_as_pdf</i> </button></a>
                        <a target="_blank" rel="noopener noreferrer" href="file/' . $kgb->pendukung2 . '"><button class="btn btn-primary btn-sm"> <i class="material-icons">picture_as_pdf</i> </button></a>
                        <button class="edit-button-table btn btn-warning btn-sm" value=' . $kgb->id . '> <i class="material-icons">mode_edit</i> </button>
                        <button class="delete btn btn-danger btn-sm" value=' . $kgb->id . '> <i class="material-icons">delete</i> </button>
                        ';
            })
            ->make(true);
    }

    public function aktifEkgb()
    {

        $date_now = Carbon::now();
        $date_now->format('Y-m-d');

        $result = DB::table('ekgbs')
            ->select('ekgbs.*', 'users.name as nama_pegawai')
            ->join('users', 'users.id', '=', 'ekgbs.id_user')
            ->whereRaw('DATEDIFF( DATE_ADD(kgb_terakhir, INTERVAL 2 YEAR), "2021-10-12") > 60')
            ->get();
            return Datatables::of($result)
            ->addColumn('action', function ($kgb) {
                return '
                        <a target="_blank" rel="noopener noreferrer" href="file/' . $kgb->pendukung . '"><button class="btn btn-primary btn-sm"> <i class="material-icons">picture_as_pdf</i> </button></a>
                        <a target="_blank" rel="noopener noreferrer" href="file/' . $kgb->pendukung2 . '"><button class="btn btn-primary btn-sm"> <i class="material-icons">picture_as_pdf</i> </button></a>
                        <button class="edit-button-table btn btn-warning btn-sm" value=' . $kgb->id . '> <i class="material-icons">mode_edit</i> </button>
                        <button class="delete btn btn-danger btn-sm" value=' . $kgb->id . '> <i class="material-icons">delete</i> </button>
                        ';
            })
            ->make(true);
    }
    // ----------------------------------------------------
    // ------------ Bagian controller api dashboard --------
    // ----------------------------------------------------

    public function dashboardApi()
    {
        $date_now = Carbon::now();
        $date_now = $date_now->format('Y-m-d');

        $result = DB::table('ekgbs')
            ->select('*')
            ->whereRaw('DATEDIFF( DATE_ADD(kgb_terakhir, INTERVAL 2 YEAR), "' . $date_now . '") <= 60')
            ->count();
        $all = Ekgb::count();
        $diproses = Ekgb::where('status', 'Sudah Diproses')->count();
        $data = DB::table('ekgbs')
            ->select('ekgbs.id', 'users.name as nama_pegawai', 'ekgbs.kgb_terakhir')
            ->selectRaw('DATE_ADD(kgb_terakhir, INTERVAL 2 YEAR) AS deadline')
            ->join('users', 'users.id', '=', 'ekgbs.id_user')
            ->whereRaw('DATEDIFF( DATE_ADD(kgb_terakhir, INTERVAL 2 YEAR), "' . $date_now . '") <= 60')
            ->take(4)
            ->get();
        return response()->json([
            'deadline'  => $result,
            'diproses'  => $diproses,
            'total'     => $all,
            'data'      => $data,
        ]);
    }

    public function sandbox()
    {
        $data = Ekgb::get()->user;
        // return response()->json($data);
        return $data->toJson();
    }
}

public function postEkgb(Request $request)
{
    $validatedData = $request->validate([
        'nip' => 'required|digits:18',
        'id_user' => 'required',
        'jabatan' => 'required|min:3',
        'pangkat' => 'required|min:3',
        'kgb_terakhir' => 'required|date',
        'status' => 'required|min:3',
        'gaji' => 'required|numeric',
    ]);

    if ($request->file('pendukung')) {
        $validatedData['pendukung'] = $request->validate([
            'pendukung' => 'required|file|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    if ($request->file('pendukung2')) {
        $validatedData['pendukung2'] = $request->validate([
            'pendukung2' => 'required|file|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    $kgb = new Ekgb;
    $kgb->nip = $validatedData['nip'];
    $kgb->id_user = $validatedData['id_user'];
    $kgb->jabatan = $validatedData['jabatan'];
    $kgb->pangkat = $validatedData['pangkat'];
    $kgb->kgb_terakhir = $validatedData['kgb_terakhir'];
    $kgb->status = $validatedData['status'];
    $kgb->gaji = $validatedData['gaji'];

    if (isset($validatedData['pendukung'])) {
        $kgb->pendukung = $request->file('pendukung')->hashName();
    }

    if (isset($validatedData['pendukung2'])) {
        $kgb->pendukung2 = $request->file('pendukung2')->hashName();
    }

    $kgb->save();

    if (!$kgb) {
        return response()->json(['status' => 'Penambahan Data Gagal', 'code' => '01']);
    } else {
        return response()->json(['status' => 'Penambahan Data Sukses', 'code' => '02']);
    }
}
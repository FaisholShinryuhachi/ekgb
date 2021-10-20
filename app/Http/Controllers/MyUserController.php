<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class MyUserController extends Controller
{
    public function getUser()
    {
        $user = User::select('id', 'name', 'email', 'role')->get();

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                return '
                        <button class="edit-button-table btn btn-warning btn-sm" value=' . $user->id . '> <i class="material-icons">mode_edit</i> </button>
                        <button class="delete btn btn-danger btn-sm" value=' . $user->id . '> <i class="material-icons">delete</i> </button>
                        ';
            })
            ->make(true);
    }

    public function getUserKgb()
    {
        $user = User::select('id', 'name', 'email')->where('role', 'pegawai')->get();

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                return '
                        <button class="pilih-user btn btn-warning btn-sm" value=' . $user->id . '> <i class="material-icons">mode_edit</i> Pilih </button>
                        ';
            })
            ->make(true);
    }

    public function addUser(Request $request)
    {
        $data = ['email' => $request->email];

        $validator = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'Email Telah Terdaftar', 'code' => '01']);
        }

        $result = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if (!$result) {
            return response()->json(['status' => 'Penambahan Data Gagal', 'code' => '02']);
        } else {
            return response()->json(['status' => 'Penambahan Data Sukses', 'code' => '02']);
        }
    }

    public function getForEdit($id)
    {
        $user = User::where('id', $id)->first();
        return response()->json(['data' => $user]);
    }
    public function postEdit(Request $request)
    {
        $user = [
            'id' => $request->id,
            'name' => $request->nama,
            'role' => $request->role,
        ];

        $id = $request->id;
        $email = User::select('email')->where('id', $id)->first();

        if ($email->email != $request->email) {
            $data = ['email' => $request->email];

            $validator = Validator::make($data, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'Email Telah Terdaftar', 'code' => '01']);
            } else {
                $user = array_merge($user, $data);
            }
        }

        if (isset($request->password)) {
            $password = ['password' => Hash::make($request->password)];
            $user = array_merge($user, $password);
        }


        $result = user::where('id', $request->id)->update($user);

        if (!$result) {
            return response()->json(['status' => 'Ubah Data Gagal', 'code' => '02']);
        } else {
            return response()->json(['status' => 'Ubah Data Sukses', 'code' => '02']);
        }
    }

    public function deleteUser($id)
    {
        $kgb = User::where('id', $id)->first();
        $kgb->delete();
        if (!$kgb) {
            return response()->json(['status' => 'Gagal']);
        } else {
            return response()->json(['status' => 'Sukses']);
        }
    }
}

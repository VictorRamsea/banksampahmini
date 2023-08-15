<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KelasModel;
use App\Models\ProdiModel;
use Illuminate\Http\Request;
use App\Models\TabunganModel;
use App\Models\AktifitasModel;
use App\Models\PattyCashModel;
use App\Models\PenarikanModel;
use App\Models\TransaksiModel;
use App\Models\TahunAkademikModel;
use App\Models\TotalTabunganModel;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function index()
    {
        $data = [
            'title' => 'SMK Negri 7 Bandar Lampung',
            'aktifitas' => AktifitasModel::all(),
            'kelas' => KelasModel::all(),
            'patty' => PattyCashModel::all(),
            'penarikan' => PenarikanModel::all(),
            'prodi' => ProdiModel::all(),
            'tabungan' => TabunganModel::all(),
            'tahunakademik' => TahunAkademikModel::all(),
            'transaksi' => TransaksiModel::all(),
            "totaltabungan" => TotalTabunganModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('dashboard', $data);
    }

    public function profile()
    {
        $data = [
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('profile', $data);
    }

    

    public function profile_update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->except(['_token', 'submit']));
        return redirect()->to('/home/profile')->with('success', 'berhasil mengupdate data');
    }

    public function password_update(Request $request)
    {

        $request->validate([
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',

        ], [
            'password.required' => 'password harus diisi',
            'password.min' => 'password harus 8 karakter',
            'password.regex' => 'password harus berisi huruf kecil, huruf besar, angka dan simbol',
        ]);

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->to('/home/profile')->with('success', 'berhasil merubah password');
    }
}

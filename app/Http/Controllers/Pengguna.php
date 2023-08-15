<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KelasModel;
use App\Models\ProdiModel;
use Illuminate\Http\Request;
use App\Models\TabunganModel;
use App\Models\AktifitasModel;
use App\Models\AnjayModel;
use App\Models\PattyCashModel;
use App\Models\PenarikanModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiSampahModel;
use App\Models\TahunAkademikModel;
use App\Models\TotalTabunganModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class Pengguna extends Controller
{

    // bank sampah
    public function banksampah_pengguna()
    {
        $data = [
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
            "transampah" => TransaksiSampahModel::all(),
        ];

        return view('/pengguna/banksampah_pengguna', $data);
    }


    public function transaksi_tabungan()
    {
        $data = [
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/pengguna/transaksi_tabungan', $data);
    }

    public function transaksi_tabungan_save(Request $request)
    {

        FacadesSession::flash('tanggal_transaksi', $request->transaksi);
        FacadesSession::flash('fullname_transaksi', $request->transaksi);
        FacadesSession::flash('username_transaksi', $request->transaksi);
        FacadesSession::flash('tabungan_transaksi', $request->transaksi);

        $request->validate([
            'tanggal_transaksi' => 'required',
            'fullname_transaksi' => 'required',
            'username_transaksi' => 'required',
            'tabungan_transaksi' => 'required',
        ], [
            'tanggal_transaksi.required' => 'tanggal harus diisi',
            'fullname_transaksi.required' => 'nama harus diisi',
            'username_transaksi.required' => 'username harus diisi',
            'tabungan_transaksi.required' => 'nominal harus diisi',
        ]);

        $data = [
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'fullname_transaksi' => $request->fullname_transaksi,
            'username_transaksi' => $request->username_transaksi,
            'tabungan_transaksi' => $request->tabungan_transaksi,
            'penarikan_transaksi' => 0,
            'jenis_transaksi' => $request->jenis_transaksi,
            'transfer_transaksi' => 0,
            'rekening_transaksi' => 1234,
            'petugas_transaksi' => 'belum ada',
            'imbuhan_transaksi' => 'belum ada',
            'keterangan_transaksi' => 'pending',
            'warna_transaksi' => 'warning',
            'transfer_transaksi' => 0,
            'kategori_transaksi' => 'tabungan',
        ];
        TransaksiModel::create($data);
        return redirect()->to('/pengguna/banking')->with('success', 'berhasil manambah data');
    }

    public function transaksi_penarikan()
    {
        $data = [
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/pengguna/transaksi_penarikan', $data);
    }

    public function transaksi_penarikan_save(Request $request)
    {

        FacadesSession::flash('tanggal_transaksi', $request->transaksi);
        FacadesSession::flash('fullname_transaksi', $request->transaksi);
        FacadesSession::flash('penarikan_transaksi', $request->transaksi);
        FacadesSession::flash('username_transaksi', $request->transaksi);

        $request->validate([
            'tanggal_transaksi' => 'required',
            'fullname_transaksi' => 'required',
            'username_transaksi' => 'required',
            'penarikan_transaksi' => 'required',
        ], [
            'tanggal_transaksi.required' => 'tanggal harus diisi',
            'fullname_transaksi.required' => 'nama harus diisi',
            'username_transaksi.required' => 'username harus diisi',
            'penarikan_transaksi.required' => 'nominal harus diisi',
        ]);

        $data = [
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'fullname_transaksi' => $request->fullname_transaksi,
            'username_transaksi' => $request->username_transaksi,
            'penarikan_transaksi' => $request->penarikan_transaksi,

            'tabungan_transaksi' => 0,
            'jenis_transaksi' => $request->jenis_transaksi,
            'keterangan_transaksi' => 'pending',
            'warna_transaksi' => 'warning',
            'transfer_transaksi' => 0,
            'kategori_transaksi' => 'penarikan',
            'rekening_transaksi' => 1234,
            'petugas_transaksi' => 'belum ada',
            'imbuhan_transaksi' => 'belum ada',
        ];
        TransaksiModel::create($data);
        return redirect()->to('/pengguna/banking')->with('success', 'berhasil manambah data');
    }

    public function transaksi_transfer()
    {
        $data = [
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/pengguna/transaksi_transfer', $data);
    }

    public function transaksi_transfer_save(Request $request)
    {

        FacadesSession::flash('tanggal_transaksi', $request->transaksi);
        FacadesSession::flash('fullname_transaksi', $request->transaksi);
        FacadesSession::flash('username_transaksi', $request->transaksi);
        FacadesSession::flash('transfer_transaksi', $request->transaksi);
        FacadesSession::flash('rekening_transaksi', $request->transaksi);
        FacadesSession::flash('transfer_transaksi', $request->transaksi);
        FacadesSession::flash('imbuhan_transaksi', $request->transaksi);

        $request->validate([
            'tanggal_transaksi' => 'required',
            'fullname_transaksi' => 'required',
            'username_transaksi' => 'required',
            'transfer_transaksi' => 'required',
            'rekening_transaksi' => 'required',
            'imbuhan_transaksi' => 'required',
        ], [
            'tanggal_transaksi.required' => 'tanggal harus diisi',
            'fullname_transaksi.required' => 'nama harus diisi',
            'username_transaksi.required' => 'username harus diisi',
            'transfer_transaksi.required' => 'nominal harus diisi',
            'rekening_transaksi.required' => 'rekening harus diisi',
            'imbuhan_transaksi.required' => 'catatan harus diisi',
        ]);

        $data = [
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'fullname_transaksi' => $request->fullname_transaksi,
            'username_transaksi' => $request->username_transaksi,
            'transfer_transaksi' => $request->transfer_transaksi,
            'rekening_transaksi' => $request->rekening_transaksi,
            'imbuhan_transaksi' => $request->imbuhan_transaksi,

            'tabungan_transaksi' => 0,
            'penarikan_transaksi' => 0,
            'jenis_transaksi' => $request->jenis_transaksi,
            'keterangan_transaksi' => 'pending',
            'warna_transaksi' => 'warning',
            'kategori_transaksi' => 'transfer',
            'petugas_transaksi' => 'belum ada',
        ];
        TransaksiModel::create($data);
        return redirect()->to('/pengguna/banking')->with('success', 'berhasil manambah data');
    }

    public function transaksi()
    {
        $data = [
            'transaksi' => TransaksiModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/pengguna/transaksi', $data);
    }

    public function banking()
    {
        $data = [
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/pengguna/banking', $data);
    }

    public function aktifitas()
    {
        $data = [
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/pengguna/aktifitas', $data);
    }

    public function aktifitas_detail($id_aktifitas)
    {

        $aktifitas = AktifitasModel::find($id_aktifitas);

        $data = [
            "akt" => $aktifitas,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/pengguna/aktifitas_detail', $data);
    }
}

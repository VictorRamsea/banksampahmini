<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BankSampahModel;
use App\Models\TransaksiSampahModel;
use App\Models\KelasModel;
use App\Models\ProdiModel;
use Illuminate\Http\Request;
use App\Models\TabunganModel;
use App\Models\AktifitasModel;
use App\Models\AnjayModel;
use App\Models\PattyCashModel;
use App\Models\PenarikanModel;
use App\Models\TransaksiModel;
use App\Models\TahunAkademikModel;
use App\Models\TotalTabunganModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class Admin extends Controller
{
    public function banking()
    {
        $data = [
            'tabungan' => TabunganModel::all(),
            'penarikan' => PenarikanModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banking', $data);
    }

    public function pilihitem()
    {
        $data = [
            "user" => User::all(),
            "userv" => User::all(),
            "banksampah" => BankSampahModel::all(),
            "totaltabungan" => TotalTabunganModel::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banksampah_input_data', $data);
    }

    // banksampah
    public function simpanKeDatabase(Request $request)
    {
        FacadesSession::flash('daftarBarang', $request->daftarBarang);
        FacadesSession::flash('jumlahDiKeranjang', $request->jumlahDiKeranjang);
        FacadesSession::flash('totalHargaDiKeranjang', $request->totalHargaDiKeranjang);
        FacadesSession::flash('username_sampah', $request->username_sampah);
        FacadesSession::flash('fullname_sampah', $request->fullname_sampah);
        FacadesSession::flash('tanggal_sampah', $request->tanggal_sampah);
        FacadesSession::flash('petugas_sampah', $request->petugas_sampah);

        $request->validate([
            'daftarBarang' => 'required',
            'jumlahDiKeranjang' => 'required',
            'totalHargaDiKeranjang' => 'required',
            'username_sampah' => 'required',
            'fullname_sampah' => 'required',
            'tanggal_sampah' => 'required',
            'petugas_sampah' => 'required',
        ], [
            'daftarBarang.required' => 'daftar barang harus diisi',
            'jumlahDiKeranjang.required' => 'jumlah harus diisi',
            'totalHargaDiKeranjang.required' => 'total harga harus diisi',
            'username_sampah.required' => 'username harus diisi',
            'fullname_sampah.required' => 'fullname harus diisi',
            'tanggal_sampah.required' => 'tanggal harus diisi',
            'petugas_sampah.required' => 'petugas harus diisi',
        ]);

        $data = [
            'barang_sampah' => $request->daftarBarang,
            'jumlah_sampah' => $request->jumlahDiKeranjang,
            'total_sampah' => $request->totalHargaDiKeranjang,
            'username_sampah' => $request->username_sampah,
            'fullname_sampah' => $request->fullname_sampah,
            'tanggal_sampah' => $request->tanggal_sampah,
            'petugas_sampah' => $request->petugas_sampah,
        ];
        TransaksiSampahModel::create($data);
        return redirect()->to('/admin/pilihitem')->with('success', 'berhasil manambah data');
    }
    // endbanksampah

    public function transaksi()
    {
        $data = [
            'tabungan' => TabunganModel::all(),
            'penarikan' => PenarikanModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/transaksi', $data);
    }

    public function banking_transaksi_tabungan_edit($id_transaksi)
    {
        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            'totaltabungan' => TotalTabunganModel::all(),
            "userx" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banking_transaksi_tabungan_edit', $data);
    }

    public function banking_transaksi_tabungan_update(Request $request)
    {

        FacadesSession::flash('tanggal_tabungan', $request->tanggal_tabungan);
        FacadesSession::flash('fullname_tabungan', $request->fullname_tabungan);
        FacadesSession::flash('username_tabungan', $request->username_tabungan);
        FacadesSession::flash('nominal_tabungan', $request->nominal_tabungan);
        FacadesSession::flash('keterangan_tabungan', $request->keterangan_tabungan);
        FacadesSession::flash('jenis_penabung', $request->jenis_penabung);

        $request->validate([
            'tanggal_tabungan' => 'required',
            'fullname_tabungan' => 'required',
            'username_tabungan' => 'required',
            'nominal_tabungan' => 'required',
            'keterangan_tabungan' => 'required',
            'jenis_penabung' => 'required',
        ], [
            'tanggal_tabungan.required' => 'tanggal harus diisi',
            'fullname_tabungan.required' => 'nama harus diisi',
            'username_tabungan.required' => 'username harus diisi',
            'nominal_tabungan.required' => 'nominal harus diisi',
            'keterangan_tabungan.required' => 'petugas harus diisi',
            'jenis_penabung.required' => 'jenis penabung harus diisi',
        ]);

        $data = [
            'tanggal_tabungan' => $request->tanggal_tabungan,
            'fullname_tabungan' => $request->fullname_tabungan,
            'username_tabungan' => $request->username_tabungan,
            'nominal_tabungan' => $request->nominal_tabungan,
            'jenis_penabung' => $request->jenis_penabung,
            'keterangan_tabungan' => $request->keterangan_tabungan,
        ];
        TabunganModel::create($data);
        return redirect()->to('/admin/banking')->with('success', 'berhasil manambah data');
    }

    public function banking_transaksi_penarikan_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            'totaltabungan' => TotalTabunganModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banking_transaksi_penarikan_edit', $data);
    }

    public function banking_transaksi_penarikan_update(Request $request)
    {

        FacadesSession::flash('tanggal_penarikan', $request->penarikan);
        FacadesSession::flash('usernamename_penarikan', $request->penarikan);
        FacadesSession::flash('fullname_penarikan', $request->penarikan);
        FacadesSession::flash('nominal_penarikan', $request->penarikan);
        FacadesSession::flash('keterangan_penarikan', $request->penarikan);
        FacadesSession::flash('jenis_penarikan', $request->penarikan);

        $request->validate([
            'tanggal_penarikan' => 'required',
            'username_penarikan' => 'required',
            'fullname_penarikan' => 'required',
            'nominal_penarikan' => 'required',
            'keterangan_penarikan' => 'required',
            'jenis_penarikan' => 'required',
        ], [
            'tanggal_penarikan.required' => 'tanggal harus diisi',
            'username_penarikan.required' => 'username harus diisi',
            'fullname_penarikan.required' => 'nama harus diisi',
            'nominal_penarikan.required' => 'nominal harus diisi',
            'keterangan_penarikan.required' => 'keterangan penarikan harus diisi',
            'jenis_penarikan.required' => 'jenis penarikan harus diisi',
        ]);

        $data = [
            'tanggal_penarikan' => $request->tanggal_penarikan,
            'username_penarikan' => $request->username_penarikan,
            'fullname_penarikan' => $request->fullname_penarikan,
            'nominal_penarikan' => $request->nominal_penarikan,
            'keterangan_penarikan' => $request->keterangan_penarikan,
            'jenis_penarikan' => $request->jenis_penarikan,
        ];
        penarikanModel::create($data);
        return redirect()->to('/admin/banking')->with('success', 'berhasil manambah data');
    }

    public function banking_transaksi_transfer_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            'totaltabungan' => TotalTabunganModel::all(),
            "user" => User::all(),
            "userv" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banking_transaksi_transfer_edit', $data);
    }

    public function banking_transaksi_transfer_update(Request $request)
    {

        FacadesSession::flash('tanggal_tabungan', $request->tanggal_tabungan);
        FacadesSession::flash('fullname_tabungan', $request->fullname_tabungan);
        FacadesSession::flash('username_tabungan', $request->username_tabungan);
        FacadesSession::flash('nominal_tabungan', $request->nominal_tabungan);
        FacadesSession::flash('jenis_penabung', $request->jenis_penabung);
        FacadesSession::flash('keterangan_tabungan', $request->keterangan_tabungan);

        $request->validate([
            'tanggal_tabungan' => 'required',
            'fullname_tabungan' => 'required',
            'username_tabungan' => 'required',
            'nominal_tabungan' => 'required',
            'jenis_penabung' => 'required',
            'keterangan_tabungan' => 'required',
        ], [
            'tanggal_tabungan.required' => 'tanggal harus diisi',
            'fullname_tabungan.required' => 'nama harus diisi',
            'username_tabungan.required' => 'usernama harus diisi',
            'nominal_tabungan.required' => 'nominal harus diisi',
            'jenis_penabung.required' => 'jenis penabung harus diisi',
            'keterangan_tabungan.required' => 'petugas harus diisi',
        ]);

        $data = [
            'tanggal_tabungan' => $request->tanggal_tabungan,
            'fullname_tabungan' => $request->fullname_tabungan,
            'username_tabungan' => $request->username_tabungan,
            'nominal_tabungan' => $request->nominal_tabungan,
            'jenis_penabung' => $request->jenis_penabung,
            'keterangan_tabungan' => $request->jenis_penabung,
        ];
        TabunganModel::create($data);
        return redirect()->to('/admin/penarikan_input')->with('success', 'berhasil manambah data');
    }

    public function banking_tabungan_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banking_tabungan_edit', $data);
    }

    public function banking_tabungan_update($id_transaksi, Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'fullname_transaksi' => 'required',
            'tabungan_transaksi' => 'required',
            'keterangan_transaksi' => 'required',
            'warna_transaksi' => 'required',
            'petugas_transaksi' => 'required',
        ], [
            'tanggal_transaksi.required' => 'tanggal harus diisi',
            'fullname_transaksi.required' => 'nama harus diisi',
            'tabungan_transaksi.required' => 'nominal harus diisi',
            'keterangan_transaksi.required' => 'keterangan harus diisi',
            'warna_transaksi.required' => 'warna harus diisi',
            'petugas_transaksi.required' => 'petugas harus diisi',
        ]);


        $transaksi = TransaksiModel::find($id_transaksi);
        $transaksi->update($request->except(['_token', 'submit']));
        return redirect()->to('/admin/banking')->with('success', 'berhasil mengupdate data');
    }

    public function banking_penarikan_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banking_penarikan_edit', $data);
    }

    public function banking_penarikan_update($id_transaksi, Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'fullname_transaksi' => 'required',
            'penarikan_transaksi' => 'required',
            'keterangan_transaksi' => 'required',
            'warna_transaksi' => 'required',
            'petugas_transaksi' => 'required',
        ], [
            'tanggal_transaksi.required' => 'tanggal harus diisi',
            'fullname_transaksi.required' => 'nama harus diisi',
            'penarikan_transaksi.required' => 'nominal harus diisi',
            'keterangan_transaksi.required' => 'keterangan harus diisi',
            'warna_transaksi.required' => 'warna harus diisi',
            'petugas_transaksi.required' => 'petugas harus diisi',
        ]);


        $transaksi = TransaksiModel::find($id_transaksi);
        $transaksi->update($request->except(['_token', 'submit']));
        return redirect()->to('/admin/banking')->with('success', 'berhasil mengupdate data');
    }

    public function banking_transfer_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/banking_transfer_edit', $data);
    }

    public function banking_transfer_update($id_transaksi, Request $request)
    {

        FacadesSession::flash('petugas_transaksi', $request->tabungan);

        $request->validate([
            'tanggal_transaksi' => 'required',
            'fullname_transaksi' => 'required',
            'transfer_transaksi' => 'required',
            'keterangan_transaksi' => 'required',
            'warna_transaksi' => 'required',
            'petugas_transaksi' => 'required',
        ], [
            'tanggal_transaksi.required' => 'tanggal harus diisi',
            'fullname_transaksi.required' => 'nama harus diisi',
            'transfer_transaksi.required' => 'nominal harus diisi',
            'keterangan_transaksi.required' => 'keterangan harus diisi',
            'warna_transaksi.required' => 'warna harus diisi',
            'petugas_transaksi.required' => 'petugas harus diisi',
        ]);


        $transaksi = TransaksiModel::find($id_transaksi);
        $transaksi->update($request->except(['_token', 'submit']));
        return redirect()->to('/admin/banking')->with('success', 'berhasil mengupdate data');
    }


    public function aktifitas()
    {
        $data = [
            'tabungan' => TabunganModel::all(),
            'penarikan' => PenarikanModel::all(),
            'aktifitas' => AktifitasModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/aktifitas', $data);
    }

    public function aktifitas_input()
    {
        $data = [
            'tabungan' => TabunganModel::all(),
            'penarikan' => PenarikanModel::all(),
            'aktifitas' => AktifitasModel::all(),
            "user" => User::all(),
            "userv" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/aktifitas_input', $data);
    }

    public function aktifitas_edit($id_aktifitas)
    {
        $aktifitas = AktifitasModel::find($id_aktifitas);

        $data = [
            'aktifitass' => AktifitasModel::all(),
            'aktifitas' => $aktifitas,
            "user" => User::all(),
            "userv" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/aktifitas_edit', $data);
    }

    public function admin_aktifitas_save(Request $request)
    {

        FacadesSession::flash('tanggal_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_admin_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_pengguna_aktifitas', $request->aktifitas);
        FacadesSession::flash('nominal_aktifitas', $request->aktifitas);
        FacadesSession::flash('kegiatan_aktifitas', $request->aktifitas);

        $request->validate([
            'tanggal_aktifitas' => 'required',
            'nama_admin_aktifitas' => 'required',
            'nama_pengguna_aktifitas' => 'required',
            'nominal_aktifitas' => 'required',
            'kegiatan_aktifitas' => 'required',
        ], [
            'tanggal_aktifitas.required' => 'tanggal harus diisi',
            'nama_admin_aktifitas.required' => 'petugas harus diisi',
            'nama_pengguna_aktifitas.required' => 'pengguna harus diisi',
            'nominal_aktifitas.required' => 'nominal harus diisi',
            'kegiatan_aktifitas.required' => 'transaksi harus diisi',
        ]);

        $data = [
            'tanggal_aktifitas' => $request->tanggal_aktifitas,
            'nama_admin_aktifitas' => $request->nama_admin_aktifitas,
            'nama_pengguna_aktifitas' => $request->nama_pengguna_aktifitas,
            'nominal_aktifitas' => $request->nominal_aktifitas,
            'kegiatan_aktifitas' => $request->kegiatan_aktifitas,
            'penerima_aktifitas' => ' ',
            'transfer_aktifitas' => ' ',
            'imbuhan_aktifitas' => ' ',
        ];
        AktifitasModel::create($data);
        return redirect()->to('/admin/aktifitas')->with('success', 'berhasil manambah data');
    }

    public function aktifitas_save(Request $request)
    {

        FacadesSession::flash('tanggal_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_admin_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_pengguna_aktifitas', $request->aktifitas);
        FacadesSession::flash('nominal_aktifitas', $request->aktifitas);
        FacadesSession::flash('kegiatan_aktifitas', $request->aktifitas);

        $request->validate([
            'tanggal_aktifitas' => 'required',
            'nama_admin_aktifitas' => 'required',
            'nama_pengguna_aktifitas' => 'required',
            'nominal_aktifitas' => 'required',
            'kegiatan_aktifitas' => 'required',
        ], [
            'tanggal_aktifitas.required' => 'tanggal harus diisi',
            'nama_admin_aktifitas.required' => 'petugas harus diisi',
            'nama_pengguna_aktifitas.required' => 'pengguna harus diisi',
            'nominal_aktifitas.required' => 'nominal harus diisi',
            'kegiatan_aktifitas.required' => 'transaksi harus diisi',
        ]);

        $data = [
            'tanggal_aktifitas' => $request->tanggal_aktifitas,
            'nama_admin_aktifitas' => $request->nama_admin_aktifitas,
            'nama_pengguna_aktifitas' => $request->nama_pengguna_aktifitas,
            'nominal_aktifitas' => $request->nominal_aktifitas,
            'kegiatan_aktifitas' => $request->kegiatan_aktifitas,
            'penerima_aktifitas' => $request->penerima_aktifitas,
            'transfer_aktifitas' => $request->transfer_aktifitas,
            'imbuhan_aktifitas' => $request->imbuhan_aktifitas,
        ];
        AktifitasModel::create($data);
        return redirect()->to('/admin/aktifitas')->with('success', 'berhasil manambah data');
    }

    public function admin_aktifitas_update($id_aktifitas, Request $request)
    {
        $request->validate([
            'tanggal_aktifitas' => 'required',
            'nama_admin_aktifitas' => 'required',
            'nama_pengguna_aktifitas' => 'required',
            'nominal_aktifitas' => 'required',
            'kegiatan_aktifitas' => 'required',
        ], [
            'tanggal_aktifitas.required' => 'tanggal harus diisi',
            'nama_admin_aktifitas.required' => 'petugas harus diisi',
            'nama_pengguna_aktifitas.required' => 'pengguna harus diisi',
            'nominal_aktifitas.required' => 'nominal harus diisi',
            'kegiatan_aktifitas.required' => 'transaksi harus diisi',
        ]);


        $aktifitas = AktifitasModel::find($id_aktifitas);
        $aktifitas->update($request->except(['_token', 'submit']));
        return redirect()->to('/admin/aktifitas')->with('success', 'berhasil mengupdate data');
    }


    public function aktifitas_banking_penarikan_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/aktifitas_banking_penarikan_edit', $data);
    }

    public function aktifitas_banking_penarikan_update(Request $request)
    {

        FacadesSession::flash('tanggal_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_admin_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_pengguna_aktifitas', $request->aktifitas);
        FacadesSession::flash('nominal_aktifitas', $request->aktifitas);
        FacadesSession::flash('kegiatan_aktifitas', $request->aktifitas);

        $request->validate([
            'tanggal_aktifitas' => 'required',
            'nama_admin_aktifitas' => 'required',
            'nama_pengguna_aktifitas' => 'required',
            'nominal_aktifitas' => 'required',
            'kegiatan_aktifitas' => 'required',
        ], [
            'tanggal_aktifitas.required' => 'tanggal harus diisi',
            'nama_admin_aktifitas.required' => 'nama admin harus diisi',
            'nama_pengguna_aktifitas.required' => 'nama pengguna harus diisi',
            'nominal_aktifitas.required' => 'jnominal harus diisi',
            'kegiatan_aktifitas.required' => 'transaksi harus diisi',
        ]);

        $data = [
            'tanggal_aktifitas' => $request->tanggal_aktifitas,
            'nama_admin_aktifitas' => $request->nama_admin_aktifitas,
            'nama_pengguna_aktifitas' => $request->nama_pengguna_aktifitas,
            'nominal_aktifitas' => $request->nominal_aktifitas,
            'kegiatan_aktifitas' => $request->kegiatan_aktifitas,
            'penerima_aktifitas' => ' ',
            'transfer_aktifitas' => ' ',
            'imbuhan_aktifitas' => ' ',
        ];
        AktifitasModel::create($data);
        return redirect()->to('/admin/banking')->with('success', 'berhasil manambah data');
    }

    public function aktifitas_banking_tabungan_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/aktifitas_banking_tabungan_edit', $data);
    }

    public function aktifitas_banking_tabungan_update(Request $request)
    {

        FacadesSession::flash('tanggal_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_admin_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_pengguna_aktifitas', $request->aktifitas);
        FacadesSession::flash('nominal_aktifitas', $request->aktifitas);
        FacadesSession::flash('kegiatan_aktifitas', $request->aktifitas);

        $request->validate([
            'tanggal_aktifitas' => 'required',
            'nama_admin_aktifitas' => 'required',
            'nama_pengguna_aktifitas' => 'required',
            'nominal_aktifitas' => 'required',
            'kegiatan_aktifitas' => 'required',
        ], [
            'tanggal_aktifitas.required' => 'tanggal harus diisi',
            'nama_admin_aktifitas.required' => 'nama admin harus diisi',
            'nama_pengguna_aktifitas.required' => 'nama pengguna harus diisi',
            'nominal_aktifitas.required' => 'jnominal harus diisi',
            'kegiatan_aktifitas.required' => 'transaksi harus diisi',
        ]);

        $data = [
            'tanggal_aktifitas' => $request->tanggal_aktifitas,
            'nama_admin_aktifitas' => $request->nama_admin_aktifitas,
            'nama_pengguna_aktifitas' => $request->nama_pengguna_aktifitas,
            'nominal_aktifitas' => $request->nominal_aktifitas,
            'kegiatan_aktifitas' => $request->kegiatan_aktifitas,
            'penerima_aktifitas' => ' ',
            'transfer_aktifitas' => ' ',
            'imbuhan_aktifitas' => ' ',
        ];
        AktifitasModel::create($data);
        return redirect()->to('/admin/banking')->with('success', 'berhasil manambah data');
    }

    public function aktifitas_banking_transfer_edit($id_transaksi)
    {

        $transaksis = TransaksiModel::find($id_transaksi);

        $data = [
            'transaksis' => $transaksis,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/aktifitas_banking_transfer_edit', $data);
    }

    public function aktifitas_banking_transfer_update(Request $request)
    {

        FacadesSession::flash('tanggal_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_admin_aktifitas', $request->aktifitas);
        FacadesSession::flash('nama_pengguna_aktifitas', $request->aktifitas);
        FacadesSession::flash('nominal_aktifitas', $request->aktifitas);
        FacadesSession::flash('kegiatan_aktifitas', $request->aktifitas);

        $request->validate([
            'tanggal_aktifitas' => 'required',
            'nama_admin_aktifitas' => 'required',
            'nama_pengguna_aktifitas' => 'required',
            'nominal_aktifitas' => 'required',
            'kegiatan_aktifitas' => 'required',
            'penerima_aktifitas' => 'required',
            'transfer_aktifitas' => 'required',
            'imbuhan_aktifitas' => 'required',
        ], [
            'tanggal_aktifitas.required' => 'tanggal harus diisi',
            'nama_admin_aktifitas.required' => 'nama admin harus diisi',
            'nama_pengguna_aktifitas.required' => 'nama pengguna harus diisi',
            'nominal_aktifitas.required' => 'jnominal harus diisi',
            'kegiatan_aktifitas.required' => 'transaksi harus diisi',
            'penerima_aktifitas.required' => 'penerima harus diisi',
            'transfer_aktifitas.required' => 'transfer harus diisi',
            'imbuhan_aktifitas.required' => 'catatan harus diisi',
        ]);

        $data = [
            'tanggal_aktifitas' => $request->tanggal_aktifitas,
            'nama_admin_aktifitas' => $request->nama_admin_aktifitas,
            'nama_pengguna_aktifitas' => $request->nama_pengguna_aktifitas,
            'nominal_aktifitas' => $request->nominal_aktifitas,
            'kegiatan_aktifitas' => $request->kegiatan_aktifitas,
            'penerima_aktifitas' => $request->penerima_aktifitas,
            'transfer_aktifitas' => $request->transfer_aktifitas,
            'imbuhan_aktifitas' => $request->imbuhan_aktifitas,
        ];
        AktifitasModel::create($data);
        return redirect()->to('/admin/banking')->with('success', 'berhasil manambah data');
    }

    public function tabungan_input()
    {
        $data = [
            "user" => User::all(),
            "userv" => User::all(),
            "totaltabungan" => TotalTabunganModel::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/tabungan_input', $data);
    }

    public function tabungan_edit($id_tabungan)
    {

        $tabungan = TabunganModel::find($id_tabungan);

        $data = [
            'tabungan' => $tabungan,
            "totaltabungan" => TotalTabunganModel::all(),
            "user" => User::all(),
            "userv" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/tabungan_edit', $data);
    }

    public function admin_tabungan_save(Request $request)
    {

        FacadesSession::flash('tanggal_tabungan', $request->tanggal_tabungan);
        FacadesSession::flash('fullname_tabungan', $request->fullname_tabungan);
        FacadesSession::flash('username_tabungan', $request->username_tabungan);
        FacadesSession::flash('nominal_tabungan', $request->nominal_tabungan);
        FacadesSession::flash('jenis_penabung', $request->jenis_penabung);

        $request->validate([
            'tanggal_tabungan' => 'required',
            'fullname_tabungan' => 'required',
            'username_tabungan' => 'required',
            'nominal_tabungan' => 'required',
            'keterangan_tabungan' => 'required',
            'jenis_penabung' => 'required',
        ], [
            'tanggal_tabungan.required' => 'tanggal harus diisi',
            'fullname_tabungan.required' => 'nama harus diisi',
            'username_tabungan.required' => 'username harus diisi',
            'nominal_tabungan.required' => 'nominal harus diisi',
            'keterangan_tabungan.required' => 'petugas harus diisi',
            'jenis_penabung.required' => 'nominal harus diisi',
        ]);

        $data = [
            'tanggal_tabungan' => $request->tanggal_tabungan,
            'fullname_tabungan' => $request->fullname_tabungan,
            'username_tabungan' => $request->username_tabungan,
            'nominal_tabungan' => $request->nominal_tabungan,
            'jenis_penabung' => $request->jenis_penabung,
            'keterangan_tabungan' => $request->keterangan_tabungan,
        ];
        TabunganModel::create($data);
        return redirect()->to('/admin/transaksi')->with('success', 'berhasil manambah data');
    }

    public function admin_tabungan_update($id_tabungan, Request $request)
    {
        $request->validate([
            'tanggal_tabungan' => 'required',
            'fullname_tabungan' => 'required',
            'username_tabungan' => 'required',
            'nominal_tabungan' => 'required',
            'keterangan_tabungan' => 'required',
            'jenis_penabung' => 'required',
        ], [
            'tanggal_tabungan.required' => 'tanggal harus diisi',
            'fullname_tabungan.required' => 'nama harus diisi',
            'username_tabungan.required' => 'username harus diisi',
            'nominal_tabungan.required' => 'nominal harus diisi',
            'keterangan_tabungan.required' => 'petugas harus diisi',
            'jenis_penabung.required' => 'nominal harus diisi',
        ]);


        $tabungan = TabunganModel::find($id_tabungan);
        $tabungan->update($request->except(['_token', 'submit']));
        return redirect()->to('/admin/transaksi')->with('success', 'berhasil mengupdate data');
    }

    public function penarikan_input()
    {
        $data = [
            "user" => User::all(),
            "totaltabungan" => TotalTabunganModel::all(),
            "userv" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/penarikan_input', $data);
    }

    public function penarikan_edit($id_penarikan)
    {

        $penarikan = penarikanModel::find($id_penarikan);

        $data = [
            'penarikan' => $penarikan,
            "totaltabungan" => TotalTabunganModel::all(),
            "user" => User::all(),
            "userv" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/admin/penarikan_edit', $data);
    }

    public function admin_penarikan_save(Request $request)
    {

        FacadesSession::flash('tanggal_penarikan', $request->tanggal_penarikan);
        FacadesSession::flash('fullname_penarikan', $request->fullname_penarikan);
        FacadesSession::flash('nominal_penarikan', $request->nominal_penarikan);
        FacadesSession::flash('jenis_penarikan', $request->jenis_penarikan);
        FacadesSession::flash('username_penarikan', $request->username_penarikan);
        FacadesSession::flash('keterangan_penarikan', $request->keterangan_penarikan);

        $request->validate([
            'tanggal_penarikan' => 'required',
            'fullname_penarikan' => 'required',
            'username_penarikan' => 'required',
            'nominal_penarikan' => 'required',
            'jenis_penarikan' => 'required',
            'keterangan_penarikan' => 'required',
        ], [
            'tanggal_penarikan.required' => 'tanggal harus diisi',
            'fullname_penarikan.required' => 'nama harus diisi',
            'username_penarikan.required' => 'username harus diisi',
            'nominal_penarikan.required' => 'nominal harus diisi',
            'jenis_penarikan.required' => 'jenis penarikan harus diisi',
            'keterangan_penarikan.required' => 'petugas harus diisi',
        ]);

        $data = [
            'tanggal_penarikan' => $request->tanggal_penarikan,
            'fullname_penarikan' => $request->fullname_penarikan,
            'username_penarikan' => $request->username_penarikan,
            'nominal_penarikan' => $request->nominal_penarikan,
            'jenis_penarikan' => $request->jenis_penarikan,
            'keterangan_penarikan' => $request->keterangan_penarikan,
        ];
        PenarikanModel::create($data);
        return redirect()->to('/admin/transaksi')->with('success', 'berhasil manambah data');
    }

    public function admin_penarikan_update($id_penarikan, Request $request)
    {
        $request->validate([
            'tanggal_penarikan' => 'required',
            'fullname_penarikan' => 'required',
            'username_penarikan' => 'required',
            'nominal_penarikan' => 'required',
            'jenis_penarikan' => 'required',
            'keterangan_penarikan' => 'required',
        ], [
            'tanggal_penarikan.required' => 'tanggal harus diisi',
            'fullname_penarikan.required' => 'nama harus diisi',
            'username_penarikan.required' => 'username harus diisi',
            'nominal_penarikan.required' => 'nominal harus diisi',
            'jenis_penarikan.required' => 'jenis penarikan harus diisi',
            'keterangan_penarikan.required' => 'petugas harus diisi',
        ]);

        $penarikan = PenarikanModel::find($id_penarikan);
        $penarikan->update($request->except(['_token', 'submit']));
        return redirect()->to('/admin/transaksi')->with('success', 'berhasil mengupdate data');
    }

    public function transaksi_hapus($id_transaksi)
    {
        $transaksi = TransaksiModel::find($id_transaksi);
        $transaksi->delete();
        return redirect()->to('/admin/banking')->with('success', 'berhasil menghapus data');
    }

    public function tabungan_hapus($id_tabungan)
    {
        $tabungan = TabunganModel::find($id_tabungan);
        $tabungan->delete();
        return redirect()->to('/admin/transaksi')->with('success', 'berhasil menghapus data');
    }

    public function penarikan_hapus($id_penarikan)
    {
        $penarikan = PenarikanModel::find($id_penarikan);
        $penarikan->delete();
        return redirect()->to('/admin/transaksi')->with('success', 'berhasil menghapus data');
    }

    public function aktifitas_hapus($id_aktifitas)
    {
        $aktifitas = aktifitasModel::find($id_aktifitas);
        $aktifitas->delete();
        return redirect()->to('/admin/aktifitas')->with('success', 'berhasil menghapus data');
    }
}

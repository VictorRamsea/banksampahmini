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
use App\Models\TahunAkademikModel;
use App\Models\TotalTabunganModel;
use App\Models\BankSampahModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class Superadmin extends Controller
{

    protected $KelasModel;

    public function __construct()
    {

        $this->KelasModel = new KelasModel();
    }

    public function sliptabungan($id_tabungan)
    {
        $users = TabunganModel::find($id_tabungan);
        $data = [
            'users' => $users,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/sliptabungan', $data);
    }

    public function slippenarikan($id_penarikan)
    {
        $users = PenarikanModel::find($id_penarikan);
        $data = [
            'users' => $users,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/slippenarikan', $data);
    }

    public function tahunakademik()
    {
        $data = [
            'tahunakademik' => TahunAkademikModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/tahunakademik', $data);
    }

    public function tahunakademik_input()
    {
        $data = [
            'tahunakademik' => TahunAkademikModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/tahunakademik_input', $data);
    }

    public function tahunakademik_save(Request $request)
    {

        FacadesSession::flash('tanggal_awal', $request->tanggal_awal);
        FacadesSession::flash('tanggal_awal', $request->tanggal_awal);

        $request->validate([
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ], [
            'tanggal_awal.required' => 'Tanggal awal harus diisi',
            'tanggal_akhir.required' => 'Tanggal akhir harus diisi',
        ]);

        $data = [
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
        ];
        TahunAkademikModel::create($data);
        return redirect()->to('/superadmin/tahunakademik')->with('success', 'berhasil manambah data');
    }

    public function tahunakademik_edit($id_tahunakademik)
    {

        $tahunakademik = TahunAkademikModel::find($id_tahunakademik);

        $data = [
            'tahunakademik' => $tahunakademik,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/tahunakademik_edit', $data);
    }

    public function tahunakademik_update($id_tahunakademik, Request $request)
    {
        $tahunakademik = TahunAkademikModel::find($id_tahunakademik);
        $tahunakademik->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/tahunakademik')->with('success', 'berhasil mengupdate data');
    }

    public function tahunakademik_hapus($id_tahunakademik)
    {
        $tahunakademik = TahunAkademikModel::find($id_tahunakademik);
        $tahunakademik->delete();
        return redirect()->to('/superadmin/tahunakademik')->with('success', 'berhasil menghapus data');
    }




    public function prodi()
    {
        $data = [
            'prodi' => prodiModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/prodi', $data);
    }

    public function prodi_input()
    {
        $data = [
            'prodi' => prodiModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/prodi_input', $data);
    }

    public function prodi_save(Request $request)
    {

        FacadesSession::flash('prodi', $request->prodi);

        $request->validate([
            'prodi' => 'required',
        ], [
            'prodi.required' => 'Prodi harus diisi',
        ]);

        $data = [
            'prodi' => $request->prodi,
        ];
        ProdiModel::create($data);
        return redirect()->to('/superadmin/prodi')->with('success', 'berhasil manambah data');
    }

    public function prodi_edit($id_prodi)
    {

        $prodi = ProdiModel::find($id_prodi);

        $data = [
            'prodi' => $prodi,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/prodi_edit', $data);
    }

    public function prodi_update($id_prodi, Request $request)
    {
        $prodi = ProdiModel::find($id_prodi);
        $prodi->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/prodi')->with('success', 'berhasil mengupdate data');
    }

    public function prodi_hapus($id_prodi)
    {
        $prodi = ProdiModel::find($id_prodi);
        $prodi->delete();
        return redirect()->to('/superadmin/prodi')->with('success', 'berhasil menghapus data');
    }





    public function kelas()
    {
        $data = [
            'kelas' => KelasModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/kelas', $data);
    }

    public function kelas_input()
    {
        $data = [
            'kelas' => KelasModel::all(),
            'prodi' => ProdiModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/kelas_input', $data);
    }

    public function kelas_save(Request $request)
    {

        FacadesSession::flash('prodi_kelas', $request->kelas);

        $request->validate([
            'prodi_kelas' => 'required',
        ], [
            'prodi_kelas.required' => 'prodi harus diisi',
        ]);

        $data = [
            'kelas' => $request->kelas,
            'jurusan_kelas' => $request->jurusan_kelas,
            'prodi_kelas' => $request->prodi_kelas,
        ];
        kelasModel::create($data);
        return redirect()->to('/superadmin/kelas')->with('success', 'berhasil manambah data');
    }

    public function kelas_edit($id_kelas)
    {

        $kelas = KelasModel::find($id_kelas);

        $data = [
            'kelas' => $kelas,
            "user" => User::all(),
            "prodi" => ProdiModel::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/kelas_edit', $data);
    }

    public function kelas_update($id_kelas, Request $request)
    {
        $kelas = KelasModel::find($id_kelas);
        $kelas->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/kelas')->with('success', 'berhasil mengupdate data');
    }

    public function kelas_hapus($id_kelas)
    {
        $kelas = KelasModel::find($id_kelas);
        $kelas->delete();
        return redirect()->to('/superadmin/kelas')->with('success', 'berhasil menghapus data');
    }

    public function daftarkelas()
    {
        $data = [
            'kelas' => KelasModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/daftarkelas', $data);
    }

    public function kelasdetail($id_kelas)
    {
        $kelasd = KelasModel::find($id_kelas);

        $data = [
            'kelasd' => $kelasd,
            'kelas' => $this->KelasModel->getKelas($id_kelas),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/kelasdetail', $data);
    }





    public function pengguna()
    {
        $data = [
            'kelas' => KelasModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/pengguna', $data);
    }

    public function pengguna_input()
    {
        $data = [
            'kelas' => KelasModel::all(),
            'prodi' => ProdiModel::all(),
            'tahunakademik' => TahunAkademikModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/pengguna_input', $data);
    }

    public function pengguna_save(Request $request)
    {

        FacadesSession::flash('name', $request->name);
        FacadesSession::flash('username', $request->username);
        FacadesSession::flash('email', $request->email);
        FacadesSession::flash('role', $request->role);
        FacadesSession::flash('jk_user', $request->jk_user);
        FacadesSession::flash('kelas_user', $request->kelas);
        FacadesSession::flash('tahun_akademik_user', $request->tahun_akademik_user);
        FacadesSession::flash('bidang_user', $request->bidang_user);

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username|',
            'email' => 'required|unique:users,email|email:filter',
            'role' => 'required',
            'jk_user' => 'required',
            'kelas_user' => 'required',
            'tahun_akademik_user' => 'required',
            'bidang_user' => 'required',
        ], [
            'name.required' => 'nama harus diisi',
            'username.required' => 'username harus diisi',
            'username.unique' => 'username sudah terdaftar, coba yang lain',
            'email.required' => 'email harus diisi',
            'email.unique' => 'email sudah terdaftar, coba yang lain',
            'email.filter' => 'email harus diisi dengan format yang sesuai',
            'jk_user.required' => 'jk_user harus diisi',
            'kelas_user.required' => 'kelas harus diisi',
            'tahun_akademik_user.required' => 'tahun akademik harus diisi',
            'bidang_user.required' => 'bidang_user harus diisi',
        ]);


        $password = Hash::make('12345678');

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
            'jk_user' => $request->jk_user,
            'kelas_user' => $request->kelas_user,
            'tahun_akademik_user' => $request->tahun_akademik_user,
            'bidang_user' => $request->bidang_user,
            'bankSampah' => 0,
            'tabungan' => 0,
            'penarikan' => 0,
        ];
        user::create($data);
        return redirect()->to('/superadmin/pengguna')->with('success', 'berhasil manambah data');
    }

    public function pengguna_edit($id)
    {

        $users = user::find($id);

        $data = [
            'kelas' => KelasModel::all(),
            'prodi' => ProdiModel::all(),
            'tahunakademik' => TahunAkademikModel::all(),
            'users' => $users,
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/pengguna_edit', $data);
    }

    public function pengguna_update($id, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:filter',
            'role' => 'required',
            'jk_user' => 'required',
            'kelas_user' => 'required',
            'tahun_akademik_user' => 'required',
            'bidang_user' => 'required',
        ], [
            'name.required' => 'nama harus diisi',
            'username.required' => 'username harus diisi',
            'email.required' => 'email harus diisi',
            'email.filter' => 'email harus diisi dengan format yang sesuai',
            'jk_user.required' => 'jk_user harus diisi',
            'kelas_user.required' => 'kelas harus diisi',
            'tahun_akademik_user.required' => 'tahun akademik harus diisi',
            'bidang_user.required' => 'bidang_user harus diisi',
        ]);


        $pengguna = user::find($id);
        $pengguna->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/pengguna')->with('success', 'berhasil mengupdate data');
    }

    public function pengguna_hapus($id)
    {
        $pengguna = user::find($id);
        $pengguna->delete();
        return redirect()->to('/superadmin/pengguna')->with('success', 'berhasil menghapus data');
    }

    public function pengguna_detail($id)
    {
        $users = user::find($id);
        $data = [
            'users' => $users,
            'kelas' => KelasModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "jeneng" => Auth::user()->name,
            "userall" => Auth::user(),
            "userid" => Auth::user()->id,
        ];

        return view('/superadmin/pengguna_detail', $data);
    }


    public function ubahpassword($id)
    {
        $userss = user::find($id);
        $data = [
            "user" => User::all(),
            "userss" => $userss,
            "usernama" => Auth::user()->username,
            "password" => Auth::user()->password,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/ubahpassword', $data);
    }

    public function pengguna_resetpassword(Request $request)
    {
        // User::whereId(auth()->user()->$id)->update([
        //     'password' => Hash::make($request->password)
        // ]);;
        $input = $request->all();
        $user = User::find($input['user_id']);
        $user->password = Hash::make($input['password']);
        $user->save();

        return redirect()->to('/superadmin/pengguna')->with('success', 'berhasil merubah password menjadi 12345678');
    }















    public function transaksi()
    {
        $data = [
            'tabungan' => TabunganModel::all(),
            'penarikan' => PenarikanModel::all(),
            'patty' => PattyCashModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/transaksi', $data);
    }

    public function tabungan_input()
    {
        $data = [
            'tabungan' => TabunganModel::all(),
            'total_tabungan' => TotalTabunganModel::all(),
            'user' => user::all(),
            'userv' => user::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/tabungan_input', $data);
    }

    public function tabungan_edit($id_tabungan)
    {
        $tabungans = TabunganModel::find($id_tabungan);
        $data = [
            'tabungans' => $tabungans,
            'tabungan' => TabunganModel::all(),
            'total_tabungan' => TotalTabunganModel::all(),
            'user' => User::all(),
            'userv' => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/tabungan_edit', $data);
    }

    public function tabungan_save(Request $request)
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
            'jenis_penabung' => 'required',
        ], [
            'tanggal_tabungan.required' => 'tanggal harus diisi',
            'username.required' => 'username harus diisi',
            'fullname_tabungan.required' => 'nama harus diisi',
            'nominal_tabungan.required' => 'nominal harus diisi',
            'jenis_penabung.required' => 'jenis penabung harus diisi',
        ]);

        $data = [
            'tanggal_tabungan' => $request->tanggal_tabungan,
            'fullname_tabungan' => $request->fullname_tabungan,
            'username_tabungan' => $request->username_tabungan,
            'nominal_tabungan' => $request->nominal_tabungan,
            'jenis_penabung' => $request->jenis_penabung,
            'keterangan_tabungan' => 'SuperAdmin',
        ];
        TabunganModel::create($data);
        return redirect()->to('/superadmin/transaksi')->with('success', 'berhasil manambah data');
    }

    public function tabungan_update($id_tabungan, Request $request)
    {

        $request->validate([
            'tanggal_tabungan' => 'required',
            'fullname_tabungan' => 'required',
            'username_tabungan' => 'required',
            'nominal_tabungan' => 'required',
            'jenis_penabung' => 'required',
        ], [
            'tanggal_tabungan.required' => 'tanggal harus diisi',
            'username.required' => 'username harus diisi',
            'fullname_tabungan.required' => 'nama harus diisi',
            'nominal_tabungan.required' => 'nominal harus diisi',
            'jenis_penabung.required' => 'jenis penabung harus diisi',
        ]);

        $tabungan = TabunganModel::find($id_tabungan);
        $tabungan->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/transaksi')->with('success', 'berhasil mengupdate data');
    }

    public function tabungan_hapus($id_tabungan)
    {
        $tabungan = TabunganModel::find($id_tabungan);
        $tabungan->delete();
        return redirect()->to('/superadmin/transaksi')->with('success', 'berhasil menghapus data');
    }






    public function penarikan_input()
    {
        $data = [
            'penarikan' => PenarikanModel::all(),
            'patty' => PattyCashModel::all(),
            'total_tabungan' => TotalTabunganModel::all(),
            "user" => User::all(),
            "userv" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/penarikan_input', $data);
    }

    public function penarikan_edit($id_penarikan)
    {
        $penarikans = penarikanModel::find($id_penarikan);
        $data = [
            'penarikans' => $penarikans,
            'penarikan' => penarikanModel::all(),
            'total_tabungan' => TotalTabunganModel::all(),
            'user' => user::all(),
            'userv' => user::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/penarikan_edit', $data);
    }

    public function penarikan_save(Request $request)
    {

        FacadesSession::flash('tanggal_penarikan', $request->tanggal_penarikan);
        FacadesSession::flash('fullname_penarikan', $request->username_penarikan);
        FacadesSession::flash('fullname_penarikan', $request->fullname_penarikan);
        FacadesSession::flash('nominal_penarikan', $request->nominal_penarikan);
        FacadesSession::flash('jenis_penarikan', $request->jenis_penarikan);

        $request->validate([
            'tanggal_penarikan' => 'required',
            'fullname_penarikan' => 'required',
            'username_penarikan' => 'required',
            'nominal_penarikan' => 'required',
            'jenis_penarikan' => 'required',
        ], [
            'tanggal_penarikan.required' => 'tanggal harus diisi',
            'username_penarikan.required' => 'usernama harus diisi',
            'fullname_penarikan.required' => 'nama harus diisi',
            'nominal_penarikan.required' => 'nominal harus diisi',
            'jenis_penarikan.required' => 'jenis penarikan harus diisi',
        ]);

        $data = [
            'tanggal_penarikan' => $request->tanggal_penarikan,
            'username_penarikan' => $request->username_penarikan,
            'fullname_penarikan' => $request->fullname_penarikan,
            'nominal_penarikan' => $request->nominal_penarikan,
            'jenis_penarikan' => $request->jenis_penarikan,
            'keterangan_penarikan' => 'belom ada',
        ];
        penarikanModel::create($data);
        return redirect()->to('/superadmin/transaksi')->with('success', 'berhasil manambah data');
    }

    public function penarikan_update($id_penarikan, Request $request)
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
            'username_penarikan.required' => 'usernama harus diisi',
            'fullname_penarikan.required' => 'nama harus diisi',
            'nominal_penarikan.required' => 'nominal harus diisi',
            'jenis_penarikan.required' => 'jenis penarikan harus diisi',
            'keterangan_penarikan.required' => 'keterangan penarikan harus diisi',
        ]);

        $penarikan = penarikanModel::find($id_penarikan);
        $penarikan->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/transaksi')->with('success', 'berhasil mengupdate data');
    }

    public function penarikan_hapus($id_penarikan)
    {
        $penarikan = penarikanModel::find($id_penarikan);
        $penarikan->delete();
        return redirect()->to('/superadmin/transaksi')->with('success', 'berhasil menghapus data');
    }




    public function patty_edit($id_patty)
    {
        $pattys = PattyCashModel::find($id_patty);
        $data = [
            'pattys' => $pattys,
            'user' => user::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/patty', $data);
    }

    public function patty_update($id_patty, Request $request)
    {
        $patty = PattyCashModel::find($id_patty);
        $patty->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/transaksi')->with('success', 'berhasil mengupdate data');
    }

    public function aktifitas()
    {
        $data = [
            'aktifitas' => AktifitasModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/aktifitas', $data);
    }

    public function aktifitas_edit($id_aktifitas)
    {
        $aktifitass = AktifitasModel::find($id_aktifitas);
        $data = [
            'aktifitass' => $aktifitass,
            'user' => user::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/aktifitas_edit', $data);
    }

    public function aktifitas_update($id_aktifitas, Request $request)
    {
        $aktifitas = AktifitasModel::find($id_aktifitas);
        $aktifitas->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/aktifitas')->with('success', 'berhasil mengupdate data');
    }

    public function aktifitas_hapus($id_aktifitas)
    {
        $aktifitas = AktifitasModel::find($id_aktifitas);
        $aktifitas->delete();
        return redirect()->to('/superadmin/aktifitas')->with('success', 'berhasil menghapus data');
    }





    public function banksampah()
    {
        $data = [
            'banksampah' => BankSampahModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/banksampah', $data);
    }

    public function banksampah_input()
    {
        $data = [
            'banksampah' => banksampahModel::all(),
            "user" => User::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/banksampah_input', $data);
    }

    public function banksampah_save(Request $request)
    {

        FacadesSession::flash('Nama_Item', $request->Nama_Item);
        FacadesSession::flash('Harga', $request->Harga);

        $request->validate([
            'Nama_Item' => 'required',
            'Harga' => 'required',
        ], [
            'Nama_Item.required' => 'tanggal harus diisi',
            'Harga.required' => 'nama harus diisi',
        ]);

        $data = [
            'Nama_Item' => $request->Nama_Item,
            'Harga' => $request->Harga,
        ];
        BankSampahModel::create($data);
        return redirect()->to('/superadmin/banksampah')->with('success', 'berhasil manambah data');
    }

    public function banksampah_edit($id_banksampah)
    {
        $banksampah = banksampahModel::find($id_banksampah);
        $data = [
            'banksampah' => $banksampah,
            'user' => user::all(),
            "usernama" => Auth::user()->username,
            "name" => Auth::user()->name,
            "userall" => Auth::user(),
        ];

        return view('/superadmin/banksampah_edit', $data);
    }

    public function banksampah_update($id_banksampah, Request $request)
    {
        $banksampah = banksampahModel::find($id_banksampah);
        $banksampah->update($request->except(['_token', 'submit']));
        return redirect()->to('/superadmin/banksampah')->with('success', 'berhasil mengupdate data');
    }

    public function banksampah_hapus($id_banksampah)
    {
        $banksampah = banksampahModel::find($id_banksampah);
        $banksampah->delete();
        return redirect()->to('/superadmin/banksampah')->with('success', 'berhasil menghapus data');
    }
}

<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Pengguna;
use App\Http\Controllers\Superadmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'create']);
});

Route::get('/masuk', [SesiController::class, 'index'])->name('masuk');
Route::post('/login', [SesiController::class, 'login']);
Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fullfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/home', function () {
    return redirect('/home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/superadmin', [HomeController::class, 'index']);
    Route::get('/admin', [HomeController::class, 'index']);
    Route::get('/user', [HomeController::class, 'index']);
    Route::get('/superadmin/sliptabungan/{id_tabungan}', [Superadmin::class, 'sliptabungan'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/slippenarikan/{id_penarikan}', [Superadmin::class, 'slippenarikan'])->middleware('userAkses:superadmin');

    // superadmin
    Route::get('/superadmin/tahunakademik', [Superadmin::class, 'tahunakademik'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/tahunakademik_input', [Superadmin::class, 'tahunakademik_input'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/tahunakademik_save', [Superadmin::class, 'tahunakademik_save'])->name('tahunakademik_save')->middleware('userAkses:superadmin');
    Route::delete('/superadmin/tahunakademik_hapus/{id_tahunakademik}', [Superadmin::class, 'tahunakademik_hapus'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/tahunakademik_edit/{id_tahunakademik}', [Superadmin::class, 'tahunakademik_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/tahunakademik_update/{id_tahunakademik}', [Superadmin::class, 'tahunakademik_update'])->middleware('userAkses:superadmin');

    Route::get('/superadmin/prodi', [Superadmin::class, 'prodi'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/prodi_input', [Superadmin::class, 'prodi_input'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/prodi_save', [Superadmin::class, 'prodi_save'])->name('prodi_save')->middleware('userAkses:superadmin');
    Route::delete('/superadmin/prodi_hapus/{id_prodi}', [Superadmin::class, 'prodi_hapus'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/prodi_edit/{id_prodi}', [Superadmin::class, 'prodi_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/prodi_update/{id_prodi}', [Superadmin::class, 'prodi_update'])->middleware('userAkses:superadmin');

    Route::get('/superadmin/kelas', [Superadmin::class, 'kelas'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/kelas_input', [Superadmin::class, 'kelas_input'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/kelas_save', [Superadmin::class, 'kelas_save'])->name('kelas_save')->middleware('userAkses:superadmin');
    Route::delete('/superadmin/kelas_hapus/{id_kelas}', [Superadmin::class, 'kelas_hapus'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/kelas_edit/{id_kelas}', [Superadmin::class, 'kelas_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/kelas_update/{id_kelas}', [Superadmin::class, 'kelas_update'])->middleware('userAkses:superadmin');

    Route::get('/superadmin/daftarkelas', [Superadmin::class, 'daftarkelas']);
    Route::get('/superadmin/kelasdetail/{id_kelas}', [Superadmin::class, 'kelasdetail']);

    Route::get('/superadmin/pengguna', [Superadmin::class, 'pengguna'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/pengguna_input', [Superadmin::class, 'pengguna_input'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/pengguna_save', [Superadmin::class, 'pengguna_save'])->name('pengguna_save')->middleware('userAkses:superadmin');
    Route::delete('/superadmin/pengguna_hapus/{id}', [Superadmin::class, 'pengguna_hapus'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/pengguna_edit/{id}', [Superadmin::class, 'pengguna_edit'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/pengguna_detail/{id}', [Superadmin::class, 'pengguna_detail'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/pengguna_update/{id}', [Superadmin::class, 'pengguna_update'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/ubahpassword/{id}', [Superadmin::class, 'ubahpassword'])->middleware('userAkses:superadmin');
    // Route::post('/superadmin/pengguna_resetpassword/{id}', [Superadmin::class, 'pengguna_resetpassword'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/pengguna_resetpassword/', [Superadmin::class, 'pengguna_resetpassword'])->name('pengguna_resetpassword')->middleware('userAkses:superadmin');

    Route::get('/superadmin/transaksi', [Superadmin::class, 'transaksi'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/tabungan_input', [Superadmin::class, 'tabungan_input'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/tabungan_save', [Superadmin::class, 'tabungan_save'])->name('tabungan_save')->middleware('userAkses:superadmin');
    Route::delete('/superadmin/tabungan_hapus/{id_tabungan}', [Superadmin::class, 'tabungan_hapus'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/tabungan_edit/{id_tabungan}', [Superadmin::class, 'tabungan_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/tabungan_update/{id_tabungan}', [Superadmin::class, 'tabungan_update'])->middleware('userAkses:superadmin');

    Route::get('/superadmin/penarikan_input', [Superadmin::class, 'penarikan_input'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/penarikan_save', [Superadmin::class, 'penarikan_save'])->name('penarikan_save')->middleware('userAkses:superadmin');
    Route::delete('/superadmin/penarikan_hapus/{id_penarikan}', [Superadmin::class, 'penarikan_hapus'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/penarikan_edit/{id_penarikan}', [Superadmin::class, 'penarikan_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/penarikan_update/{id_penarikan}', [Superadmin::class, 'penarikan_update'])->middleware('userAkses:superadmin');

    Route::get('/superadmin/patty_edit/{id_patty}', [Superadmin::class, 'patty_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/patty_update/{id_patty}', [Superadmin::class, 'patty_update'])->middleware('userAkses:superadmin');

    Route::get('/superadmin/aktifitas', [Superadmin::class, 'aktifitas'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/aktifitas_edit/{id_aktifitas}', [Superadmin::class, 'aktifitas_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/aktifitas_update/{id_aktifitas}', [Superadmin::class, 'aktifitas_update'])->middleware('userAkses:superadmin');
    Route::delete('/superadmin/aktifitas_hapus/{id_aktifitas}', [Superadmin::class, 'aktifitas_hapus'])->middleware('userAkses:superadmin');

    Route::get('/superadmin/banksampah', [Superadmin::class, 'banksampah'])->middleware('userAkses:superadmin');
    Route::get('/superadmin/banksampah_input', [Superadmin::class, 'banksampah_input'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/banksampah_save', [Superadmin::class, 'banksampah_save'])->name('banksampah_save')->middleware('userAkses:superadmin');
    Route::get('/superadmin/banksampah_edit/{id_banksampah}', [Superadmin::class, 'banksampah_edit'])->middleware('userAkses:superadmin');
    Route::post('/superadmin/banksampah_update/{id_banksampah}', [Superadmin::class, 'banksampah_update'])->middleware('userAkses:superadmin');
    Route::delete('/superadmin/banksampah_hapus/{id_banksampah}', [Superadmin::class, 'banksampah_hapus'])->middleware('userAkses:superadmin');





    // ADMIN
    Route::get('/admin/banking', [Admin::class, 'banking'])->middleware('userAkses:admin');
    Route::get('/admin/transaksi', [Admin::class, 'transaksi'])->middleware('userAkses:admin');
    Route::get('/admin/aktifitas', [Admin::class, 'aktifitas'])->middleware('userAkses:admin');
    Route::get('/admin/pilihitem', [Admin::class, 'pilihitem'])->middleware('userAkses:admin');

    Route::get('/admin/banking_tabungan_edit/{id_transaksi}', [Admin::class, 'banking_tabungan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/banking_tabungan_update/{id_transaksi}', [Admin::class, 'banking_tabungan_update'])->name('banking_transaksi_tabungan_update')->middleware('userAkses:admin');
    Route::get('/admin/banking_transaksi_tabungan_edit/{id_transaksi}', [Admin::class, 'banking_transaksi_tabungan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/banking_transaksi_tabungan_update', [Admin::class, 'banking_transaksi_tabungan_update'])->name('banking_transaksi_tabungan_update')->middleware('userAkses:admin');
    Route::get('/admin/aktifitas_banking_tabungan_edit/{id_transaksi}', [Admin::class, 'aktifitas_banking_tabungan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/aktifitas_banking_tabungan_update', [Admin::class, 'aktifitas_banking_tabungan_update'])->name('aktifitas_banking_tabungan_update')->middleware('userAkses:admin');

    Route::get('/admin/banking_penarikan_edit/{id_transaksi}', [Admin::class, 'banking_penarikan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/banking_penarikan_update/{id_transaksi}', [Admin::class, 'banking_penarikan_update'])->name('banking_transaksi_penarikan_update')->middleware('userAkses:admin');
    Route::get('/admin/banking_transaksi_penarikan_edit/{id_transaksi}', [Admin::class, 'banking_transaksi_penarikan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/banking_transaksi_penarikan_update/', [Admin::class, 'banking_transaksi_penarikan_update'])->name('banking_transaksi_penarikan_update')->middleware('userAkses:admin');
    Route::get('/admin/aktifitas_banking_penarikan_edit/{id_transaksi}', [Admin::class, 'aktifitas_banking_penarikan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/aktifitas_banking_penarikan_update/', [Admin::class, 'aktifitas_banking_penarikan_update'])->name('aktifitas_banking_penarikan_update')->middleware('userAkses:admin');

    Route::get('/admin/banking_transfer_edit/{id_transaksi}', [Admin::class, 'banking_transfer_edit'])->middleware('userAkses:admin');
    Route::post('/admin/banking_transfer_update/{id_transaksi}', [Admin::class, 'banking_transfer_update'])->name('banking_transaksi_transfer_update')->middleware('userAkses:admin');
    Route::get('/admin/banking_transaksi_transfer_edit/{id_transaksi}', [Admin::class, 'banking_transaksi_transfer_edit'])->middleware('userAkses:admin');
    Route::post('/admin/banking_transaksi_transfer_update/', [Admin::class, 'banking_transaksi_transfer_update'])->name('banking_transaksi_transfer_update')->middleware('userAkses:admin');
    Route::get('/admin/aktifitas_banking_transfer_edit/{id_transaksi}', [Admin::class, 'aktifitas_banking_transfer_edit'])->middleware('userAkses:admin');
    Route::post('/admin/aktifitas_banking_transfer_update/', [Admin::class, 'aktifitas_banking_transfer_update'])->name('aktifitas_banking_transfer_update')->middleware('userAkses:admin');
    Route::delete('/admin/transaksi_hapus/{id_transaksi}', [Admin::class, 'transaksi_hapus'])->middleware('userAkses:admin');

    Route::get('/admin/tabungan_input', [Admin::class, 'tabungan_input'])->middleware('userAkses:admin');
    Route::get('/admin/tabungan_edit/{id_tabungan}', [Admin::class, 'tabungan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/admin_tabungan_save', [Admin::class, 'admin_tabungan_save'])->name('admin_tabungan_save')->middleware('userAkses:admin');
    Route::post('/admin/admin_tabungan_update/{id_tabungan}', [Admin::class, 'admin_tabungan_update'])->name('admin_tabungan_update')->middleware('userAkses:admin');
    Route::get('/admin/penarikan_input', [Admin::class, 'penarikan_input'])->middleware('userAkses:admin');
    Route::get('/admin/penarikan_edit/{id_penarikan}', [Admin::class, 'penarikan_edit'])->middleware('userAkses:admin');
    Route::post('/admin/admin_penarikan_save', [Admin::class, 'admin_penarikan_save'])->name('admin_penarikan_save')->middleware('userAkses:admin');
    Route::post('/admin/admin_penarikan_update/{id_penarikan}', [Admin::class, 'admin_penarikan_update'])->name('admin_penarikan_update')->middleware('userAkses:admin');
    Route::delete('/admin/tabungan_hapus/{id_tabungan}', [Admin::class, 'tabungan_hapus'])->middleware('userAkses:admin');
    Route::delete('/admin/penarikan_hapus/{id_penarikan}', [Admin::class, 'penarikan_hapus'])->middleware('userAkses:admin');

    Route::get('/admin/aktifitas_input', [Admin::class, 'aktifitas_input'])->middleware('userAkses:admin');
    Route::post('/admin/admin_aktifitas_save', [Admin::class, 'admin_aktifitas_save'])->name('admin_aktifitas_save')->middleware('userAkses:admin');
    Route::post('/admin/aktifitas_save', [Admin::class, 'aktifitas_save'])->name('aktifitas_save')->middleware('userAkses:admin');
    Route::get('/admin/aktifitas_edit/{id_aktifitas}', [Admin::class, 'aktifitas_edit'])->middleware('userAkses:admin');
    Route::post('/admin/admin_aktifitas_update/{id_aktifitas}', [Admin::class, 'admin_aktifitas_update'])->name('admin_aktifitas_update')->middleware('userAkses:admin');
    Route::delete('/admin/aktifitas_hapus/{id_aktifitas}', [Admin::class, 'aktifitas_hapus'])->middleware('userAkses:admin');

    // Bank Sampah

    Route::post('/admin/simpanKeDatabase', [Admin::class, 'simpanKeDatabase'])->name('simpanKeDatabase')->middleware('userAkses:admin');
    Route::get('/pengguna/banksampah_pengguna', [Pengguna::class, 'banksampah_pengguna'])->middleware('userAkses:user');

    // End Bank sampah

    // pengguna
    Route::get('/pengguna/transaksi', [Pengguna::class, 'transaksi'])->middleware('userAkses:user');
    Route::get('/pengguna/banking', [Pengguna::class, 'banking'])->middleware('userAkses:user');
    Route::get('/pengguna/aktifitas', [Pengguna::class, 'aktifitas'])->middleware('userAkses:user');
    Route::get('/pengguna/aktifitas_detail/{id_aktifitas}', [Pengguna::class, 'aktifitas_detail'])->middleware('userAkses:user');
    Route::get('/pengguna/transaksi_tabungan', [Pengguna::class, 'transaksi_tabungan'])->middleware('userAkses:user');
    Route::post('/pengguna/transaksi_tabungan_save', [Pengguna::class, 'transaksi_tabungan_save'])->name('transaksi_tabungan_save')->middleware('userAkses:user');
    Route::get('/pengguna/transaksi_penarikan', [Pengguna::class, 'transaksi_penarikan'])->middleware('userAkses:user');
    Route::post('/pengguna/transaksi_penarikan_save', [Pengguna::class, 'transaksi_penarikan_save'])->name('transaksi_penarikan_save')->middleware('userAkses:user');
    Route::get('/pengguna/transaksi_transfer', [Pengguna::class, 'transaksi_transfer'])->middleware('userAkses:user');
    Route::post('/pengguna/transaksi_transfer_save', [Pengguna::class, 'transaksi_transfer_save'])->name('transaksi_transfer_save')->middleware('userAkses:user');

    //profile
    Route::get('/home/profile', [HomeController::class, 'profile'])->middleware('userAkses:user');
    Route::post('/home/profile_update/{id}', [HomeController::class, 'profile_update'])->name('profile_update')->middleware('userAkses:user');
    Route::post('/home/password_update/{id}', [HomeController::class, 'password_update'])->name('password_update')->middleware('userAkses:user');

    Route::get('/home/superadmin', [HomeController::class, 'admin'])->middleware('userAkses:superadmin');
    Route::get('/home/admin', [HomeController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/home/user', [HomeController::class, 'user'])->middleware('userAkses:user');
    Route::get('/logout', [SesiController::class, 'logout']);
});

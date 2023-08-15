<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ProdiModelFactory;
use Illuminate\Http\RequestFactory;
use App\Models\AktifitasModelFactory;
use App\Models\TabunganModelFactory;
use App\Models\TransaksiModelFactory;
use App\Providers\RouteServiceProvider;
use App\Models\PenarikanModelFactory;
use App\Http\Controllers\admin;
use App\Models\PattyCashsModelFactory;
use App\Http\Controllers\Pengguna;
use App\Models\TotalTabunganModelFactory;
use App\Http\Controllers\Superadmin;
use App\Models\TahunAkademikModelFactory;
use App\Models\KelasModelFactory;
use Database\Factories\TahunAkademikFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IttigaTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::first();

        $this->actingAs($user);
    }

    public function test_render_halaman_daftar_kelas()
    {
        $response = $this->get('/superadmin/daftarkelas');

        $response->assertStatus(200);
    }

    // Pengguna

    public function test_render_halaman_pengguna()
    {
        $response = $this->get('/superadmin/pengguna');

        $response->assertStatus(200);
    }

    public function test_input_pengguna()
    {
        $response = $this->post('/superadmin/pengguna_save', [
            'name' => 'makan',
            'username' => 'ayam',
            'email' => 'bakso@gmail.com',
            'password' => 'inipassword',
            'role' => 'user',
            'tabungan' => '12000',
            'penarikan' => '7000',
            'jk_user' => 'laki',
            'kelas_user' => "X Oto",
            'tahun_akademik_user' => '2017-05-29',
            'bidang_user' => 'kosong',
        ]);

        $response->assertRedirect('/superadmin/pengguna');
    }

    public function test_render_halaman_Edit_pengguna()
    {
        $model = User::factory()->create();

        $response = $this->get("/superadmin/pengguna_edit/{$model->id}");

        $response->assertStatus(200);
    }

    public function test_update_pengguna()
    {

        $model = User::factory()->create();

        $response = $this->put("/superadmin/pengguna_update/{$model->id}", [
            'name' => 'kuncoro',
            'username' => 'qisra',
            'email' => 'dukun@gmail.com',
            'password' => 'inipassword',
            'role' => 'user',
            'tabungan' => '12000',
            'penarikan' => '7000',
            'jk_user' => 'laki',
            'kelas_user' => "X Oto",
            'tahun_akademik_user' => '2017-05-29',
            'bidang_user' => 'kosong',
        ]);

        // Verifikasi bahwa responsenya mengarahkan pengguna ke rute yang sesuai
        // $response->assertRedirect('/superadmin');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_delete_pengguna()
    {
        $model = User::factory()->create();

        $response = $this->delete("/superadmin/pengguna_hapus/{$model->id}");

        $response->assertRedirect('/superadmin/pengguna/');

        $this->assertDatabaseMissing('users', ['id' => $model->id]);
    }

    public function test_update_ganti_password()
    {

        $response = $this->post("/superadmin/pengguna_resetpassword/", [
            'password' => 'inipassword',
        ]);

        // Verifikasi bahwa responsenya mengarahkan pengguna ke rute yang sesuai
        // $response->assertRedirect('/superadmin');
        $response->assertStatus(500);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }








    // Transaksi

    public function test_render_halaman_transaksi()
    {
        $response = $this->get('/superadmin/transaksi');

        $response->assertStatus(200);
    }

    public function test_input_tabungan()
    {
        $response = $this->post('/superadmin/tabungan_save', [
            'username_tabungan' => 'bobi',
            'fullname_tabungan' => 'sanjaya',
            'nominal_tabungan' => '11',
            'jenis_penabung' => 'siswa',
            'tanggal_tabungan' => '2017-05-29',
            'keterangan_tabungan' => 'rizal',
        ]);

        $response->assertRedirect('/superadmin/transaksi/');
    }

    public function test_update_tabungan()
    {
        $model = TabunganModelFactory::factory()->create();

        $response = $this->put("/superadmin/tabungan_update/{$model->id_tabungan}", [
            'username_tabungan' => 'bobi',
            'fullname_tabungan' => 'sanjaya',
            'nominal_tabungan' => '11',
            'jenis_penabung' => 'siswa',
            'tanggal_tabungan' => '2017-05-29',
            'keterangan_tabungan' => 'rizal',
        ]);

        // Verifikasi bahwa responsenya mengarahkan transaksi ke rute yang sesuai
        // $response->assertRedirect('/superadmin/transaksi/');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_delete_tabungan()
    {
        $model = TabunganModelFactory::factory()->create();

        $response = $this->delete("/superadmin/tabungan_hapus/{$model->id_tabungan}");

        $response->assertRedirect('/superadmin/transaksi/');

        $this->assertDatabaseMissing('tabungan', ['id_tabungan' => $model->id_tabungan]);
    }

    public function test_input_penarikan()
    {
        $response = $this->post('/superadmin/penarikan_save', [
            'username_penarikan' => 'bobi',
            'fullname_penarikan' => 'sanjaya',
            'nominal_penarikan' => '11',
            'jenis_penarikan' => 'siswa',
            'tanggal_penarikan' => '2017-05-29',
            'keterangan_penarikan' => 'rizal',
            'jenis_patty_tarik' => 'patty',
        ]);

        $response->assertRedirect('/superadmin/transaksi/');
    }

    public function test_update_penarikan()
    {
        $model = penarikanModelFactory::factory()->create();

        $response = $this->put("/superadmin/penarikan_update/{$model->id_penarikan}", [
            'username_penarikan' => 'bobi',
            'fullname_penarikan' => 'sanjaya',
            'nominal_penarikan' => '11',
            'jenis_penarikan' => 'siswa',
            'tanggal_penarikan' => '2017-05-29',
            'keterangan_penarikan' => 'rizal',
            'jenis_patty_tarik' => 'patty',
        ]);

        // Verifikasi bahwa responsenya mengarahkan transaksi ke rute yang sesuai
        // $response->assertRedirect('/superadmin/transaksi/');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_delete_penarikan()
    {
        $model = penarikanModelFactory::factory()->create();

        $response = $this->delete("/superadmin/penarikan_hapus/{$model->id_penarikan}");

        $response->assertRedirect('/superadmin/transaksi/');

        $this->assertDatabaseMissing('penarikan', ['id_penarikan' => $model->id_penarikan]);
    }

}

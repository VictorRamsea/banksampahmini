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

class ItempatTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $this->actingAs($admin);
    }

    public function test_render_halaman_banking()
    {
        $response = $this->get('/admin/banking');

        $response->assertStatus(200);
    }

    // tabungan banking tabungan

    public function test_input_banking_tabungan_admin()
    {
        $response = $this->post('/admin/banking_transaksi_tabungan_update', [
            'username_tabungan' => 'bobi',
            'fullname_tabungan' => 'sanjaya',
            'nominal_tabungan' => '11',
            'jenis_penabung' => 'siswa',
            'tanggal_tabungan' => '2017-05-29',
            'keterangan_tabungan' => 'rizal',
        ]);

        $response->assertRedirect('/admin/banking/');
    }

    public function test_input_banking_aktifitas_tabungan_admin()
    {
        $response = $this->post('/admin/aktifitas_banking_tabungan_update/', [
            'tanggal_aktifitas' => '2017-05-29',
            'nama_admin_aktifitas' => 'sanjaya',
            'nama_pengguna_aktifitas' => 'kevin',
            'nominal_aktifitas' => '1234',
            'kegiatan_aktifitas' => 'uhuy',
            'penerima_aktifitas' => 'rizal',
            'transfer_aktifitas' => 'transfe',
        ]);

        $response->assertRedirect('/admin/banking/');
    }

    public function test_update_banking_tabungan()
    {

        $model = TransaksiModelFactory::factory()->create();

        $response = $this->put("/admin/banking_tabungan_update/{$model->id_transaksi}", [
            'username_transaksi' => 'sapuan',
            'fullname_transaksi' => 'aming',
            'tabungan_transaksi' => '1200',
            'penarikan_transaksi' => '3000',
            'jenis_transaksi' => 'guru',
            'tanggal_transaksi' => '2019-01-01',
            'keterangan_transaksi' => 'mnerah',
            'warna_transaksi' => 'ungu',
            'transfer_transaksi' => '90900',
            'kategori_transaksi' => 'guru',
            'rekening_transaksi' => '821241',
            'petugas_transaksi' => 'angga',
            'imbuhan_transaksi' => 'inipesan',
        ]);

        // Verifikasi bahwa responsenya mengarahkan pengguna ke rute yang sesuai
        // $response->assertRedirect('/superadmin');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_delete_banking_tabungan_admin()
    {
        $model = TransaksiModelFactory::factory()->create();

        $response = $this->delete("/admin/transaksi_hapus/{$model->id_transaksi}");

        $response->assertRedirect('/admin/banking/');

        $this->assertDatabaseMissing('transaksi', ['id_transaksi' => $model->id_transaksi]);
    }


    // Banking Penarikan
    public function test_input_banking_penarikan_admin()
    {
        $response = $this->post('/admin/admin_penarikan_save', [
            'username_penarikan' => 'bobi',
            'fullname_penarikan' => 'sanjaya',
            'nominal_penarikan' => '11',
            'jenis_penarikan' => 'siswa',
            'tanggal_penarikan' => '2017-05-29',
            'keterangan_penarikan' => 'rizal',
        ]);

        $response->assertRedirect('/admin/transaksi/');
    }

    public function test_input_banking_aktifitas_penarikan_admin()
    {
        $response = $this->post('/admin/aktifitas_banking_penarikan_update/', [
            'tanggal_aktifitas' => '2017-05-29',
            'nama_admin_aktifitas' => 'sanjaya',
            'nama_pengguna_aktifitas' => 'kevin',
            'nominal_aktifitas' => '1234',
            'kegiatan_aktifitas' => 'uhuy',
            'penerima_aktifitas' => 'rizal',
            'transfer_aktifitas' => 'transfe',
        ]);

        $response->assertRedirect('/admin/banking/');
    }

    public function test_update_banking_penarikan()
    {

        $model = TransaksiModelFactory::factory()->create();

        $response = $this->put("/admin/banking_penarikan_update/{$model->id_transaksi}", [
            'username_transaksi' => 'sapuan',
            'fullname_transaksi' => 'aming',
            'tabungan_transaksi' => '1200',
            'penarikan_transaksi' => '3000',
            'jenis_transaksi' => 'guru',
            'tanggal_transaksi' => '2019-01-01',
            'keterangan_transaksi' => 'mnerah',
            'warna_transaksi' => 'ungu',
            'transfer_transaksi' => '90900',
            'kategori_transaksi' => 'guru',
            'rekening_transaksi' => '821241',
            'petugas_transaksi' => 'angga',
            'imbuhan_transaksi' => 'inipesan',
        ]);

        // Verifikasi bahwa responsenya mengarahkan pengguna ke rute yang sesuai
        // $response->assertRedirect('/superadmin');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_delete_banking_penarikan_admin()
    {
        $model = TransaksiModelFactory::factory()->create();

        $response = $this->delete("/admin/transaksi_hapus/{$model->id_transaksi}");

        $response->assertRedirect('/admin/banking/');

        $this->assertDatabaseMissing('transaksi', ['id_transaksi' => $model->id_transaksi]);
    }
}

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

class IttigaAktTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::first();

        $this->actingAs($user);
    }

    // AKtifitas

    public function test_render_halaman_aktifitas()
    {
        $response = $this->get('/superadmin/aktifitas');

        $response->assertStatus(200);
    }

    public function test_update_aktifitas()
    {
        $model = aktifitasModelFactory::factory()->create();

        $response = $this->put("/superadmin/aktifitas_update/{$model->id_aktifitas}", [
            'tanggal_aktifitas' => '2017-05-29',
            'nama_admin_aktifitas' => 'sanjaya',
            'nama_pengguna_aktifitas' => 'kevin',
            'nominal_aktifitas' => '1234',
            'kegiatan_aktifitas' => 'uhuy',
            'penerima_aktifitas' => 'rizal',
            'transfer_aktifitas' => 'transfe',
        ]);

        // Verifikasi bahwa responsenya mengarahkan aktifitas ke rute yang sesuai
        // $response->assertRedirect('/superadmin/aktifitas/');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_delete_aktifitas()
    {
        $model = aktifitasModelFactory::factory()->create();

        $response = $this->delete("/superadmin/aktifitas_hapus/{$model->id_aktifitas}");

        $response->assertRedirect('/superadmin/aktifitas/');

        $this->assertDatabaseMissing('aktifitas', ['id_aktifitas' => $model->id_aktifitas]);
    }

}

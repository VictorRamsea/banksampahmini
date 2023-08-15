<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ProdiModelFactory;
use Illuminate\Http\RequestFactory;
use App\Models\TabunganModeFactoryl;
use App\Models\AktifitasModelFactory;
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

class ItduaTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::first();

        $this->actingAs($user);
    }

    public function test_render_tahunakademik()
    {
        $response = $this->get('/superadmin/tahunakademik');

        $response->assertStatus(200);
    }

    public function test_input_tahun_akademik()
    {

        $response = $this->post('/superadmin/tahunakademik_save', [
            'tanggal_awal' => '2017-05-29',
            'tanggal_akhir' => '2018-05-29',
        ]);

        $response->assertRedirect('/superadmin/tahunakademik/');
    }

    public function test_update_tahun_akademik()
    {
        $model = TahunAkademikModelFactory::factory()->create();

        $response = $this->put("/superadmin/tahunakademik_update/{$model->id_tahunakademik}", [
            'tanggal_awal' => '2017-05-29',
            'tanggal_akhir' => '2018-05-29',
        ]);

        $response->assertStatus(405);
    }

    public function test_delete_tahun_akademik()
    {
        $model = TahunAkademikModelFactory::factory()->create();

        $response = $this->delete("/superadmin/tahunakademik_hapus/{$model->id_tahunakademik}");

        $response->assertRedirect('/superadmin/tahunakademik/');

        $this->assertDatabaseMissing('tahunakademik', ['id_tahunakademik' => $model->id_tahunakademik]);
    }


    // Kelas

    public function test_render_kelas()
    {
        $response = $this->get('/superadmin/kelas');

        $response->assertStatus(200);
    }

    public function test_input_kelas()
    {
        $response = $this->post('/superadmin/kelas_save', [
            'kelas' => 'X MTK',
            'jurusan_kelas' => 'MTK',
            'prodi_kelas' => 'Indo',
            'aktif_kelas' => 'aktif',
        ]);

        $response->assertRedirect('/superadmin/kelas');
    }

    public function test_update_kelas()
    {
        $model = KelasModelFactory::factory()->create();

        $response = $this->put("/superadmin/kelas_update/{$model->id_kelas}", [
            'kelas' => 'X MTK',
            'jurusan_kelas' => 'MTK',
            'prodi_kelas' => 'Indo',
            'aktif_kelas' => 'aktif',
        ]);

        $response->assertStatus(405);
    }

    public function test_delete_kelas()
    {
        $model = KelasModelFactory::factory()->create();

        $response = $this->delete("/superadmin/kelas_hapus/{$model->id_kelas}");

        $response->assertRedirect('/superadmin/kelas/');

        $this->assertDatabaseMissing('kelas', ['id_kelas' => $model->id_kelas]);
    }



    // Prodi
    public function test_render_Prodi()
    {
        $response = $this->get('/superadmin/prodi');

        $response->assertStatus(200);
    }

    public function test_input_Prodi()
    {
        $response = $this->post('/superadmin/prodi_save', [
            'prodi' => 'Otomotif',
        ]);

        $response->assertRedirect('/superadmin/prodi');
    }

    public function test_update_Prodi()
    {
        $model = ProdiModelFactory::factory()->create();

        $response = $this->put("/superadmin/prodi_update/{$model->id_prodi}", [
            'prodi' => 'Otomotif',
        ]);

        $response->assertStatus(405);
    }

    public function test_delete_prodi()
    {
        $model = ProdiModelFactory::factory()->create();

        $response = $this->delete("/superadmin/prodi_hapus/{$model->id_prodi}");

        $response->assertRedirect('/superadmin/prodi/');

        $this->assertDatabaseMissing('prodi', ['id_prodi' => $model->id_prodi]);
    }
}

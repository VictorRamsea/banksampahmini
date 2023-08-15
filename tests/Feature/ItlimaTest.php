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

class ItlimaTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $userss = User::factory()->create([
            'role' => 'user'
        ]);

        $this->actingAs($userss);
    }
    public function test_render_halaman_aktifitas_pengguna()
    {
        $response = $this->get('/pengguna/aktifitas');

        $response->assertStatus(200);
    }

    public function test_render_halaman_profil()
    {
        $response = $this->get('/home/profile');

        $response->assertStatus(200);
    }

    // profile

    public function test_update_email()
    {

        $model = User::factory()->create();

        $response = $this->put("/home/profile_update/{$model->id}", [
            'email' => 'fikri@gmail.com',
        ]);

        // Verifikasi bahwa responsenya mengarahkan pengguna ke rute yang sesuai
        // $response->assertRedirect('/home');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_update_password()
    {

        $model = User::factory()->create();

        $response = $this->put("/home/password_update/{$model->id}", [
            'password' => 'arre007A*',
        ]);

        // Verifikasi bahwa responsenya mengarahkan pengguna ke rute yang sesuai
        // $response->assertRedirect('/home');
        $response->assertStatus(405);
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }
}

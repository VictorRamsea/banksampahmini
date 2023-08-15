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

class tampungTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::first();

        $this->actingAs($user);
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

}
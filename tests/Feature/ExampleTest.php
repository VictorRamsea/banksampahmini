<?php

namespace Tests\Feature\Auth;

use App\Models\User; // Tambahkan use model App\User
use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{

    /** @test */
    public function test_render_halaman_login()
    {
        $this->withoutExceptionHandling();
        $this->get('/')->assertStatus(200);
    }

    public function test_render_halaman_dashboard()
    {
        $this->withoutExceptionHandling();
        $this->get('/')->assertStatus(200);
    }

    public function test_autentikasi_login()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_gagal_login()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}

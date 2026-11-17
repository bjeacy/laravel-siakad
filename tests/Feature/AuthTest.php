<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'admin@siakad.test', 'password' => 'password123', 'role' => 'admin']);
    }

    private function mahasiswaToken(): string
    {
        return User::create(['name' => 'Mhs', 'email' => 'mhs@siakad.test', 'password' => 'password123'])
            ->createToken('t')->plainTextToken;
    }

    public function test_register_ignores_attempted_admin_role(): void
    {
        $this->postJson('/api/register', [
            'name' => 'Budi', 'email' => 'budi@siakad.test', 'password' => 'password123', 'role' => 'admin',
        ])->assertCreated()->assertJsonPath('user.role', 'mahasiswa');
    }

    public function test_register_validates_input(): void
    {
        $this->postJson('/api/register', ['name' => '', 'email' => 'not-an-email', 'password' => 'short'])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'email', 'password']);
    }

    public function test_login_success_and_failure(): void
    {
        $this->admin();

        $login = $this->postJson('/api/login', ['email' => 'admin@siakad.test', 'password' => 'password123'])
            ->assertOk()
            ->assertJsonStructure(['message', 'user' => ['name', 'email', 'role'], 'token'])
            ->assertJsonPath('message', 'Login successful')
            ->assertJsonPath('user', ['name' => 'Admin', 'email' => 'admin@siakad.test', 'role' => 'admin']);

        // Sanctum format: "<token id>|<plain text token>".
        $this->assertMatchesRegularExpression('/^\d+\|[A-Za-z0-9]{40,}$/', $login->json('token'));

        $this->postJson('/api/login', ['email' => 'admin@siakad.test', 'password' => 'wrong'])
            ->assertUnprocessable()->assertJsonValidationErrors('email');
    }

    public function test_missing_token_returns_401(): void
    {
        $this->getJson('/api/me')->assertUnauthorized();
        $this->getJson('/api/mahasiswa')->assertUnauthorized();
    }

    public function test_api_returns_401_json_even_without_accept_header(): void
    {
        // Regression: no named 'login' route exists, so Laravel used to 500 here.
        $this->get('/api/mahasiswa')->assertUnauthorized()->assertExactJson(['message' => 'Unauthenticated.']);
    }

    public function test_mahasiswa_gets_403_on_admin_route(): void
    {
        // Real admin routes are commented out in routes/api.php until AdminController exists.
        Route::middleware(['auth:sanctum', 'role:admin'])->get('/api/_probe', fn () => response()->json(['ok' => true]));

        $token = $this->mahasiswaToken();

        $this->withToken($token)->getJson('/api/me')->assertOk()->assertJsonPath('user.role', 'mahasiswa');
        $this->withToken($token)->getJson('/api/_probe')->assertForbidden()->assertExactJson(['message' => 'Forbidden']);
    }

    public function test_admin_token_alone_passes_role_middleware(): void
    {
        Route::middleware(['auth:sanctum', 'role:admin'])->get('/api/_probe', fn () => response()->json(['ok' => true]));

        $adminToken = $this->admin()->createToken('t')->plainTextToken;
        $this->withToken($adminToken)->getJson('/api/_probe')->assertOk();
    }

    public function test_logout_revokes_token(): void
    {
        $token = $this->admin()->createToken('t')->plainTextToken;

        $this->withToken($token)->postJson('/api/logout')->assertOk();
        $this->assertDatabaseCount('personal_access_tokens', 0);
    }
}

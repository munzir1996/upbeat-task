<?php

namespace Tests\Unit\API\Auth;

// use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register_a_user()
    {
        $response = $this->post('api/user/register', [
            'name' => 'name',
            'email' => 'user@user.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('users', [
            'name' => 'name',
            'email' => 'user@user.com',
        ]);

    }

    /** @test */
    public function user_can_login()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'email' => 'user@user.com',
        ]);

        $this->userApiLogin($user);

        $response = $this->post('api/user/login', [
            'email' => 'user@user.com',
            'password' => 'password',
        ]);
        $response->assertOk();

    }

    /** @test */
    public function user_can_logout_and_delete_his_token()
    {

        $user = $this->userApiLogin();

        $user->createToken('mobile-user');

        $response = $this->post('/api/user/logout');

        $response->assertOk();
        $this->assertCount(0, $user->tokens);
    }
}

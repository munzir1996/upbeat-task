<?php

namespace Tests;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    public function loginUser($user = null)
    {
        $user = $user ? $user : User::factory()->create();

        $this->actingAs($user);

        return $user;
    }

    public function loginAdmin($admin = null)
    {
        $admin = $admin ? $admin : Admin::factory()->create();

        $this->actingAs($admin, 'admin');

        return $admin;
    }

    protected function userApiLogin($user = null)
    {
        $user = $user ? $user : User::factory()->create();

        Sanctum::actingAs(
            $user,
        );

        return $user;
    }

}

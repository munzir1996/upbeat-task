<?php

namespace Tests\Unit\API;

// use PHPUnit\Framework\TestCase;

use App\Models\Car;
use App\Models\Store;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function user_can_Create_checkout()
    {
        $this->userApiLogin();
        $car = Car::factory()->active()->create();

        $this->post('/api/user/checkouts', [
            'car_id' => $car->id,
            'price' => $car->price,
        ]);

        $this->assertDatabaseHas('checkouts', [
            'car_id' => $car->id
        ]);

    }
}

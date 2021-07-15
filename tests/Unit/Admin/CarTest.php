<?php

namespace Tests\Unit\Admin;

// use PHPUnit\Framework\TestCase;

use App\Models\Car;
use App\Models\Category;
use App\Models\Store;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function super_admin_can_create_car()
    {
        $carImage = \Illuminate\Http\Testing\File::image('car.jpg');
        $this->loginAdmin();

        $store = Store::factory()->active()->create();
        $category = Category::factory()->active()->create();

        $this->post('/admin/cars', [
            'store_id' => $store->id,
            'category_id' => $category->id,
            'name' => 'name',
            'description' => 'description',
            'price' => 1000,
            'brand' => 'brand',
            'model' => 'model',
            'color' => 'color',
            'type' => 'type',
            'age' => 10,
            'kilometer' => 72000,
            'image' => $carImage,
        ]);

        $this->assertDatabaseHas('cars', [
            'store_id' => $store->id,
            'category_id' => $category->id,
            'name' => 'name',
            'description' => 'description',
            'price' => 1000,
            'brand' => 'brand',
            'model' => 'model',
            'color' => 'color',
            'type' => 'type',
            'age' => 10,
            'kilometer' => 72000,
        ]);

    }

    /** @test */
    public function super_admin_can_update_car()
    {
        $carImage = \Illuminate\Http\Testing\File::image('car.jpg');
        $this->loginAdmin();

        $store = Store::factory()->active()->create();
        $category = Category::factory()->active()->create();
        $car = Car::factory()->active()->create();

        $this->put('/admin/cars/'. $car->id, [
            'store_id' => $store->id,
            'category_id' => $category->id,
            'name' => 'name',
            'description' => 'description',
            'price' => 1000,
            'brand' => 'brand',
            'model' => 'model',
            'color' => 'color',
            'type' => 'type',
            'age' => 10,
            'kilometer' => 72000,
            'image' => $carImage,
        ]);

        $this->assertDatabaseHas('cars', [
            'store_id' => $store->id,
            'category_id' => $category->id,
            'name' => 'name',
            'description' => 'description',
            'price' => 1000,
            'brand' => 'brand',
            'model' => 'model',
            'color' => 'color',
            'type' => 'type',
            'age' => 10,
            'kilometer' => 72000,
        ]);

    }

    /** @test */
    public function super_admin_can_delete_car()
    {
        $carImage = \Illuminate\Http\Testing\File::image('car.jpg');
        $this->loginAdmin();

        $car = Car::factory()->active()->create();

        $this->delete('/admin/cars/'. $car->id);

        $this->assertDatabaseMissing('cars', [
            'id' => $car->id,
        ]);
    }

    /** @test */
    public function super_admin_can_change_category_status()
    {
        $this->loginAdmin();

        $car = Car::factory()->active()->create();

        $this->get('/admin/cars/change/status/'. $car->id);

        $this->assertDatabaseHas('cars', [
            'id' => $car->id,
            'status' => config('constants.status.inactive'),
        ]);
    }

}

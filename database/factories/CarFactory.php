<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_id' => Store::factory()->active()->create()->id,
            'category_id' => Category::factory()->active()->create()->id,
            'name' => $this->faker->name,
            'description' => $this->faker->name,
            'price' => $this->faker->numberBetween($min = 1, $max = 1000),
            'brand' => $this->faker->name,
            'model' => $this->faker->name,
            'color' => $this->faker->name,
            'type' => $this->faker->name,
            'age' => $this->faker->numberBetween($min = 1, $max = 1000),
            'kilometer' => $this->faker->numberBetween($min = 1, $max = 1000),
        ];
    }

    /**
     * Indicate that the category is active.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => config('constants.status.active'),
            ];
        });
    }

    /**
     * Indicate that the category is inactive.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => config('constants.status.inactive'),
            ];
        });
    }

}

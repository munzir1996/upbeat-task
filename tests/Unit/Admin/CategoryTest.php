<?php

namespace Tests\Unit\Admin;

// use PHPUnit\Framework\TestCase;

use App\Models\Category;
use App\Models\Store;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /** @test */
    public function super_admin_can_create_category()
    {
        $this->loginAdmin();

        $this->post('admin/categories', [
            'name' => 'name',
            'description' => 'description',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'name',
            'description' => 'description',
            'parent_category' => 0,
            'status' => config('constants.status.active'),
        ]);
    }

    /** @test */
    public function super_admin_can_edit_category()
    {
        $this->loginAdmin();

        $category = Category::factory()->create();

        $this->put('admin/categories/'. $category->id, [
            'name' => 'name',
            'description' => 'description',
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'name',
            'description' => 'description',
            'parent_category' => 0,
            'status' => config('constants.status.active'),
        ]);
    }

    /** @test */
    public function super_admin_can_delete_category()
    {
        $this->loginAdmin();

        $category = Category::factory()->create();

        $this->delete('admin/categories/'. $category->id);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }

    /** @test */
    public function super_admin_can_change_category_status()
    {
        $this->loginAdmin();

        $category = Category::factory()->active()->create();

        $this->get('/admin/categories/change/status/'. $category->id);

        $this->assertDatabaseHas('categories', [
            'status' => config('constants.status.inactive'),
        ]);
    }

}





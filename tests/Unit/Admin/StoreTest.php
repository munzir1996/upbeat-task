<?php

namespace Tests\Unit\Admin;

// use PHPUnit\Framework\TestCase;
// use PHPUnit\Framework\TestCase;

use App\Models\Store;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function super_admin_can_create_store()
    {
        $this->loginAdmin();

        $this->post('/admin/stores', [
            'name' => 'store',
            'location' => 'uae',
            'phone' => '0114949901',
            'password' => 'password',
        ]);

        $this->assertDatabaseHas('stores', [
            'name' => 'store',
            'location' => 'uae',
            'phone' => '0114949901',
        ]);
    }

    /** @test */
    public function super_admin_can_edit_store()
    {
        $this->loginAdmin();

        $store = Store::factory()->create();

        $this->put('/admin/stores/'. $store->id, [
            'name' => 'store',
            'location' => 'uae',
            'phone' => '0114949901',
            'password' => 'password',
        ]);

        $this->assertDatabaseHas('stores', [
            'name' => 'store',
            'location' => 'uae',
            'phone' => '0114949901',
        ]);
    }

    /** @test */
    public function super_admin_can_delete_store()
    {
        $this->loginAdmin();

        $store = Store::factory()->create();

        $this->delete('/admin/stores/'. $store->id);

        $this->assertDatabaseMissing('stores', [
            'id' => $store->id,
        ]);
    }

}

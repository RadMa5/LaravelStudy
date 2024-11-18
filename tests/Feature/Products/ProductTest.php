<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_products_can_be_indexed(){
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    public function test_product_can_be_shown(){
        $product = Product::factory()->create();
        $response = $this->get('/api/products/' . $product->getKey());
        $response->assertStatus(200);
    }

    public function test_product_can_be_stored(){
        $attributes = [
            'name' => 'testName',
            'price' => 15000,
        ];
        $response = $this->post('/api/products', $attributes);
        $response->assertStatus(201);
        $this->assertDatabaseHas('products', $attributes);
    }

    public function test_product_can_be_destroyed(){
        $product = Product::factory()->create();
        $response = $this->delete('/api/products/' . $product->getKey());

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->getKey()]);
    }
}

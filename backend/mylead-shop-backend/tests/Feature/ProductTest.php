<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateProduct()
    {

        $payload = [
            'type' => 'type_test',
            'name' => 'name_test',
            'price' => 5,
            'description' => 'description_test'
        ];

        
        $response = $this->json('POST', '/api/products', $payload)
                         ->assertStatus(200)
                         ->assertJson([
                             'id' => 1,
                             'type' => 'type_test',
                             'name' => 'name_test',
                             'price' => 5,
                             'description' => 'description_test'
                        ]);
    }
}

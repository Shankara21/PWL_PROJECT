<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestimoniUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->call('PUT', 'testimoni', [
            'id' => '2',
            'user_id' => '1',
            'name' => 'Muhammad Lazuardi Timur',
            'email' => 'lazuardit21@gmail.com',
            'image' => 'test.jpg',
            'comment' => 'Test',
        ]);

        $this->assertTrue(true);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BankUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->call('PUT', '/dashboard/bank', [
            'id' => '1',
            'nama' => 'BNI',
            'slug' => 'bni',
        ]);

        $this->assertTrue(true);
    }
}

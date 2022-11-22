<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TypeUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->call('POST', '/dashboard/type', [
            'nama_kategori' => 'Komik',
            'deskripsi' => 'Komik merupakan cerita yang menonjolkan pada gambar statis yang ditampilkan sesuai urutan peristiwa.',
        ]);

        $this->assertTrue(true);
    }
}

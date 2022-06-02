<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            'Toyota',
            'Honda',
            'Suzuki',
            'Mitsubishi',
            'Nissan',
            'Daihatsu',
            'Mazda',
            'Kawasaki',
            'Yamaha',
        ]);
        $categories->each(function ($category) {
            Brand::create([
                'nama' => $category,
                'slug' => Str::slug($category),
            ]);
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            [
                'name' => 'Shopeepay',
                'slug' => 'shopeepay',
                'norek' => '081334552124',
            ],
            [
                'name' => 'Linkaja',
                'slug' => 'linkaja',
                'norek' => '081334552124',
            ],
            [
                'name' => 'Gopay',
                'slug' => 'gopay',
                'norek' => '081334552124',
            ],
            [
                'name' => 'BCA',
                'slug' => 'bca',
                'norek' => '122081334552124',
            ],
            [
                'name' => 'BRI',
                'slug' => 'bri',
                'norek' => '112081334552124',
            ],
            [
                'name' => 'Mandiri',
                'slug' => 'mandiri',
                'norek' => '893081334552124',
            ],
        ]);
    }
    }


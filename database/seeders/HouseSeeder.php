<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('houses')->insert([
            'name' => Str::random(10),
            'description' => Str::random(112),
            'image' => "1636375995.jpg",
            'price' => time(),
            'ft_price' => time(),
            'address' => Str::random(10)."street",
            'bedrooms_count' =>  1,
            'showers_count' =>  2,
            'floors_count' =>  3,
            'garage_count' => 4,
            'founded_year' => "2002"
        ]);
    }
}

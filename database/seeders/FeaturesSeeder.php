<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->updateOrInsert([
            'title' => "Security",
        ]);

        DB::table('features')->updateOrInsert([
            'title' => "Green feature",
        ]);

        DB::table('features')->updateOrInsert([
            'title' => "Children Zona",
        ]);

        DB::table('features')->updateOrInsert([
            'title' => "Pool",
        ]);

        DB::table('features')->updateOrInsert([
            'title' => "School near",
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'author_name' => "Lovs Carnie",
            'author_message' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. At autem beatae distinctio dolore ducimus est expedita explicabo, hic impedit inventore laudantium maxime modi natus perferendis qui quo recusandae tenetur veniam!",
        ]);

        DB::table('comments')->insert([
            'author_name' => "Jour Wizzy",
            'author_message' => "At autem beatae distinctio dolore ducimus est expedita modi natus perferendis qui quo recusandae tenetur veniam!",
        ]);

        DB::table('comments')->insert([
            'author_name' => "Medi Loffs",
            'author_message' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. hic impediperferendis qui quo recusandae tenetur veniam!",
        ]);
    }
}

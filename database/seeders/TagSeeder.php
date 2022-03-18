<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "user_id" => "",
            "title" => "付き合ってから",
            "set_day" => "2022-04-01",
        ]);
    }
}

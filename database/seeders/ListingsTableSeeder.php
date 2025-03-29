<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listings')->insert([
            [
                'title' => Str::random(20),
                'body' => Str::random(100),
                'user_id' => rand(10, 220),
                'area_id' => rand(10, 220),
                'category_id' => rand(10, 220),
                'live' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => Str::random(20),
                'body' => Str::random(100),
                'user_id' => rand(10, 220),
                'area_id' => rand(10, 220),
                'category_id' => rand(10, 220),
                'live' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => Str::random(20),
                'body' => Str::random(100),
                'user_id' => rand(10, 220),
                'area_id' => rand(10, 220),
                'category_id' => rand(10, 220),
                'live' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

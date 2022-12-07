<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('origins')->insert([
            'name' => 'Greece',
        ]);
        DB::table('origins')->insert([
            'name' => 'United States',
        ]);
        DB::table('origins')->insert([
            'name' => 'Cyprus',
        ]);
        DB::table('origins')->insert([
            'name' => 'Arabian Peninsula',
        ]);
        DB::table('origins')->insert([
            'name' => 'United Kingdom',
        ]);
    }
}

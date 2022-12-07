<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breeds')->insert([
            'name' => 'Abyssinian',
        ]);
        DB::table('breeds')->insert([
            'name' => 'Aegean',
        ]);
        DB::table('breeds')->insert([
            'name' => 'American Bobtail[',
        ]);
        DB::table('breeds')->insert([
            'name' => 'American Curl',
        ]);
        DB::table('breeds')->insert([
            'name' => 'American Shorthair',
        ]);
        DB::table('breeds')->insert([
            'name' => 'American Wirehair',
        ]);
    }
}

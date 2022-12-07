<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coats')->insert([
            'name' => 'Short',
        ]);
        DB::table('coats')->insert([
            'name' => 'Semi-long',
        ]);
        DB::table('coats')->insert([
            'name' => 'Rex',
        ]);
        DB::table('coats')->insert([
            'name' => 'All',
        ]);
        DB::table('coats')->insert([
            'name' => 'Hairless',
        ]);
    }
}

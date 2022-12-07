<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodies')->insert([
            'name' => 'Semi-foreign',
        ]);
        DB::table('bodies')->insert([
            'name' => 'Moderate',
        ]);
        DB::table('bodies')->insert([
            'name' => 'Cobby',
        ]);
        DB::table('bodies')->insert([
            'name' => 'Foreign',
        ]);
        DB::table('bodies')->insert([
            'name' => 'Normal',
        ]);
        DB::table('bodies')->insert([
            'name' => 'Lean and muscular',
        ]);
        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patterns')->insert([
            'name' => 'Ticked tabby',
        ]);
        DB::table('patterns')->insert([
            'name' => '	Multi-color',
        ]);
        DB::table('patterns')->insert([
            'name' => 'All',
        ]);
        DB::table('patterns')->insert([
            'name' => 'Evenly solid',
        ]);
        DB::table('patterns')->insert([
            'name' => 'Spotted or marbled',
        ]);
    }
}

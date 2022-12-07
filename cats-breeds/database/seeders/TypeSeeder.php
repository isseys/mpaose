<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Natural',
        ]);
        DB::table('types')->insert([
            'name' => 'Mutation of the Manx',
        ]);
        DB::table('types')->insert([
            'name' => 'Mutation',
        ]);
    }
}

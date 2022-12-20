<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Technology',
            'created_at'=>now(),
        ]);

        DB::table('categories')->insert([
            'name'=>'Fashion',
            'created_at'=>now(),
        ]);

        DB::table('categories')->insert([
            'name'=>'Cooking',
            'created_at'=>now(),
        ]);
    }
}

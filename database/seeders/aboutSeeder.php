<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class aboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about')->insert([
            'full_name'=> 'Marah Nasser',
            'image'=> '',
            'about_me' => '',
            'email' => 'marahnasser@gmail.com',
            'phone' => '+00972599022279',
            'address' => 'Palestine-Gaza',
            'facebook'=> 'https://www.facebook.com/people/MA-R-AH/100014954808391/?mibextid=ZbWKwL',
            'instagram' => 'https://www.instagram.com/_marah_nasser/',
            'twitter' => 'https://twitter.com/mara7nasser?t=LfhLwnveIk85Ga2XGp_ltQ&s=09',
            'linkedin' => 'https://www.linkedin.com/in/marah-nasser-a7b6ba251/',
            'created_at' => now(),
        ]);
    }
}

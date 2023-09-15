<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // ClassSeeder.php
    public function run()
    {
        DB::table('classes')->insert([
            ['class_name' => 'A'],
            ['class_name'=> 'B'],
            ['class_name'=> 'C'],
            ['class_name'=> 'D'],
            ['class_name'=> 'E'],


            // Add more class data as needed
        ]);
    }

}

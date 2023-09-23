<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GradeSeeder.php
        DB::table('grades')->insert([
            ['grade_name' => '1'],
            ['grade_name'=> '2'],
            ['grade_name'=> '3'],
            ['grade_name'=> '4'],
            ['grade_name'=> '5'],
            ['grade_name'=> '6'],
            ['grade_name'=> '7'],
            ['grade_name'=> '8'],
            ['grade_name'=> '9'],
            ['grade_name'=> '10'],
            ['grade_name'=> '11'],
            ['grade_name'=> '12'],


        ]);
    }
}

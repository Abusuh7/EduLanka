<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SubjectSeeder.php
        DB::table('subjects')->insert([
            ['subject_name' => 'Mathematics'],
            ['subject_name' => 'English'],
            ['subject_name' => 'Science'],
            ['subject_name' => 'Social Studies'],
            ['subject_name' => 'Computer Science'],
            ['subject_name' => 'Physical Education'],
            ['subject_name' => 'Music'],
            ['subject_name' => 'Art'],
            ['subject_name' => 'Health'],
            ['subject_name' => 'Foreign Language'],


        ]);
    }
}

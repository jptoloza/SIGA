<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\AcademicUnit::create([
            'code' => 6,
            'academic_unit' => 'Matemáticas'
        ]);

        \App\Models\AcademicUnit::create([
            'code' => 4,
            'academic_unit' => 'Ingeniería',
        ]);

        \App\Models\AcademicUnit::create([
            'code' => 10,
            'academic_unit' => 'College',
        ]);

    }
}

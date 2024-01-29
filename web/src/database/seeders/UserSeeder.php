<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        \App\Models\User::create([
            'email'                 => 'jponce@uc.cl',
            'login'                 => 'jponce',
            'password'              => Hash::make('test'),
            'authentication'        => 'SSO',
            'run'                   => 1,
            'dv'                    => '9',
            'first_name'            => 'Jorge',
            'last_name_pathernal'   => 'Ponce',
            'last_name_maternal'    => 'T.',
            'sex'                   => 'M',
            'birthdate'             => '1975-04-25',
            'activate'              => 1,
            'national_code_id'      => 1,
            'academic_unit_id'      => 1
        ]);

        \App\Models\User::create([
            'email'                 => 'jptoloza@gmail.com',
            'login'                 => 'jptoloza@gmail.com',
            'password'              => Hash::make('test'),
            'authentication'        => 'LOCAL',
            'run'                   => 12772712,
            'dv'                    => '0',
            'first_name'            => 'Jorge O.',
            'last_name_pathernal'   => 'Ponce',
            'last_name_maternal'    => 'Toloza',
            'sex'                   => 'M',
            'birthdate'             => '1975-04-25',
            'activate'              => 1,
            'national_code_id'      => 1,
            'academic_unit_id'      => 1
        ]);

    }
}

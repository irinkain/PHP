<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employeesTable')->insert([
           'Name' => 'Vano',
           'Surname' => 'Gelashvili',
           'Position' => "CEO",
           'Phone' => '123456789',
            'IsHired' => 1
        ]);
    }
}

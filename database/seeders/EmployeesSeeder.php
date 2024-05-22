<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $compPrefixes = ['Blacklist International', '	John 11 Store', 'Cavite State University Tanza Campus'];

        for ($i = 0; $i < 10; $i++) {
            DB::connection('mysql')->table('employees')->insert([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'company' => $faker->randomElement($compPrefixes),
                'phone' => '09876543211',
                'email' => $faker->email,
            ]);
        }
    }
}

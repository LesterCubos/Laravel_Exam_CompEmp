<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            //Administrator
           [
            'name' => 'Administrator',
            'email' => 'qxit@quantumx.com',
            'password' => Hash::make('interview@qxit'),
           ],
        ]);
    }
}

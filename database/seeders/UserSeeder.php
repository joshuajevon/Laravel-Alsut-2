<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'number' => '123456789',
            'password' => bcrypt('test1234'),
            'dob' => '2000-01-23',
            'pob' => 'jakarta',
            'gender' => 'male',
            'address' => 'jalan apel'
        ]);
    }
}

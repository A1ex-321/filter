<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'fk_department' => 2, 
                'fk_designation' => 1, 
                'phone_number' => '1234567890',
            ],
            [
                'name' => 'Jane Smith',
                'fk_department' => 1, 
                'fk_designation' => 2, 
                'phone_number' => '0987654321',
            ],
            [
                'name' => 'Alan',
                'fk_department' => 1, 
                'fk_designation' => 2, 
                'phone_number' => '7867875687',
            ],[
                'name' => 'Smith',
                'fk_department' => 2, 
                'fk_designation' => 1, 
                'phone_number' => '8098675676',
            ],
        ]);
    }
}


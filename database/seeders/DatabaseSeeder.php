<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DesignationsTableSeeder::class,
            DepartmentsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}

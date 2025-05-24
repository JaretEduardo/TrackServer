<?php

namespace Database\Seeders;

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
            [
                'ID' => 1,
                'userName' => 'RH Admin',
                'email' => 'jaret.gonzalez.ct59@gmail.com',
                'password' => bcrypt('J@ret5478'),
                'rolID' => 1,
                'rolName' => 'admin',
                'accountStatus' => 'active',
            ],
        ]);
    }
}

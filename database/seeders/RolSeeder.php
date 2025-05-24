<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol')->insert([
            ['name' => 'admin', 'description' => 'Administrator role'],
            ['name' => 'user', 'description' => 'Regular user role'],
            ['name' => 'guest', 'description' => 'Guest user role'],
        ]);
    }
}

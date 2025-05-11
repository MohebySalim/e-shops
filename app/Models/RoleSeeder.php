<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['role' => 'admin'],
            ['role' => 'seller'],
            ['role' => 'customer'], // Default role
        ]);
    }
}
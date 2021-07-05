<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['name' => 'User',
            'email' => 'user@user',
            'phone' => '12345678',
            'role' => 'User',
            'password' => Hash::make('password')],
            ['name' => 'Admin',
            'email' => 'admin@admin',
            'phone' => '12345678',
            'role' => 'Admin',
            'password' => Hash::make('password')],
            ['name' => 'Peter',
            'email' => 'peter@peter',
            'phone' => '12345678',
            'role' => 'User',
            'password' => Hash::make('password')],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Super Administrator',
            'username' => 'superadmin',
            'email' => 'ijazz_professional@yahoo.com',
            'user_type' => 'Super Admin',
            'status' => 'Active',
            'password' => Hash::make('123456'),

        ]);
    }
}

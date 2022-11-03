<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.admin',
                'password' => Hash::make('admin'),
                'birthdate' => Carbon::now(),
            ],
            [
                'name' => 'user',
                'email' => 'user@user.user',
                'password' => Hash::make('user'),
                'birthdate' => Carbon::now(),
            ],
        ]);
    }
}

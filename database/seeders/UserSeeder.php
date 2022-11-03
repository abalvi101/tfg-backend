<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
                'name'      => 'admin',
                'surname'      => 'admin',
                'email'     => 'admin@admin.admin',
                'password'  => Hash::make('admin'),
                'birthdate' => Carbon::now()->addYears(-23),
            ],
            [
                'name'      => 'user',
                'surname'      => 'user',
                'email'     => 'user@user.user',
                'password'  => Hash::make('user'),
                'birthdate' => Carbon::now()->addYears(-21),
            ],
        ]);
    }
}

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
                'email'     => 'admin@admin.com',
                'password'  => Hash::make('admin'),
                'birthday' => Carbon::now()->addYears(-23),
            ],
            [
                'name'      => 'user',
                'surname'      => 'user',
                'email'     => 'user@user.com',
                'password'  => Hash::make('user'),
                'birthday' => Carbon::now()->addYears(-21),
            ],
        ]);
    }
}

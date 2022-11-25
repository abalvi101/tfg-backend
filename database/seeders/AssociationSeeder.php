<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('associations')->insert([
            [
                'name'      => 'admin',
                'email'     => 'admin@admin.admin',
                'password'  => Hash::make('admin'),
                'province_id' => 15,
                'city_id'     => 19,
            ],
            [
                'name'      => 'Athisa',
                'email'     => 'athisa@athisa.athisa',
                'password'  => Hash::make('athisa'),
                'province_id' => 15,
                'city_id'     => 13,
            ],
            [
                'name'      => 'Gatita Lucía',
                'email'     => 'gatita@lucia.com',
                'password'  => Hash::make('gatitalucia'),
                'province_id' => 15,
                'city_id'     => 21,
            ],
            [
                'name'      => 'Protectora 2',
                'email'     => 'protectora@2.com',
                'password'  => Hash::make('protectora2'),
                'province_id' => 15,
                'city_id'     => 34,
            ],
        ]);
    }
}

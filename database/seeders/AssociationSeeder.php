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
                'email'     => 'admin@admin.com',
                'password'  => Hash::make('admin'),
                'province_id' => 15,
                'city_id'     => 19,
                'about_us'    => '',
            ],
            [
                'name'        => 'Athisa',
                'email'       => 'athisa@athisa.com',
                'password'    => Hash::make('athisa'),
                'province_id' => 15,
                'city_id'     => 13,
                'about_us'    => 'Somos una asociatión protectora de animales de Chiclana. Nos dedicamos a recoger a todos los animales sin hogar que nuestras instalaciones nos permiten y buscarles una familia que lo quiera y cuide como se merece.',
            ],
            [
                'name'      => 'Gatita Lucía',
                'email'     => 'gatita@lucia.com',
                'password'  => Hash::make('gatitalucia'),
                'province_id' => 15,
                'city_id'     => 21,
                'about_us'    => '',
            ],
            [
                'name'      => 'Protectora 2',
                'email'     => 'protectora@2.com',
                'password'  => Hash::make('protectora2'),
                'province_id' => 15,
                'city_id'     => 34,
                'about_us'    => '',
            ],
        ]);
    }
}

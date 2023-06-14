<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FosteringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fosterings')->insert([
            [
                'animal_id' => 2,
                'person_in_charge' => 'Antonio Gutierrez Dominguez',
                'phone_number' => '744598377',
                'address' => 'Avenida de la piruleta, 26',
                'province_id' => 15,
            ]
        ]);
    }
}

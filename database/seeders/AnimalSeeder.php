<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            [
                'association_id'   => 2,
                'name'             => 'Toby',
                'birthday'        => Carbon::now()->addYears(-3),
                'entry_date'       => Carbon::now()->addYears(-2),
                'province_id'      => 15,
                'city_id'          => 3,
                'animal_specie_id' => 1,
                'breed_id'         => 13,
                'size_id'          => 3,
                'gender'           => true,
                'description'      => 'Tranquilo y sociable. Se lleva bien con otros perros e incluso gatos.'
            ],
            [
                'association_id'   => 2,
                'name'             => 'Lana',
                'birthday'        => Carbon::now()->addYears(-7),
                'entry_date'       => Carbon::now()->addYears(-4),
                'province_id'      => 15,
                'city_id'          => 33,
                'animal_specie_id' => 1,
                'breed_id'         => 3,
                'size_id'          => 3,
                'gender'           => false,
                'description'      => 'Muy activa y sociable. Se lleva bien con otros perros.'
            ],
        ]);
    }
}

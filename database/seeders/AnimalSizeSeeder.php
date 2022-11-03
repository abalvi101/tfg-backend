<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AnimalSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_sizes')->insert([
            // DOG SIZES
            [
                'name' => 'extra small',
                'code' => 'XS',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'small',
                'code' => 'S',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'medium',
                'code' => 'M',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'large',
                'code' => 'L',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'extra large',
                'code' => 'XL',
                'animal_specie_id' => 1,
            ],
            // CAT SIZES
            [
                'name' => 'small',
                'code' => 'S',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'medium',
                'code' => 'M',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'large',
                'code' => 'L',
                'animal_specie_id' => 2,
            ],
        ]);
    }
}

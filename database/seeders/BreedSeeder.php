<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breeds')->insert([
            // DOG BREEDS
            [
                'name' => 'border collie',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'beagle',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'boxer',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'bulldog',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'chihuahua',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'chow chow',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'dalmatian',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'dutch shepherd',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'fox terrier',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'labrador retriever',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'maltese',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'mastiff',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'pomeranian',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'pug',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'rottweiler',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'saint bernard',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'shiba inu',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'water dog',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'greyhound',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'weimaraner',
                'animal_specie_id' => 1,
            ],
            [
                'name' => 'yorkshire terrier',
                'animal_specie_id' => 1,
            ],
            // CAT BREEDS

            [
                'name' => 'bengal',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'birman',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'bombay',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'chartreux',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'himalayan',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'maine coon',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'persian',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'peterbald',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'ragdoll',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'savannah',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'siamese',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'somali',
                'animal_specie_id' => 2,
            ],
            [
                'name' => 'sphynx',
                'animal_specie_id' => 2,
            ],
        ]);
    }
}

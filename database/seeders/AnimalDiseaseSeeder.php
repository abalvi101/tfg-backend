<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_diseases')->insert([
            [
                'name' => 'Leishmania',
                'description' => 'Se cansa con facilidad, vómitos ocasionales. No impide una vida normal.',
                'treatment' => 'Un Paracetamol cada 8h.',
                'chronic' => true,
                'animal_id' => 1,
            ],
            [
                'name' => 'Bronquitis',
                'description' => 'Tos y arcadas (llegando a vómitos) habituales.',
                'treatment' => 'Antibiótico y antiinflamatorio una vez al día.',
                'chronic' => false,
                'animal_id' => 4,
            ],
            [
                'name' => 'Cojera',
                'description' => 'Pata trasera izquierda. Por rotura de tibia.',
                'treatment' => 'Nada.',
                'chronic' => true,
                'animal_id' => 4,
            ],
            [
                'name' => 'Ceguera',
                'description' => 'Ceguera en el ojo derecho.',
                'treatment' => 'Nada.',
                'chronic' => true,
                'animal_id' => 4,
            ],
        ]);
    }
}

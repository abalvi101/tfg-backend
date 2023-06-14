<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            // CÁDIZ CITIES
            [
                'name' => 'Alcalá de los Gazules',
                'province_id' => 15,
            ],
            [
                'name' => 'Alcalá del Valle',
                'province_id' => 15,
            ],
            [
                'name' => 'Algar',
                'province_id' => 15,
            ],
            [
                'name' => 'Algeciras',
                'province_id' => 15,
            ],
            [
                'name' => 'Algodonales',
                'province_id' => 15,
            ],
            [
                'name' => 'Arcos de la Frontera',
                'province_id' => 15,
            ],
            [
                'name' => 'Barbate',
                'province_id' => 15,
            ],
            [
                'name' => 'Los Barrios',
                'province_id' => 15,
            ],
            [
                'name' => 'Benalup-Casas Viejas',
                'province_id' => 15,
            ],
            [
                'name' => 'Benaocaz',
                'province_id' => 15,
            ],
            [
                'name' => 'Bornos',
                'province_id' => 15,
            ],
            [
                'name' => 'El Bosque',
                'province_id' => 15,
            ],
            [
                'name' => 'Cádiz',
                'province_id' => 15,
            ],
            [
                'name' => 'Castellar de la Frontera',
                'province_id' => 15,
            ],
            [
                'name' => 'Chiclana de la Frontera',
                'province_id' => 15,
            ],
            [
                'name' => 'Chipiona',
                'province_id' => 15,
            ],
            [
                'name' => 'Conil de la Frontera',
                'province_id' => 15,
            ],
            [
                'name' => 'Espera',
                'province_id' => 15,
            ],
            [
                'name' => 'El Gastor',
                'province_id' => 15,
            ],
            [
                'name' => 'Grazalema',
                'province_id' => 15,
            ],
            [
                'name' => 'Jerez de la Frontera',
                'province_id' => 15,
            ],
            [
                'name' => 'Jimena de la Frontera',
                'province_id' => 15,
            ],
            [
                'name' => 'La Línea de la Concepción',
                'province_id' => 15,
            ],
            [
                'name' => 'Medina Sidonia',
                'province_id' => 15,
            ],
            [
                'name' => 'Olvera',
                'province_id' => 15,
            ],
            [
                'name' => 'Paterna de la Rivera',
                'province_id' => 15,
            ],
            [
                'name' => 'Prado del Rey',
                'province_id' => 15,
            ],
            [
                'name' => 'El Puerto de Santa María',
                'province_id' => 15,
            ],
            [
                'name' => 'Puerto Real',
                'province_id' => 15,
            ],
            [
                'name' => 'Puerto Serrano',
                'province_id' => 15,
            ],
            [
                'name' => 'Rota',
                'province_id' => 15,
            ],
            [
                'name' => 'San Fernando',
                'province_id' => 15,
            ],
            [
                'name' => 'San José del Valle',
                'province_id' => 15,
            ],
            [
                'name' => 'San Martín del Tesorillo',
                'province_id' => 15,
            ],
            [
                'name' => 'San Roque',
                'province_id' => 15,
            ],
            [
                'name' => 'Sanlúcar de Barrameda',
                'province_id' => 15,
            ],
            [
                'name' => 'Setenil de las Bodegas',
                'province_id' => 15,
            ],
            [
                'name' => 'Tarifa',
                'province_id' => 15,
            ],
            [
                'name' => 'Torre Alháquime',
                'province_id' => 15,
            ],
            [
                'name' => 'Trebujena',
                'province_id' => 15,
            ],
            [
                'name' => 'Ubrique',
                'province_id' => 15,
            ],
            [
                'name' => 'Vejer de la Frontera',
                'province_id' => 15,
            ],
            [
                'name' => 'Villaluenga del Rosario',
                'province_id' => 15,
            ],
            [
                'name' => 'Villamartín',
                'province_id' => 15,
            ],
            [
                'name' => 'Zahara de la Sierra',
                'province_id' => 15,
            ],
        ]);
    }
}

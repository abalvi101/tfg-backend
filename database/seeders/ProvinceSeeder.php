<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            ['name' => 'Albacete'],
            ['name' => 'Ciudad Real'],
            ['name' => 'Cuenca'],
            ['name' => 'Guadalajara'],
            ['name' => 'Toledo'],
            ['name' => 'Huesca'],
            ['name' => 'Teruel'],
            ['name' => 'Zaragoza'],
            ['name' => 'Ceuta'],
            ['name' => 'Madrid'],
            ['name' => 'Murcia'],
            ['name' => 'Melilla'],
            ['name' => 'Navarra'],
            ['name' => 'Almería'],
            ['name' => 'Cádiz'],
            ['name' => 'Córdoba'],
            ['name' => 'Granada'],
            ['name' => 'Huelva'],
            ['name' => 'Jaén'],
            ['name' => 'Málaga'],
            ['name' => 'Sevilla'],
            ['name' => 'Asturias'],
            ['name' => 'Cantabria'],
            ['name' => 'Ávila'],
            ['name' => 'Burgos'],
            ['name' => 'León'],
            ['name' => 'Palencia'],
            ['name' => 'Salamanca'],
            ['name' => 'Segovia'],
            ['name' => 'Soria'],
            ['name' => 'Valladolid'],
            ['name' => 'Zamora'],
            ['name' => 'Barcelona'],
            ['name' => 'Gerona'],
            ['name' => 'Lérida'],
            ['name' => 'Tarragona'],
            ['name' => 'Badajoz'],
            ['name' => 'Cáceres'],
            ['name' => 'La Coruña'],
            ['name' => 'Lugo'],
            ['name' => 'Orense'],
            ['name' => 'Pontevedra'],
            ['name' => 'La Rioja'],
            ['name' => 'Islas Baleares'],
            ['name' => 'Álava'],
            ['name' => 'Guipúzcoa'],
            ['name' => 'Vizcaya'],
            ['name' => 'Palmas, Las'],
            ['name' => 'Santa Cruz De Tenerife'],
            ['name' => 'Alicante'],
            ['name' => 'Castellón'],
            ['name' => 'Valencia'],
        ]);
    }
}

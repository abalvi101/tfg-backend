<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Return the provinces' list
     */

    public function getProvinces() {
        return $this->sendResponse(Province::orderBy('name')->get(), 'Listado de provincias registradas.');
    }

    /**
     * Return the cities' list
     */

    public function getCities() {
        return $this->sendResponse(City::orderBy('name')->get(), 'Listado de ciudades registradas.');
    }
}

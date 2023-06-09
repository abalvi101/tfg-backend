<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssociationResource;
use App\Http\Resources\AssociationsListResource;
use Illuminate\Http\Request;
use App\Models\Association;
use Exception;

class AssociationController extends Controller
{
    public function getFilteredAssociations(Request $request) {
        // dd($request->all());
        $associations = AssociationsListResource::collection(
            Association::query()
            // ->when($request->specie, function ($query, $specie) {
            //     $query->where('animal_specie_id', '=', $specie);
            // })
            ->when($request->province, function ($query, $province) {
                $query->where('province_id', '=', $province);
            })
            ->when($request->city, function ($query, $city) {
                $query->where('city_id', '=', $city);
            })
            ->get()
        );

        if (count($associations)) {
            return $this->sendResponse($associations, 'Lista de asociaciones filtrada');
        } else {
            return $this->sendResponse($associations, 'No hay resultados');
        }
    }

    public function getAssociationInfo(Request $request) {
        try {
            $association = new AssociationResource(Association::find($request->association_id));
            if ($association) {
                return $this->sendResponse($association, 'Datos de la asociacion');
            }
            return $this->sendResponse($association, 'No hay resultados');
        } catch (Exception $e) {
            return $this->sendError('Problemas al cargar los datos de la asociación seleccionada.', $e);
        }
    }

}

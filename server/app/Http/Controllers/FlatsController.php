<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristFlat;
use App\Models\City;

class FlatsController extends Controller
{
    public function list(City $city)
    {
        return TouristFlat::select('signature','address')
            ->where('city_id', $city->id)
            ->get();
    }
}

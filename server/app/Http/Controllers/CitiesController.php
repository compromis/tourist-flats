<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{
    public function list()
    {
        $cities = City::all();

        return response()->json($cities);
    }
}

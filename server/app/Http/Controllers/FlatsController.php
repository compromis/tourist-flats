<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristFlat;

class FlatsController extends Controller
{
    public function list()
    {
        return TouristFlat::select('signature','address')->get();
    }
}

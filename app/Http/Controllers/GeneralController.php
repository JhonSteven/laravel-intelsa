<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Genre;
use App\Models\IdentificationType;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getGenres()
    {
        $genres = Genre::all();
        return response()->json($genres,200);
    }

    public function getCareers()
    {
        $careers = Career::all();
        return response()->json($careers,200);
    }

    public function getIdentificationTypes()
    {
        $identification_types = IdentificationType::all();
        return response()->json($identification_types,200);
    }
}

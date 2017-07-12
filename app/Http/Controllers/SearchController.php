<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;

class SearchController extends Controller
{
    public function findSpacebox(Request $request)
    {
        $spaceboxes = Spacebox::where('name', 'LIKE', "%$request->name%")
                                ->where('active', 1)
                                ->where('visible', 1)
                                ->get();

        return view('search', ['title' => 'Resultados de la búsqueda'])->with('spaceboxes', $spaceboxes);
    }
}

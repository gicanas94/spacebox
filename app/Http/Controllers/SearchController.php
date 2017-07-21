<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;

class SearchController extends Controller
{
    public function findSpacebox(Request $request)
    {
        $title = trans('messages.search-title');
        $spaceboxes = Spacebox::where('name', 'LIKE', "%$request->name%")
                                ->where('ban_id', null)
                                ->where('visible', 1)
                                ->get();

        return view('search', compact('title', 'spaceboxes'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $option = $request->option;

        if (is_numeric($option)) {
            $title = trans('messages.category-' . $option);
            $spaceboxes = Spacebox::where('category_id', $option)
                                    ->where('ban_id', null)
                                    ->where('visible', 1)
                                    ->get();
        } else {
            $title = strtoupper($option);
            $spaceboxes = Spacebox::where('lang', $option)
                                    ->where('ban_id', null)
                                    ->where('visible', 1)
                                    ->get();
        }

        return view('search-or-filter', compact('title', 'spaceboxes'));
    }
}

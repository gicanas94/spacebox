<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;
use App\Http\Requests\StoreSpacebox;

class CreateSpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'userHasSpacebox', 'userIsBanned']);
    }

    public function index()
    {
        $title = trans('messages.create-title');
        $langs = ["ES" => "Español", "EN" => "English", "PT" => "Português"];
        $colors = Spacebox::colors();

        return view('createspace', compact('title', 'langs', 'colors'));
    }

    public function store(StoreSpacebox $request)
    {
        $otherStuff = [
            'slug' => str_slug($request->input('name')),
            'user_id' => auth()->id()
        ];

        $spacebox = array_merge($request->except('_token'), $otherStuff);

        Spacebox::create($spacebox);

        return redirect()->route('space.show', $spacebox['slug']);
    }
}

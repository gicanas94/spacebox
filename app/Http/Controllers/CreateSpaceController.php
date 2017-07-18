<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;
use App\Http\Requests\StoreSpacebox;

class CreateSpaceController extends Controller
{
    protected $colors = [
      "#FF7575", "#FF8A8A", "#FF79E1", "#FFACEC", "#FF73B9", "#FF97CB", "#EA8DFE", "#AD8BFE", "#DD75DD", "#8678E9",
      "#6094DB", "#2F74D0", "#2FAACE", "#23819C", "#57BCD9", "#A5DBEB", "#6A6AFF", "#75B4FF", "#3DE4FC", "#74FEF8",
      "#A3FEBA", "#4AE371", "#6CA870", "#59955C", "#99FD77", "#2DC800", "#95FF4F", "#93BF96", "#B3FF99", "#93EEAA",
      "#C8C800", "#9D9D00", "#DFE32D", "#E0E04E", "#FFF06A", "#F7DE00", "#FFCB2F", "#FFE920", "#FFCE73", "#C8B400",
      "#FF800D", "#FFAC62", "#D1D17A", "#C27E3A", "#C47557", "#D29680", "#C17753", "#B96F6F", "#D1A0A0", "#B05F3C",
      "#F70000", "#FF2626", "#FF5353", "#FF7373", "#B9264F", "#D73E68", "#DD597D", "#E37795", "#5EAE9E", "#4A9586",
      "#8DC7BB", "#8ED6EA", "#4FBDDD", "#29AFD6", "#1F88A7", "#A8A8FF", "#8282FF"
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('hasSpacebox');
    }

    public function index()
    {
        $title = trans('messages.create-title');
        $langs = ["ES" => "Español", "EN" => "English", "PT" => "Português"];
        $colors = $this->colors;

        return view('createspace', compact('title', 'langs', 'colors'));
    }

    public function store(StoreSpacebox $request)
    {
        $otherStuff = [
            'slug' => str_slug($request->input('name')),
            'visible' => 1,
            'active' => 1,
            'user_id' => auth()->id()
        ];

        $spacebox = array_merge($request->except('_token'), $otherStuff);

        Spacebox::create($spacebox);

        return redirect()->route('space.show', [$spacebox['slug']]);
    }
}

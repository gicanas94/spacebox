<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class EditSpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'userHasNoSpacebox']);
    }

    public function index()
    {
        $title = trans('messages.editspace-title');
        $spacebox = $this->getSpacebox();

        return view('editspace', compact('title', 'image', 'spacebox'));
    }

    protected function getSpacebox()
    {
        return auth()->user()->spacebox;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;
use App\Http\Requests\EditSpacebox;

class EditSpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'userHasNoSpacebox']);
    }

    public function index()
    {
        $title = trans('messages.editspace-index-title');
        $spacebox = $this->getSpacebox();

        return view('editspace.index', compact('title', 'spacebox'));
    }

    public function edit()
    {
        $title = trans('messages.editspace-edit-title');
        $spacebox = $this->getSpacebox();
        $colors = Spacebox::colors();
        $langs = ["ES" => "Español", "EN" => "English", "PT" => "Português"];

        return view('editspace.edit', compact('title', 'spacebox', 'colors', 'langs'));
    }

    public function update(editSpacebox $request)
    {
        $data = $request->all();
        $spacebox = $this->getSpacebox();

        $spacebox->name = $data['name'];
        $spacebox->description = $data['description'];
        $spacebox->lang = $data['lang'];

        if ($data['color'] != null) {
            $spacebox->color = $data['color'];
        }

        if (! isset($data['visible'])) {
            $spacebox->visible = 0;
        } else {
            $spacebox->visible = 1;
        }

        $spacebox->save();

        return redirect(route('editspace'))->withSuccess(trans('messages.account-edit-success'));
    }

    protected function getSpacebox()
    {
        return auth()->user()->spacebox;
    }
}

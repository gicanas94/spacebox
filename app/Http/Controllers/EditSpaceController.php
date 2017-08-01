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
        $category = $this->getCategory($spacebox->category);

        return view('editspace.index', compact('title', 'spacebox', 'category'));
    }

    public function edit()
    {
        $title = trans('messages.editspace-edit-title');
        $spacebox = $this->getSpacebox();
        $colors = Spacebox::colors();
        $categories = Spacebox::categories();
        $langs = ['es' => 'Español', 'en' => 'English'];

        return view('editspace.edit', compact('title', 'spacebox', 'colors', 'categories', 'langs'));
    }

    public function update(editSpacebox $request)
    {
        $data = $request->all();
        $spacebox = $this->getSpacebox();

        $spacebox->name = $data['name'];
        $spacebox->description = $data['description'];
        $spacebox->category = $data['category'];
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

    protected function getCategory($id)
    {
        $categories = Spacebox::categories();

        return $categories[$id];
    }
}

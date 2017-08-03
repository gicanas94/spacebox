<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;
use App\Category;
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
        $category = $spacebox->category;

        return view('editspace.index', compact('title', 'spacebox', 'category'));
    }

    public function edit()
    {
        $title = trans('messages.editspace-edit-title');
        $spacebox = $this->getSpacebox();
        $colors = Spacebox::colors();
        $categories = Category::getCategories();
        $langs = ['es' => 'Español', 'en' => 'English'];

        return view('editspace.edit', compact('title', 'spacebox', 'colors', 'categories', 'langs'));
    }

    public function update(editSpacebox $request)
    {
        $data = $request->all();
        $spacebox = $this->getSpacebox();

        $spacebox->name = $data['name'];
        $spacebox->slug = str_slug($data['name'], '-') . '-' . auth()->id();
        $spacebox->description = $data['description'];
        $spacebox->category_id = $data['category_id'];
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

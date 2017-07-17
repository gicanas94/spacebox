<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;
use App\Post;
use App\Http\Requests\StoreSpaceboxPost;

class SpaceController extends Controller
{
    public function returnView($slug)
    {
        $spacebox = Spacebox::where('slug', $slug)->first();
        $title = '#' . $spacebox->name;
        $posts = Post::where('spacebox_id', $spacebox->id)->get();

        return view('space', compact('title', 'spacebox', 'posts'));
    }

    public function store(StoreSpaceboxPost $request)
    {
        Post::create($request->except('_token'));

        return back()->withSuccess(trans('messages.space-new-post'));
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return back();
    }
}

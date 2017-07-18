<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;
use App\Post;
use App\Http\Requests\StoreSpaceboxPost;

class SpaceController extends Controller
{
    public function show($slug)
    {
        $spacebox = Spacebox::where('slug', $slug)->first();
        $title = '#' . $spacebox->name;
        $posts = Post::where('spacebox_id', $spacebox->id)->get();

        return view('space', compact('title', 'spacebox', 'posts'));
    }

    public function store(StoreSpaceboxPost $request)
    {
        $otherStuff = [
            'date' => date("d/m/Y"),
            'spacebox_id' => auth()->user()->spacebox->id
        ];

        $post = array_merge($request->except('_token'), $otherStuff);

        Post::create($post);

        return back()->withSuccess(trans('messages.space-new-post'));
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return back();
    }
}

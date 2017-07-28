<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Spacebox;
use App\Post;
use App\Ban;
use App\Http\Requests\StoreSpaceboxPost;

class SpaceController extends Controller
{
    public function show($slug)
    {
        $spacebox = Spacebox::where('slug', $slug)->first();
        $title = '#' . $spacebox->name;
        $image = Image::where('user_id', $spacebox->user_id)->first();
        $posts = Post::where('spacebox_id', $spacebox->id)->get();
        $spaceboxIsBanned = $this->spaceboxIsBanned($spacebox);
        $userCanDoActions = $this->userCanDoActions($spacebox, $spaceboxIsBanned);

        if ($spaceboxIsBanned) {
            if (auth()->guest() || auth()->user()->id != $spacebox->user_id) {
                return redirect(route('index'));
            }
        }

        return view('space.index', compact('spacebox', 'title', 'image', 'posts',
            'spaceboxIsBanned', 'userCanDoActions'));
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

    protected function spaceboxIsBanned($spacebox)
    {
        if ($spacebox->ban_id != null) {
            $spaceboxIsBanned = Ban::where('spacebox_id', $spacebox->id)
                            ->latest()
                            ->first();

            return $spaceboxIsBanned;
        }
    }

    protected function userCanDoActions($spacebox, $spaceboxIsBanned)
    {
        if (auth()->user() &&
            auth()->user()->id === $spacebox->user_id &&
            auth()->user()->ban_id === null &&
            empty($spaceboxIsBanned)) {

            return true;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;
use App\Post;
use App\Comment;
use App\Ban;
use App\Http\Requests\StoreSpaceboxPost;

class SpaceController extends Controller
{
    public function show($slug)
    {
        $spacebox = Spacebox::where('slug', $slug)->first();
        $title = '#' . $spacebox->name;
        $posts = $this->getPosts($spacebox);
        $spaceboxIsBanned = $this->spaceboxIsBanned($spacebox);
        $canStoreOrDestroyPost = $this->canStoreOrDestroyPost($spacebox, $spaceboxIsBanned);
        $canStoreComment = $this->canStoreComment($spaceboxIsBanned);
        $canDestroyComment = $this->canDestroyComment($spacebox, $spaceboxIsBanned);
        $colors = Comment::colors();

        if ($spaceboxIsBanned) {
            if (auth()->guest() || auth()->user()->id != $spacebox->user_id) {
                return redirect(route('index'));
            }
        }

        return view('space.index', compact('spacebox', 'title', 'posts',
        'spaceboxIsBanned', 'canStoreOrDestroyPost', 'canStoreComment',
        'canDestroyComment', 'colors'));
    }

    //--------------------------------------------------------------------------

    public function storePost(StoreSpaceboxPost $request)
    {
        $otherStuff = [
            'date' => date("d/m/Y"),
            'spacebox_id' => auth()->user()->spacebox->id
        ];

        $post = array_merge($request->except('_token'), $otherStuff);

        Post::create($post);

        return back()->withSuccess(trans('messages.space-new-post'));
    }

    //--------------------------------------------------------------------------

    public function destroyPost($id)
    {
        Post::find($id)->delete();

        return back();
    }

    //--------------------------------------------------------------------------

    protected function storeComment(Request $request)
    {
        $rules = ["comment" => "required"];

        $this->validate($request, $rules);


        $otherStuff = [
            'date' => date("d/m/Y"),
            'user_id' => auth()->user()->id,
        ];

        $comment = array_merge($request->except('_token'), $otherStuff);

        Comment::create($comment);

        return back();
    }

    //--------------------------------------------------------------------------

    protected function destroyComment($id)
    {
        Comment::find($id)->delete();

        return back();
    }

    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------

    protected function spaceboxIsBanned($spacebox)
    {
        if ($spacebox->ban_id != null) {
            $spaceboxIsBanned = Ban::where('spacebox_id', $spacebox->id)
                            ->latest()
                            ->first();

            return $spaceboxIsBanned;
        }
    }

    //--------------------------------------------------------------------------

    protected function canStoreOrDestroyPost($spacebox, $spaceboxIsBanned)
    {
        if (auth()->user() &&
            auth()->user()->id === $spacebox->user_id &&
            auth()->user()->ban_id === null &&
            empty($spaceboxIsBanned)) {

            return true;
        }
    }

    //--------------------------------------------------------------------------

    protected function canStoreComment($spaceboxIsBanned)
    {
        if (auth()->user() &&
            auth()->user()->ban_id === null &&
            empty($spaceboxIsBanned)) {

            return true;
        }
    }

    //--------------------------------------------------------------------------

    protected function canDestroyComment($spacebox, $spaceboxIsBanned)
    {
        if (auth()->user() &&
            auth()->user()->id === $spacebox->user_id ||
            auth()->user() &&
            auth()->user()->ban_id === null &&
            empty($spaceboxIsBanned)) {

            return true;
        }
    }

    //--------------------------------------------------------------------------

    protected function getPosts($spacebox)
    {
        $posts = Post::where('spacebox_id', $spacebox->id);

        return $posts->with('comments')->orderBy('id', 'desc')->get();
    }
}

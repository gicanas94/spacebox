<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
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
        $image = Image::where('user_id', $spacebox->user_id)->first();
        $posts = $this->getPosts($spacebox);
        $spaceboxIsBanned = $this->spaceboxIsBanned($spacebox);
        $canStoreOrDestroyPost = $this->canStoreOrDestroyPost($spacebox, $spaceboxIsBanned);
        $canStoreComment = $this->canStoreComment($spaceboxIsBanned);
        $canDestroyComment = $this->canDestroyComment($spacebox, $spaceboxIsBanned);
        $colors = Spacebox::colors();

        if ($spaceboxIsBanned) {
            if (auth()->guest() || auth()->user()->id != $spacebox->user_id) {
                return redirect(route('index'));
            }
        }

        return view('space.index', compact('spacebox', 'title', 'image', 'posts',
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
        if ($request->content === null) {
            return back();
        }

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
            auth()->user()->id === $spacebox->user_id &&
            auth()->user()->ban_id === null &&
            empty($spaceboxIsBanned) ||
            auth()->user() && auth()->user()->ban_id === null) {

            return true;
        }
    }

    //--------------------------------------------------------------------------

    protected function getPosts($spacebox)
    {
        $posts = Post::where('spacebox_id', $spacebox->id);

        return $posts->with('comments')->get();
    }
}

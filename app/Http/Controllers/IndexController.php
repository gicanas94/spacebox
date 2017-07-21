<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Spacebox;
use App\Ban;

class IndexController extends Controller
{
    public function returnView()
    {
        $title = trans('messages.index-title');
        $totalUsers = $this->totalUsers();
        $spaceboxes = $this->spaceboxes();
        $userIsBanned = $this->userIsBanned();

        return view('index', compact('title', 'totalUsers', 'spaceboxes', 'userIsBanned'));
    }

    protected function totalUsers()
    {
        return $totalUsers = User::all()->count();
    }

    protected function spaceboxes()
    {
        return $spaceboxes = Spacebox::where('ban_id', null)
                                ->where('visible', 1)
                                ->get()
                                ->shuffle();
    }

    protected function userIsBanned()
    {
        if (auth()->user() && auth()->user()->ban != null) {
            $userIsBanned = auth()->user()->ban->latest()->first();

            return $userIsBanned;
        }
    }
}

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
        $totalUsers = User::all()->count();
        $spaceboxes = Spacebox::where('banned', 0)
                                ->where('visible', 1)
                                ->get()
                                ->shuffle();

        if (auth()->check() && auth()->user()->banned === 1) {
            $userBan = Ban::where('user_id', auth()->user()->id)
                            ->latest()
                            ->first();
        }

        return view('index', compact('title', 'totalUsers', 'spaceboxes', 'userBan'));
    }
}

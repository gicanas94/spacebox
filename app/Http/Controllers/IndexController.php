<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Spacebox;

class IndexController extends Controller
{
    public function returnView()
    {

        $title = trans('messages.index-title');
        $totalUsers = User::all()->count();
        $spaceboxes = Spacebox::where('active', 1)
                                ->where('visible', 1)
                                ->get()
                                ->shuffle();

        return view('index', compact('title', 'totalUsers', 'spaceboxes'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function returnView()
    {
        $title = trans('messages.admin-title');

        return view('admin')->with('title', $title);
    }
}

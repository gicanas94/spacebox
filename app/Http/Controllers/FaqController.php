<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function returnView()
    {
        $title = trans('messages.faq-title');

        return view('faq')->with('title', $title);
    }
}

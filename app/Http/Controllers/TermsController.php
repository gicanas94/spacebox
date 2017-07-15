<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function returnView()
    {
        $title = trans('messages.terms-title');

        return view('terms')->with('title', $title);
    }
}

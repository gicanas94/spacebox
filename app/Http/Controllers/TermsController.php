<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function returnView()
    {
        return view('terms', ['title' => trans('messages.terms-title')]);
    }
}

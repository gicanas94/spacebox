<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function returnView()
    {
        return view('faq', ['title' => trans('messages.faq-title')]);
    }
}

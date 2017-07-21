<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = trans('messages.account-title');
        $image = $this->getImage();

        return view('account', compact('title', 'image'));
    }

    protected function getImage()
    {
        return Image::where('user_id', auth()->user()->id)->first();
    }
}

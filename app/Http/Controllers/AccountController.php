<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Http\Requests\EditAccount;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = trans('messages.account-index-title');
        $image = $this->getImage();

        return view('account.index', compact('title', 'image'));
    }

    public function edit()
    {
        $title = trans('messages.account-edit-title');
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $image = $this->getImage();
        $langs = ['es' => 'Español', 'en' => 'English'];

        return view('account.edit', compact('title', 'user', 'image', 'langs'));
    }

    public function update(EditAccount $request)
    {
        $data = $request->all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->lang = $data['lang'];

        if ($data['password'] != null) {
            $user->password = bcrypt($data['password']);
        }

        if (isset($data['img'])) {
            $this->storeImg($data, $user_id);
        }

        $user->save();

        return redirect(route('account'))->withSuccess(trans('messages.account-edit-success'));
    }

    protected function getImage()
    {
        return Image::where('user_id', auth()->user()->id)->first();
    }

    protected function storeImg(array $data, $user_id)
    {
        if ($data['img']->isValid()) {
            $image = Image::where('user_id', $user_id)->first();

            unlink($image->src);

            $destination = public_path('user_img');
            $extension = $data['img']->getClientOriginalExtension();
            $fileName = 'user_id_' . $user_id . '.' . $extension;
            $data['img']->move($destination, $fileName);

            $image->src = 'user_img/' . $fileName;
            $image->save();
        }
    }
}

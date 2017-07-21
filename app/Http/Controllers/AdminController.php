<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Spacebox;
use App\Ban;
use App\Http\Requests\BanUser;
use App\Http\Requests\BanSpacebox;
use App\Http\Requests\MakeAdmin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('userIsAdmin');
    }

    public function index()
    {
        $title = trans('messages.admin-title');

        return view('admin')->with('title', $title);
    }

    public function banUser(BanUser $request)
    {
        $user = User::where('username', $request->username)->first();

        $ban = Ban::create([
            'reason' => $request->reason,
            '$user_id' => $user->id
        ]);

        User::find($user->id)->update(['ban_id' => $ban->id]);

        return back()->withSuccess(trans('messages.admin-ban-user'));
    }

    public function banSpacebox(BanSpacebox $request)
    {
        $spacebox = Spacebox::where('name', $request->name)->first();

        $ban = Ban::create([
            'reason' => $request->reason,
            '$spacebox_id' => $spacebox->id
        ]);

        Spacebox::find($spacebox->id)->update(['ban_id' => $ban->id]);

        return back()->withSuccess(trans('messages.admin-ban-spacebox'));
    }

    public function makeAdmin(MakeAdmin $request)
    {
        $adminRole = \HttpOz\Roles\Models\Role::findBySlug('admin');
        $admin = User::where('username', $request->username)->first();
        $admin->attachRole($adminRole);

        return back()->withSuccess(trans('messages.admin-make-admin'));
    }
}

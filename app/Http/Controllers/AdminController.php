<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Spacebox;
use App\Ban;
use App\Http\Requests\BanUser;
use App\Http\Requests\UnbanUser;
use App\Http\Requests\BanSpacebox;
use App\Http\Requests\UnbanSpacebox;
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

        return view('admin.index')->with('title', $title);
    }

    public function banUser(BanUser $request)
    {
        $data = $request->all();

        $user = User::where('username', $data['ban-user-username'])->first();

        $ban = Ban::create([
            'reason' => $data['ban-user-reason'],
            'user_id' => $user->id
        ]);

        User::find($user->id)->update(['ban_id' => $ban->id]);

        return back()->withSuccess(trans('messages.admin-ban-user'));
    }

    public function unbanUser(UnbanUser $request)
    {
        $data = $request->all();

        $user = User::where('username', $data['unban-user-username'])->first();

        User::find($user->id)->update(['ban_id' => null]);

        return back()->withSuccess(trans('messages.admin-unban-user'));
    }

    public function banSpacebox(BanSpacebox $request)
    {
        $data = $request->all();

        $spacebox = Spacebox::where('name', $data['ban-spacebox-name'])->first();

        $ban = Ban::create([
            'reason' => $data['ban-spacebox-reason'],
            'spacebox_id' => $spacebox->id
        ]);

        Spacebox::find($spacebox->id)->update(['visible' => 0, 'ban_id' => $ban->id]);

        return back()->withSuccess(trans('messages.admin-ban-spacebox'));
    }

    public function unbanSpacebox(UnbanSpacebox $request)
    {
        $data = $request->all();

        $spacebox = Spacebox::where('name', $data['unban-spacebox-name'])->first();

        Spacebox::find($spacebox->id)->update(['ban_id' => null]);

        return back()->withSuccess(trans('messages.admin-unban-spacebox'));
    }

    public function makeAdmin(MakeAdmin $request)
    {
        $data = $request->all();

        $adminRole = \HttpOz\Roles\Models\Role::findBySlug('admin');
        $admin = User::where('username', $data['make-admin-username'])->first();
        $admin->attachRole($adminRole);

        return back()->withSuccess(trans('messages.admin-make-admin'));
    }
}

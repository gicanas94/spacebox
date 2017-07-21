<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $title = trans('messages.register-title');
        $langs = ["ES" => "Español", "EN" => "English", "PT" => "Português"];

        return view('auth.register', compact('title', 'langs'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:3|max:30|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:4|max:25|confirmed',
            'question' => 'required|string|max:40',
            'answer' => 'required|string|max:40|different:s_question',
            'img' => 'required|image|between:1,10000',
            'terms' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $newUser = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'question' => $data['question'],
            'answer' => $data['answer'],
            'lang' => $data['lang'],
        ]);

        $this->storeImg($data);

        return $newUser;
    }

    protected function storeImg(array $data)
    {
        $user = User::where('username', $data['username'])->first();

        if ($data['img']->isValid()) {
            $destination = public_path('user_img');
            $extension = $data['img']->getClientOriginalExtension();
            $fileName = 'user_id_' . $user->id . '.' . $extension;
            $data['img']->move($destination, $fileName);

            Image::create([
                'src' => 'user_img/' . $fileName,
                'user_id' => $user->id
            ]);
        }
    }
}

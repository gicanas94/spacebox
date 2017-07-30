<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAccount extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:3|max:30|unique:users,username,' . auth()->user()->id,
            'email' => 'required|string|email|unique:users,email,' . auth()->user()->id,
            'img' => 'image|between:1,10000',
            'password' => 'nullable|string|min:4|max:25|confirmed',
            'current_password' => 'required|current_password'
        ];
    }
}

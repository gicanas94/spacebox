<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnbanSpacebox extends FormRequest
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
            'unban-spacebox-name' => 'required|exists:users,username',
        ];
    }
}

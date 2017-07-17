<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpaceboxPost extends FormRequest
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
            'title' => 'required|max:50',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('messages.space-titlerequired'),
            'title.max' => trans('messages.space-titlemax'),
            'content.required'  => trans('messages.space-contentrequired')
        ];
    }
}
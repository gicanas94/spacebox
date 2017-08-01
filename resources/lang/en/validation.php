<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'username' => [
            'required' => 'You must enter a username.',
            'min' => 'The username must be between 3 and 30 characters.',
            'max' => 'The username must be between 3 and 30 characters.',
            'unique' => 'The username entered already exists.',
            'exists' => 'The username entered does not exist.'
        ],
        'email' => [
            'required' => 'You must enter an e-mail.',
            'email' => 'You must enter a valid e-mail.',
            'unique' => 'An account already registered with the entered e-mail already exists.'
        ],
        'password' => [
            'required' => 'You must enter a password.',
            'min' => 'The password must be between 4 and 25 characters.',
            'max' => 'The password must be between 4 and 25 characters.',
            'confirmed' => 'The passwords entered do not match.'
        ],
        'current_password' => [
            'required' => 'You must enter your current password. ',
            'current_password' => 'The current password entered is incorrect.'
        ],
        'question' => [
            'required' => 'You must enter a secret question.',
            'max' => 'The secret question must not exceed 40 characters.'
        ],
        'answer' => [
            'required' => 'You must enter a secret password.',
            'max' => 'The secret answer must not exceed 40 characters.',
            'different' => 'The secret question and the secret answer can not be the same.'
        ],
        'img' => [
            'required' => 'You must upload an image.',
            'image' => 'The image format is not valid. Allowed format: .jpeg, .png, .bmp, .gif, .svg.',
            'between' => 'The weight of the image can not exceed 10mb.'
        ],
        'terms' => [
            'required' => 'You must accept our Terms of Use.'
        ],
        'name' => [
            'required' => 'Your Spacebox must to have a name!',
            'max' => 'The Spacebox name must not exceed 50 characters.',
            'exists' => 'The Spacebox name you entered does not exist.'
        ],
        'description' => [
            'required' => 'You must write a description.',
            'max' => 'The description must not exceed 200 characters.'
        ],
        'color' => [
            'required' => 'You must choose a color.'
        ],
        'title' => [
            'required' => 'You must enter a title.',
            'max' => 'The title must not exceed 50 characters.'
        ],
        'content' => [
            'required' => 'Your post must have content!'
        ],
        'ban-user-username' => [
            'required' => 'You must enter a username.',
            'exists' => 'The username entered does not exist.'
        ],
        'ban-user-reason' => [
            'required' => 'You must enter a reason.',
            'min' => 'The reason must be between 3 and 50 characters.',
            'max' => 'The reason must be between 3 and 50 characters.'
        ],
        'unban-user-username' => [
            'required' => 'You must enter a username.',
            'exists' => 'The username entered does not exist.'
        ],
        'ban-spacebox-name' => [
            'required' => 'You must enter a Spacebox name.',
            'exists' => 'The Spacebox name entered does not exist.'
        ],
        'ban-spacebox-reason' => [
            'required' => 'You must enter a reason.',
            'min' => 'The reason must be between 3 and 50 characters.',
            'max' => 'The reason must be between 3 and 50 characters.'
        ],
        'unban-spacebox-name' => [
            'required' => 'You must enter a Spacebox name.',
            'exists' => 'The Spacebox name entered does not exist.'
        ],
        'make-admin-username' => [
            'required' => 'You must enter a username.',
            'exists' => 'The username entered does not exist.'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

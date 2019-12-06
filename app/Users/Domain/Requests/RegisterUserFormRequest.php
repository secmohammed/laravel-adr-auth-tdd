<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class RegisterUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|min:4|max:40|string',
            'last_name' => 'required|min:4|max:40|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:32|confirmed',
        ];
    }
}

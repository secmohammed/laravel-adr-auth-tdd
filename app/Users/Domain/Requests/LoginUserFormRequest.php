<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class LoginUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|max:32|string',
        ];
    }
}

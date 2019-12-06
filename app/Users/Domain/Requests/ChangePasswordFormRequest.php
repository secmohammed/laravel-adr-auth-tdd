<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class ChangePasswordFormRequest extends APIRequest
{
    public function rules()
    {

        return [
            'old_password' => 'required|string|min:8|max:32',
            'password' => 'required|string|min:8|max:32|confirmed',
        ];
    }
}

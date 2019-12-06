<?php

namespace App\Users\Domain\Requests;

use App\App\Http\Requests\APIRequest;
use Illuminate\Auth\Access\AuthorizationException;

class ActivationUserFormRequest extends APIRequest
{
    public function authorize()
    {
        return auth()->user()->can('update-post', new Post);
    }
    public function rules()
    {
        return [
            'id' => 'required|numeric',
            'token' => 'required',
        ];
    }
    protected function failedAuthorization()
    {
        throw new AuthorizationException('You can not update this post');
    }
}

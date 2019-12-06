<?php


namespace App\Users\Domain\Requests;


use App\App\Http\Requests\APIRequest;

class ResendActivationUserAccountFormRequest extends APIRequest
{
    public function rules()
    {
        return[
            'user_id'=>'required|numeric'
        ];
    }

}

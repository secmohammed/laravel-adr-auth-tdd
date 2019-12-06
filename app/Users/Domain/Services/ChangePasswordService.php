<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use Illuminate\Support\Facades\Hash;

class ChangePasswordService extends Service
{
    public function handle($data = [])
    {

        // if user is logged in
        if (auth()->check()) {
            // get authanticated user password
            $password = auth()->user()->password;
            // if oldPassword matched
            if (Hash::check($data['old_password'], $password)) {
                auth()->user()->update([
                    'password' => bcrypt($data['password']),
                ]);
                $message = [
                    'message' => 'password updated',
                ];
                return new GenericPayload($message);
            }
            // if oldPassword doesn'\t match
            $message = [
                'message' => 'wrong password',
            ];

            return new UnauthorizedPayload($message, 406);
        }
    }
}

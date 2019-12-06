<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\UserRepository;
class ActivateUserAccountService extends Service
{
    protected $activations;
    public function __construct(ActivationRepository $activations)
    {
        $this->activations = $activations;
    }

    public function handle(User $user = null, $token = null)
    {
        $this->activations->complete($user, $token);
        return new GenericPayload([
            'message' => 'Account has been activated, Thanks ' . $user->first_name . ' , For being with us !',
        ]);
    }
}

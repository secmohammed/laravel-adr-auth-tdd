<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Pipelines\CreateActivationTokenForUserPipeline;
use App\Users\Domain\Pipelines\CreateUserPipeline;
use App\Users\Domain\Repositories\UserRepository;
use Illuminate\Pipeline\Pipeline;

class RegisterUserService extends Service
{
    protected $users;
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data = [])
    {
        $data['password'] = bcrypt($data['password']);
        $pipes = [
            CreateUserPipeline::class,
            CreateActivationTokenForUserPipeline::class,
        ];
        $user = app(Pipeline::class)->through($pipes)->send($data)->then(function ($user) {
            return $user;
        });
        return new GenericPayload($user);
    }
}

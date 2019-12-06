<?php

namespace App\Users\Domain\Pipelines;

use App\Users\Domain\Repositories\UserRepository;

class CreateUserPipeline
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data, \Closure $next)
    {
        return $next($this->users->create($data));
    }

}

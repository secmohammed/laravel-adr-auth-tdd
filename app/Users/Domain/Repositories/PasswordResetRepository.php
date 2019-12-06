<?php

namespace App\Users\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\Domain\Traits\IssueTokens;
use App\Users\Domain\Models\PasswordReset;

class PasswordResetRepository extends Repository
{
    use IssueTokens;
    protected $model;
    protected $process = 'passwordReset';

    public function __construct(PasswordReset $model)
    {
        $this->model = $model;
    }
}

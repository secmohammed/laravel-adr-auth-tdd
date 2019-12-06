<?php

namespace App\Users\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\Domain\Traits\IssueTokens;
use App\Users\Domain\Models\Activation;

class ActivationRepository extends Repository
{
    use IssueTokens;
    protected $model;
    protected $process = 'activation';

    public function __construct(Activation $model)
    {
        $this->model = $model;
    }
}

<?php


namespace App\Users\Domain\Repositories;


use App\App\Domain\Repositories\Repository;
use App\Users\Domain\Models\Title;

class TitleRepository extends Repository
{
    protected $model;
    public function __construct(Title $model)
    {
        $this->model=$model;
    }

}

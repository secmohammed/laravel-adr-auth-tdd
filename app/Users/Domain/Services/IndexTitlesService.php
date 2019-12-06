<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Repositories\TitleRepository;
use App\Users\Domain\Repositories\UserRepository;
class IndexTitlesService extends Service
{
    protected $titles;
    public function __construct(TitleRepository $titles)
    {
        $this->titles = $titles;
    }
    public function handle($data = [])
    {
        return new GenericPayload($this->titles->all());
    }
}

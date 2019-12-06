<?php

namespace App\Users\Actions;

use App\Users\Domain\Services\IndexTitlesService;
use App\Users\Responders\IndexTitlesResponder;

class IndexTitlesAction 
{
    public function __construct(IndexTitlesResponder $responder, IndexTitlesService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke() 
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}
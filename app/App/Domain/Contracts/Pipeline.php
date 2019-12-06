<?php


namespace App\App\Domain\Contracts;


interface Pipeline
{
    public function handle($content, \Closure $next);

}

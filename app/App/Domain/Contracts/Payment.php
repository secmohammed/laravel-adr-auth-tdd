<?php


namespace App\App\Domain\Contracts;


interface Payment
{
    public function getToken($data=[]);
    public function response($data=[]);

}

<?php

namespace App\App\Domain\Ordering;

use Illuminate\Database\Eloquent\Model;

class Orderer
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model->query();
    }
    public function first()
    {
        return $this->model->orderBy('order', 'asc')->first()->order - 1;
    }
    public function last()
    {
        return $this->model->orderBy('order', 'desc')->first()->order + 1;
    }
    public function after()
    {
        $adjacent = $this->model->where('order', '>', $this->order)
            ->orderBy('order', 'asc')
            ->first();
        return optional($adjacent, function ($adjacent) {
            return ($this->order + $adjacent->order) / 2;
        }) ?? $this->last();
    }
    public function before()
    {
        $adjacent = $this->model->where('order', '<', $this->order)
            ->orderBy('order', 'desc')
            ->first();
        return optional($adjacent, function ($adjacent) {
            return ($this->order + $adjacent->order) / 2;
        }) ?? $this->first();
    }

}

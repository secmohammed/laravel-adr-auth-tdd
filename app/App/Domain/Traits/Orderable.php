<?php

namespace App\App\Domain\Traits;

use App\App\Domain\Ordering\Orderer;

trait Orderable
{
    public function orderer()
    {
        return new Orderer($this);
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (is_null($model->order)) {
                $model->order = $this->orderer()->last();
            }
        });
    }
}

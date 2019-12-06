<?php

namespace App\Users\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

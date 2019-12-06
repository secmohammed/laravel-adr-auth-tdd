<?php


namespace App\Users\Domain\Models;


use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $guarded=['id'];

    public function translations()
    {
        return $this->hasMany(TitleTranslation::class);
    }
}

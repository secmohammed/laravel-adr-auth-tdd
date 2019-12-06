<?php


namespace App\Users\Domain\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TitleTranslation extends Model
{
    protected $table = 'title_translations';
    protected $guarded = [
        'id',
    ];

    public function title(){
        return $this->belongsTo(Title::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(function (Builder $builder) {
            return $builder->whereLocale(config('app.locale'));
        });
    }

}

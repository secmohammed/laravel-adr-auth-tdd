<?php


namespace App\Users\Domain\Resources;


use App\App\Http\Resources\BaseResource;

class TitleResource extends BaseResource
{
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->translations->first()?$this->translations->first()->name:'',
        ];
    }

}

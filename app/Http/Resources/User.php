<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=>[
                'type'=>'users',
                'id'=>$this->id,
                'attributes'=>[
                    'name'=>$this->name,
                    'shipping_address'=>$this->shipping_address,
                ]
            ]
        ];
    }
}

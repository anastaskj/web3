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
        //return parent::toArray($request);// this will return the 
        //user request from post man that is the api application
        //selection the attributes to be return by the api
        return [
            'name' => $this->name,
            'email' => $this->email
      
        ];
    }
}

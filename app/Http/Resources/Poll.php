<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Poll extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


      return parent::toArray($request);
        // return[
        //   "title" => "$this->title"
        //  //"title" => mb_strwidth($this->title, 0,5,'...'),
        //
        // ];
    }
}

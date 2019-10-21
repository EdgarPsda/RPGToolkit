<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HerosResource extends JsonResource
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
            'id' => $this->id,
            'firstName' => $this->fname,
            'lastName' => $this->lname,
            'level' => $this->level,
            'race' => $this->race,
            'class' => $this->class,
            'weapon' => $this->weapon,
            'stats' => $this->stats
        ];
    }
}

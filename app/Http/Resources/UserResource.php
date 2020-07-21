<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'user',
            'id' => (string) $this->id,
            'attributes' => [
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
            ],
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {return [
        'id' => $this->id,
        'user' => new UserResource($this->whenLoaded('user')),
        'post' => new PostResource($this->whenLoaded('post')),
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
    }
}

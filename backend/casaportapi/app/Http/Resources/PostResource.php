<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'picture' => $this->picture,
            'share' => $this->share,
            'user' => $this->whenLoaded('user', function () {
                return new UserResource($this->user);
            }),
            'likes_count' => $this->whenLoaded('like', function () {
                return $this->like->count();
            }),
        
            'likes_users' => LikeResource::collection($this->whenLoaded('like')),    
            'commente' => CommenteResource::collection($this->whenLoaded('commente')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

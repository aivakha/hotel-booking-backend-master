<?php

namespace App\Http\Resources\Comment;

use App\Http\Resources\Author\AuthorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'text' => $this->text,
            'rate' => $this->rate,
            'status' => $this->status,
            'author' => new AuthorResource($this->author),
            'created_at' => $this->created_at,
        ];
    }
}

<?php

namespace App\Http\Resources\Blogs;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "author" => $this->user->name,
            "isPublish" => $this->is_publish,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
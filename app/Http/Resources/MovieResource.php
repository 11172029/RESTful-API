<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->_id,
            'title' => $this->original_title,
            'language' => $this->original_language,
            'genre' => $this->genre,
            'popularity' => $this->popularity,
            'vote_count' => $this->vote_count,
            'vote_average' => $this->vote_average,
            'release_date' => $this->release_date,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GenreResource;

class BookResource extends JsonResource
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
            'isbn' => $this->isbn,
            'title' => $this->title,
            'author' => $this->author,
            'classification' => $this->classification,   
            'cover' => $this->cover,
            'synopsis' => $this->synopsis,
            'genre' => new GenreResource($this->genre), 
        ];
    }
}

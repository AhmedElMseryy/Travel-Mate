<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Title' => $this->title,
            'Description' => $this->description,
            'Image' => $this->image ? asset('storage/abouts/' . $this->image) : null,
        ];
    }
}

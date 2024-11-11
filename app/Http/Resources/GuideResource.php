<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Name' => $this->name,
            'Email' => $this->email,
            'Description' => $this->description,
            'Linkedin' => $this->linkedin
                ? (str_contains($this->linkedin, 'linkedin.com') ? $this->linkedin : 'https://www.linkedin.com/in/' . $this->linkedin)
                : null,
            'Image' => $this->image ? asset('storage/guides/' . $this->image) : null,
        ];
    }
}

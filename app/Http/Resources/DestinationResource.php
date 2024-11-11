<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->id,
            'Name' => $this->name,
            'Price' => $this->price,
            'Date' => $this->date,
            'Image' => $this->image ? asset('storage/destinations/' . $this->image) : null,
        ];
    }
}

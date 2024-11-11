<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Facebook' => $this->facebook,
            'Linkedin' => $this->linkedin,
            'Twitter' => $this->twitter,
            'Google' => $this->Google,
            'Github' => $this->Github,
        ];
    }
}

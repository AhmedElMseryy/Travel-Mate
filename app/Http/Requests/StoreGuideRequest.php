<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:guides,email',
            'description' => 'required|string',
            'linkedin' => 'required|url',
            'image' => 'required|image|mimes:png,jpg',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('keywords.name'),
            'email' => __('keywords.email'),
            'description' => __('keywords.description'),
            'linkedin' => __('keywords.linkedin'),
            'image' => __('keywords.image'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredestinationRequest extends FormRequest
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
            'price' => 'required|string',
            'date' => 'required|string',
            'image' => 'required|mimes:jpg,png',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('keywords.name'),
            'price' => __('keywords.price'),
            'date' => __('keywords.date'),
            'image' => __('keywords.image'),
        ];
    }
}

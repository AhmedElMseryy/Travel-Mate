<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'Google' => 'required|url',
            'Github' => 'nullable|url',
        ];
    }

    public function attributes(): array
    {
        return [
            'facebook' => __('keywords.facebook'),
            'linkedin' => __('keywords.linkedin'),
            'twitter' => __('keywords.twitter'),
            'Google' => __('keywords.Google'),
            'Github' => __('keywords.Github'),
        ];
    }
}

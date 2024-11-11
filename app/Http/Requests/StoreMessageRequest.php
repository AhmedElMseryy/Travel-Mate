<?php

namespace App\Http\Requests;

use App\Http\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    ##--------------------------------API VALIDATION ERROR
    protected function failedValidation(Validator $validator)
    {

        if ($this->is('api/*')) {
            $response = ApiResponse::senResponse(422, 'validation errors', $validator->errors());
            throw new ValidationException($validator, $response);
        }
    }
    ##------------------------------------------------------

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('keywords.name'),
            'email' => __('keywords.email'),
            'subject' => __('keywords.subject'),
            'message' => __('keywords.messages'),
        ];
    }
}

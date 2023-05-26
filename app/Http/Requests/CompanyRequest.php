<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
            'email' => 'email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'logo.mimes' => 'Upload jpeg, png, jpg only.',
            'logo.dimensions' => 'Minimum requirement of logo dimension is 100x100.',
            'email.email' => 'Please enter a valid email address.',
        ];
    }
}

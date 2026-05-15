<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:8', 'max:100'],
            'description' => ['required', 'string', 'min:8', 'max:255'],
            'surface' => ['required', 'integer', 'min:1'],
            'rooms' => ['required', 'integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'city' => ['required', 'string', 'min:2', 'max:100'],
            'adress' => ['required', 'string', 'min:10', 'max:255'],
            'postal_code' => ['required', 'string', 'min:5', 'max:10'],
            'sold' => ['nullable', 'boolean'],
            'options' => ['nullable', 'array'],
            'options.*' => ['exists:options,id'],
        ];
    }
}

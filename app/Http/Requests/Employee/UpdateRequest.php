<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'firstName' => 'nullable|string|min:3|max:250',
            'lastName' => 'nullable|string|min:3|max:250',
            'email' => 'nullable|string|min:3|max:250',
            'phone' => 'nullable|string|min:8|max:11',
            'company' => 'nullable|string|min:3|max:250',
        ];
    }
}

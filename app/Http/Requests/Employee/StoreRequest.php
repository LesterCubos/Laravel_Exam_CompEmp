<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'firstName' => 'required|string|min:3|max:250',
            'lastName' => 'required|string|min:3|max:250',
            'email' => 'nullable|string|min:3|max:250',
            'phone' => 'nullable|string|min:8|max:11',
            'company' => 'required|string|min:3|max:250',
        ];
    }
}

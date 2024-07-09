<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelPackageRequest extends FormRequest
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
            'name' => 'required',
            'rate' => 'required|integer|min:1|max:5',
            'original_price' => 'required|integer|min:1000000',
            'current_price' => 'required|integer|min:1000000',
            'description' => 'required',
            'day' => 'required|integer|min:1|max:5',
            'night' => 'required||integer|min:1|max:5'
        ];
    }
}

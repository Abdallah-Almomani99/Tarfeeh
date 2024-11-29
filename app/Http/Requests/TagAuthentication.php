<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagAuthentication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to `true` if all users are authorized to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tag_name' => 'required|string|max:255|unique:tags,tag_name', // Ensures `tag_name` is unique, required, and a string
        ];
    }

    /**
     * Customize the error messages for the validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'tag_name.required' => 'The tag name is required.',
            'tag_name.string' => 'The tag name must be a valid string.',
            'tag_name.max' => 'The tag name must not exceed 255 characters.',
            'tag_name.unique' => 'This tag name is already in use.',
        ];
    }
}

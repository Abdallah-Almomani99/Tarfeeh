<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthentication extends FormRequest
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
            "user_name" => "required|string|max:50|unique:users,user_name," . $this->id, // Unique rule excluding the current user
            "first_name" => "required|string|max:50",
            "last_name" => "required|string|max:50",
            "gender" => "required|in:male,female",
            "birthday" => "required|date|before:today|after:100 years ago",
            "email" => "required|email|unique:users,email," . $this->id,
            "phone" => "required|regex:/^[0-9]{10}$/",
            "password" => "required|string|min:8",
            "point" => "nullable|integer|min:0",
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         "first_name.required" => "required message", // Required, must be a string, max length 50
    //         "last_name.required" => "required message",  // Required, must be a string, max length 50
    //         "gender.required" => "required message",    // Required, must be one of the provided values
    //         "email.required" => "required message", // Required, must be a valid email, unique in the users table
    //         "password.required" => "required message", // Required, must be at least 8 characters, needs confirmation
    //         "phone.required" => "required message", // Required, must be a valid 10-digit phone number
    //     ];
    // }
}

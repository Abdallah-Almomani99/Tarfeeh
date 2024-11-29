<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityAuthentication extends FormRequest
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
            'venue_id' => 'required|exists:venues,venue_id', // Must reference a valid venue ID
            'name' => 'required|string|max:255', // Name must be a string and not exceed 255 characters
            'description' => 'nullable|string', // Optional description
            'price' => 'required|numeric|min:0', // Price must be a positive number
            'gender' => 'required|in:male,female,all', // Must be 'male', 'female', or 'all'
            'duration' => 'required|integer|min:1', // Duration must be in time format (HH:mm)
            'allowed_age' => 'required|integer|min:0', // Allowed age must be an integer (e.g., 18)
            'capacity' => 'required|integer|min:1', // Capacity must be at least 1
            'created_at' => 'nullable|date', // Optional; must be a valid date
            'updated_at' => 'nullable|date', // Optional; must be a valid date
        ];
    }

    public function messages(): array
    {
        return [
            'venue_id.required' => 'The venue ID is required.',
            'venue_id.exists' => 'The selected venue does not exist.',
            'name.required' => 'The activity name is required.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'gender.required' => 'The gender is required.',
            'gender.in' => 'Gender must be either "male", "female", or "all".',
            'duration.required' => 'The duration is required.',
            'duration.date_format' => 'The duration must be in the format HH:mm.',
            'allowed_age.required' => 'The allowed age is required.',
            'allowed_age.integer' => 'The allowed age must be an integer.',
            'capacity.required' => 'The capacity is required.',
            'capacity.min' => 'Capacity must be at least 1.',
        ];
    }
}

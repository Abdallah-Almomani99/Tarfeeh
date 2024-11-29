<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingAuthentication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow all users for now, but can be customized based on user roles.
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

            'user_id' => 'required|exists:users,id',  // Venue ID must exist in the venues table
            'venue_id' => 'required|exists:venues,venue_id',  // Venue ID must exist in the venues table
            'activity_id' => 'required|exists:activities,activity_id',  // Activity ID must exist in the activities table
            'booking_date' => 'required|date|after_or_equal:today',  // The booking date must be a valid date
            'booking_time' => 'required|date_format:H:i',  // The booking time must be in HH:mm format
            'companions' => 'required|integer|min:0',  // The number of companions must be an integer and at least 0
            'status' => 'required|in:Pending,Confirmed,Cancelled',  // Status must be one of the given values
        ];
    }

    /**
     * Get the custom error messages for validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'venue_id.required' => 'The venue is required.',
            'venue_id.exists' => 'The selected venue does not exist.',
            'activity_id.required' => 'The activity is required.',
            'activity_id.exists' => 'The selected activity does not exist.',
            'booking_date.required' => 'The booking date is required.',
            'booking_date.date' => 'The booking date must be a valid date.',
            'booking_time.required' => 'The booking time is required.',
            'booking_time.date_format' => 'The booking time must be in the format HH:mm.',
            'companions.required' => 'The number of companions is required.',
            'companions.integer' => 'The number of companions must be an integer.',
            'companions.min' => 'The number of companions cannot be negative.',
            'status.required' => 'The status is required.',
            'status.in' => 'The status must be one of: Pending, Confirmed, Cancelled.',
        ];
    }
}

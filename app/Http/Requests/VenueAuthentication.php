<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VenueAuthentication extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'type' => 'required|string|max:100',
            'phone' => 'required|regex:/^[0-9]{10,15}$/|unique:venues,phone,' . $this->id . ',venue_id',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'price_range' => 'nullable|string|max:50',
            'open_time' => 'required', //|date_format:H:i',  Validates as time in HH:MM format
            'close_time' => 'required', //|date_format:H:i|after:open_time', // Validates as time and ensures it is after open_time
            'tags' => 'nullable|array', // Expect tags as an array
            // 'tags.*' => 'exists:tags,tag_id', // Validate that each tag ID exists in the tags table
            'created_at' => 'nullable|date', // If manually set, must be a valid date
            'updated_at' => 'nullable|date', // If manually set, must be a valid date
        ];
    }
}

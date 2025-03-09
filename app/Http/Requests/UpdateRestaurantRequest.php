<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'phone_number' => 'required|string|max:20',
            'address_uz' => 'required|string|max:255',
            'address_ru' => 'required|string|max:255',
            'address_en' => 'required|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'channel_id' => 'nullable|string|max:255',
            'tax' => 'nullable|numeric|min:0',
            'work_time_start' => 'required|string|max:50',
            'work_time_end' => 'required|string|max:50',
            'start_work_day_uz' => 'required|string|max:5',
            'end_work_day_uz' => 'required|string|max:5',
            'start_work_day_ru' => 'required|string|max:5',
            'end_work_day_ru' => 'required|string|max:5',
            'start_work_day_en' => 'required|string|max:5',
            'end_work_day_en' => 'required|string|max:5',
            'status' => 'nullable|integer',
            'delivery_time' => 'nullable|string',
        ];
    }
}

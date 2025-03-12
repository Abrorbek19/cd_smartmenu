<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
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
            'restaurant_id' => 'required|exists:restaurants,id',
            'restaurant_star' => 'nullable|in:1,2,3,4,5',
            'restaurant_text' => 'nullable|string|max:500',
            'service_star' => 'nullable|in:1,2,3,4,5',
            'service_text' => 'nullable|string|max:500',
        ];
    }


    public function messages()
    {
        return [
            'restaurant_id.required' => 'Restoran tanlangan bo‘lishi kerak.',
            'restaurant_id.integer' => 'Restoran ID raqam bo‘lishi kerak.',
            'restaurant_id.exists' => 'Tanlangan restoran mavjud emas.',
            'restaurant_star.required_without' => 'Restoran bahosi tanlangan bo‘lishi kerak.',
            'restaurant_star.integer' => 'Restoran bahosi butun raqam bo‘lishi kerak.',
            'restaurant_star.min' => 'Restoran bahosi kamida 1 bo‘lishi kerak.',
            'restaurant_star.max' => 'Restoran bahosi eng ko‘pi bilan 5 bo‘lishi kerak.',
            'restaurant_text.string' => 'Restoran izohi matn bo‘lishi kerak.',
            'restaurant_text.max' => 'Restoran izohi 500 belgidan oshmasligi kerak.',
            'service_star.required_without' => 'Xizmat bahosi tanlangan bo‘lishi kerak.',
            'service_star.integer' => 'Xizmat bahosi butun raqam bo‘lishi kerak.',
            'service_star.min' => 'Xizmat bahosi kamida 1 bo‘lishi kerak.',
            'service_star.max' => 'Xizmat bahosi eng ko‘pi bilan 5 bo‘lishi kerak.',
            'service_text.string' => 'Xizmat izohi matn bo‘lishi kerak.',
            'service_text.max' => 'Xizmat izohi 500 belgidan oshmasligi kerak.',
        ];
    }
}

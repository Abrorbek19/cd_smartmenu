<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMealRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'price' => 'required|string|min:0',
            'weight' => 'nullable|string|max:255',
            'time' => 'required|string|max:255',
            'status' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Kategoriya maydoni majburiy.',
            'category_id.exists' => 'Tanlangan kategoriya mavjud emas.',
            'name_uz.required' => 'Ism (UZ) maydoni majburiy.',
            'name_ru.required' => 'Ism (RU) maydoni majburiy.',
            'name_en.required' => 'Ism (EN) maydoni majburiy.',
            'photo.image' => 'Rasm tasvir bo\'lishi kerak.',
            'photo.mimes' => 'Rasm jpeg, png, jpg, gif turida bo\'lishi kerak.',
            'photo.max' => 'Rasm 10MB dan katta bo\'lmasligi kerak.',
            'price.required' => 'Narx maydoni majburiy.',
            'price.numeric' => 'Narx raqam bo\'lishi kerak.',
            'price.min' => 'Narx kamida 0 bo\'lishi kerak.',
            'time.required' => 'Vaqt maydoni majburiy.',
            'time.min' => 'Vaqt kamida 1 bo\'lishi kerak.',
            'status.integer' => 'Holat butun raqam bo\'lishi kerak.',
            'status.in' => 'Tanlangan holat yaroqsiz.',
        ];
    }
}

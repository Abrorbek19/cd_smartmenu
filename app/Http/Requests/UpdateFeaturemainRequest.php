<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeaturemainRequest extends FormRequest
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
            'title_uz' => 'sometimes|required|string|max:255',
            'title_ru' => 'sometimes|required|string|max:255',
            'title_en' => 'sometimes|required|string|max:255',
            'description_uz' => 'sometimes|required|string',
            'description_ru' => 'sometimes|required|string',
            'description_en' => 'sometimes|required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title_uz.required' => 'O\'zbekcha sarlavha majburiy.',
            'title_ru.required' => 'Ruscha sarlavha majburiy.',
            'title_en.required' => 'Inglizcha sarlavha majburiy.',
            'title_uz.string' => 'O\'zbekcha sarlavha faqat matn bo\'lishi kerak.',
            'title_ru.string' => 'Ruscha sarlavha faqat matn bo\'lishi kerak.',
            'title_en.string' => 'Inglizcha sarlavha faqat matn bo\'lishi kerak.',
            'title_uz.max' => 'O\'zbekcha sarlavha 255 belgidan oshmasligi kerak.',
            'title_ru.max' => 'Ruscha sarlavha 255 belgidan oshmasligi kerak.',
            'title_en.max' => 'Inglizcha sarlavha 255 belgidan oshmasligi kerak.',
            'description_uz.required' => 'O\'zbekcha tavsif majburiy.',
            'description_ru.required' => 'Ruscha tavsif majburiy.',
            'description_en.required' => 'Inglizcha tavsif majburiy.',
            'icon.image' => 'Yuklangan fayl rasm formatida bo\'lishi kerak.',
            'icon.mimes' => 'Rasm faqat jpeg, png, jpg, yoki gif formatida bo\'lishi mumkin.',
            'icon.max' => 'Rasm hajmi 2MB dan oshmasligi kerak.',
        ];
    }
}

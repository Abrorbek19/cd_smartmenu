<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
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
            'fullname' => 'required|string|max:255',
            'role_user_uz' => 'required|string|max:255',
            'role_user_ru' => 'required|string|max:255',
            'role_user_en' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'star'=>"required|string",
            'restaran_id'=>"required|integer",
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }


    public function messages()
    {
        return [
            'fullname.required' => 'O\'zbekcha sarlavha majburiy.',
            'role_user_uz.required' => 'O\'zbekcha sarlavha majburiy.',
            'role_user_ru.required' => 'Ruscha sarlavha majburiy.',
            'role_user_en.required' => 'Inglizcha sarlavha majburiy.',
            'role_user_uz.string' => 'O\'zbekcha sarlavha faqat matn bo\'lishi kerak.',
            'role_user_ru.string' => 'Ruscha sarlavha faqat matn bo\'lishi kerak.',
            'role_user_en.string' => 'Inglizcha sarlavha faqat matn bo\'lishi kerak.',
            'role_user_uz.max' => 'O\'zbekcha sarlavha 255 belgidan oshmasligi kerak.',
            'role_user_ru.max' => 'Ruscha sarlavha 255 belgidan oshmasligi kerak.',
            'role_user_en.max' => 'Inglizcha sarlavha 255 belgidan oshmasligi kerak.',
            'description_uz.required' => 'O\'zbekcha tavsif majburiy.',
            'description_ru.required' => 'Ruscha tavsif majburiy.',
            'description_en.required' => 'Inglizcha tavsif majburiy.',
            'image.image' => 'Yuklangan fayl rasm formatida bo\'lishi kerak.',
            'image.mimes' => 'Rasm faqat jpeg, png, jpg, yoki gif formatida bo\'lishi mumkin.',
            'image.max' => 'Rasm hajmi 2MB dan oshmasligi kerak.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTitleemainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'position' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'title_uz.required' => 'Oʻzbek tilidagi sarlavha kiritilishi shart.',
            'title_ru.required' => 'Rus tilidagi sarlavha kiritilishi shart.',
            'title_en.required' => 'Ingliz tilidagi sarlavha kiritilishi shart.',
            'description_uz.required' => 'Oʻzbek tilidagi tavsif kiritilishi shart.',
            'description_ru.required' => 'Rus tilidagi tavsif kiritilishi shart.',
            'description_en.required' => 'Ingliz tilidagi tavsif kiritilishi shart.',
            'position.required' => 'Pozitsiya kiritilishi shart.',
        ];

    }
}

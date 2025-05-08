<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'tax' => 'nullable|integer|min:0',
            'work_time_start' => 'required',
            'work_time_end' => 'required',
            'start_work_day_uz' => 'required|string|max:255',
            'end_work_day_uz' => 'required|string|max:255',
            'start_work_day_ru' => 'required|string|max:255',
            'end_work_day_ru' => 'required|string|max:255',
            'start_work_day_en' => 'required|string|max:255',
            'end_work_day_en' => 'required|string|max:255',
            'status' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Restoran nomi majburiy.',
            'logo.image' => 'Logo rasm fayli bo‘lishi kerak.',
            'logo.mimes' => 'Logoningiz faqat jpeg, png, jpg, yoki gif formatida bo‘lishi kerak.',
            'logo.max' => 'Logoningiz 5 MB dan oshmasligi kerak.',
            'phone_number.required' => 'Telefon raqami majburiy.',
            'address_uz.required' => 'O‘zbekcha manzil majburiy.',
            'address_ru.required' => 'Ruscha manzil majburiy.',
            'address_en.required' => 'Inglizcha manzil majburiy.',
            'work_time_start.required' => 'Ish vaqti boshlanishi majburiy.',
            'work_time_end.required' => 'Ish vaqti tugashi majburiy.',
            'start_work_day_uz.required' => 'Ish kuni boshlanishi (UZ) majburiy.',
            'end_work_day_uz.required' => 'Ish kuni tugashi (UZ) majburiy.',
            'start_work_day_ru.required' => 'Ish kuni boshlanishi (RU) majburiy.',
            'end_work_day_ru.required' => 'Ish kuni tugashi (RU) majburiy.',
            'start_work_day_en.required' => 'Ish kuni boshlanishi (EN) majburiy.',
            'end_work_day_en.required' => 'Ish kuni tugashi (EN) majburiy.',
            'tax.integer' => 'Soliq qiymati butun son bo‘lishi kerak.',
        ];
    }
}

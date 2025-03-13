<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'tariff_id' => 'required|exists:tariffs,id',
            'payment_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'money' => 'required|string|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'restaurant_id.required' => 'Restoran ID ni kiritish majburiy.',
            'restaurant_id.exists' => 'Kiritilgan restoran ID mavjud emas.',
            'tariff_id.required' => 'Tarif ID ni kiritish majburiy.',
            'tariff_id.exists' => 'Kiritilgan tarif ID mavjud emas.',
            'payment_photo.required' => 'To‘lov rasmi majburiy.',
            'payment_photo.image' => 'To‘lov rasmi tasvir formati bo‘lishi kerak.',
            'payment_photo.mimes' => 'To‘lov rasmi jpeg, png, jpg yoki gif formatida bo‘lishi kerak.',
            'payment_photo.max' => 'To‘lov rasmi hajmi 2MB dan oshmasligi kerak.',
            'money.required' => 'To‘lov miqdorini kiritish majburiy.',
            'money.numeric' => 'To‘lov miqdori son bo‘lishi kerak.',
            'money.min' => 'To‘lov miqdori kamida 1 bo‘lishi kerak.',
            'start_date.required' => 'Boshlanish sanasini kiritish majburiy.',
            'start_date.date' => 'Boshlanish sanasi to‘g‘ri formatda bo‘lishi kerak.',
            'end_date.required' => 'Tugash sanasini kiritish majburiy.',
            'end_date.date' => 'Tugash sanasi to‘g‘ri formatda bo‘lishi kerak.',
            'end_date.after' => 'Tugash sanasi boshlanish sanasidan keyin bo‘lishi kerak.',
        ];
    }
}

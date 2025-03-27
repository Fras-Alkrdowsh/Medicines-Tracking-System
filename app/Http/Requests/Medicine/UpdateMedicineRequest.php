<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'expirationDate' => 'required|string|max:255',
            'quantity' => 'required|numeric|max:255',
            'medicine_image'=>'file|mimes:jpg,jpeg,png,jfif|max:2048',


           
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم الدواء مطلوب.',
            'expirationDate.required' => 'تاريخ الصلاحية مطلوب.',
            'description.required' => 'الوصف الخاص بالدواء مطلوب.',
            'quantity.required' => 'الكمية الخاصة بالدواء مطلوبة.',
            'medicine_image.file' => 'يرجى اختيار تنسيق ملف صحيح.',
            'medicine_image.mimes' => 'صورة الدواء يجب ان تكون من نوع: jpg, jpeg, png, jfif.',
            'medicine_image.max' => 'حجم الصورة يجب الا يتجاوز 2 ميغابايت.',

        ];
    }
}

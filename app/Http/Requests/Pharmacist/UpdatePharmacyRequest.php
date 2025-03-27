<?php

namespace App\Http\Requests\Pharmacist;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePharmacyRequest extends FormRequest
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
            'email' => 'required|email|max:255', 
            'Phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'certificateId' => 'required|string|max:255', 
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم الصيدلية مطلوب.',
            'email.required' => 'الايميل الخاص بالصيدلية مطلوب.',
            'Phone.required' => 'رقم الهاتف مطلوب.',
            'address.required' => 'العنوان الخاص بالصيدلية مطلوب.',
            'latitude.required' => 'The latitude field is required.',
            'longitude.required' => 'The longitude field is required.',
            'certificateId.required' => 'معرف الشهادة مطلوب.',
        ];
    }
}

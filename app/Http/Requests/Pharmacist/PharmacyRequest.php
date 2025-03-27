<?php

namespace App\Http\Requests\Pharmacist;

use App\Models\Pharmacist;
use Illuminate\Foundation\Http\FormRequest;

class PharmacyRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:pharmacists,email', 
            'Phone' => 'required|string|max:20|unique:pharmacists,Phone',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'certificateId' => 'required|string|min:10|max:255', 
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم الصيدلية مطلوب.',
            'email.required' => 'الايميل الخاص بالصيدلية مطلوب.',
            'Phone.required' => 'رقم الهاتف مطلوب.',
            'Phone.unique' => 'رقم الهاتف مستخدم بالفعل.',
            'certificateId.unique' => 'معرف الشهادة مستخدم بالفعل.',
            'email.unique' => 'البريد الالكتروني مستخدم بالفعل.',
            'address.required' => 'العنوان الخاص بالصيدلية مطلوب.',
            'latitude.required' => 'The latitude field is required.',
            'longitude.required' => 'The longitude field is required.',
            'certificateId.required' => 'معرف الشهادة مطلوب.',

        ];
    }
}

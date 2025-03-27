<?php

namespace App\Http\Requests\Service;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:services,name,NULL,id,pharmacist_id,' . Auth::user()->id,
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',

           
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'اسم الخدمة مستخدم بالفعل',
            'name.required' => 'يرجى ادخال اسم الخدمة.',
            'description.required' => 'يرجى ادخال الوصف الخاص بالخدمة.',
            'price.required' => 'يرجى ادخال سعر الخدمة.',
            'type.required' => 'يرجى ادخال نوع الخدمة.',
            'price.numeric' =>'يرجى ادخال قيمة رقمية صحيحة',


        ];
    }
}

<?php

namespace App\Http\Requests\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:categories,name,NULL,id,pharmacist_id,' . Auth::user()->id,
            'description' => 'required|string|max:255',
            'category_image'=>'file|mimes:jpg,jpeg,png,jfif|max:2048',
           
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'اسم المجموعة مستخدم مسبقا',
            'name.required' => 'اسم المجموعة مطلوب.',
            'description.required' => 'الوصف الخاص بالمجموعة مطلوب.',
            'category_image.file' => 'يرجى اختيار تنسيق ملف صحيح.',
            'category_image.mimes' => 'الصورة يجب ان تكون من نوع: jpg, jpeg, png, jfif.',
            'category_image.max' => 'حجم الصورة يجب ان يكون اقل من 2 ميغابايت.',
        ];
    }
}

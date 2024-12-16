<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           'id_course' => 'required',
           'id_category' => 'nullable|array',
           'id_category.*' => 'exists:category,id_category',
        ];
    }
}

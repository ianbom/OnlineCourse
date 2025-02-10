<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_course' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:10000',
            'contents' => 'nullable|array',
            'contents.*.name_content' => 'nullable|string|max:255',
            'id_pemateri' => 'nullable',
        ];
    }
}

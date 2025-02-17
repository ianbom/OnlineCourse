<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MateriRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_course' => 'nullable',
            'type' => 'nullable',
            'name_materi' => 'nullable|string',
            'video' => 'nullable',
            'text_book' => 'nullable|file|mimes:pdf',
            'description' => 'nullable|string',
            'is_free' => 'nullable|boolean',
        ];
    }
}

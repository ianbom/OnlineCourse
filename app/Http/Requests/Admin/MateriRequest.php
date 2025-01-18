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
            'id_course' => 'required',
            'type' => 'required',
            'name_materi' => 'required|string',
            'video' => 'nullable|file|mimes:mp4,mkv,webm,avi,mpeg',
            'text_book' => 'nullable|file|mimes:pdf',
            'description' => 'required|string',
            'is_free' => 'nullable|boolean',
        ];
    }
}

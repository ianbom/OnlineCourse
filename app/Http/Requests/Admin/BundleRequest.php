<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BundleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name_bundle' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'description' => 'nullable|string',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string',
            'is_admin' => 'nullable|boolean',
            'email' => 'required|email',
            'password' => 'nullable|string',

        ];
    }
}
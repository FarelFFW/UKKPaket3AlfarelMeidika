<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateadminsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $admin = $this->route('admins') ?? $this->route('admin');

        return [
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('admins', 'username')->ignore($admin),
            ],
            'password' => ['nullable', 'string', 'min:8', 'max:255'],
        ];
    }
}

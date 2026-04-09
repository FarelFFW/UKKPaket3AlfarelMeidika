<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatekategorisRequest extends FormRequest
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
        $kategori = $this->route('kategoris') ?? $this->route('kategori');

        return [
            'ket_kategori' => [
                'required',
                'string',
                'max:50',
                Rule::unique('kategoris', 'ket_kategori')->ignore($kategori),
            ],
        ];
    }
}

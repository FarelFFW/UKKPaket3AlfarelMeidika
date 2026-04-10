<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubmitSiswaAspirasiRequest extends FormRequest
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
        return [
            'nis' => ['required', 'string', 'regex:/^\d{8}$/'],
            'kategori_id' => ['required', 'integer', 'exists:kategoris,id'],
            'lokasi' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nis.required' => 'NIS wajib diisi.',
            'nis.regex' => 'NIS harus terdiri dari 8 angka.',
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori tidak valid.',
            'lokasi.required' => 'Lokasi wajib diisi.',
            'keterangan.required' => 'Detail keluhan wajib diisi.',
        ];
    }
}

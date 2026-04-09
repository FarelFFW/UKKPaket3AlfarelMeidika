<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class Updateinput_aspirasisRequest extends FormRequest
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
            'siswa_id' => ['required', 'integer', 'exists:siswas,nis'],
            'kategori_id' => ['required', 'integer', 'exists:kategoris,id'],
            'lokasi' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string'],
        ];
    }
}

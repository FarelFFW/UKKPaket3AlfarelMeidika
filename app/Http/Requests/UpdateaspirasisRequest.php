<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateaspirasisRequest extends FormRequest
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
            'status' => ['required', 'in:menunggu,proses,selesai'],
            'input_aspirasi_id' => ['required', 'integer', 'exists:input_aspirases,id'],
            'lokasi' => ['required', 'string', 'max:255'],
            'feedback' => ['required', 'string', 'max:255'],
        ];
    }
}

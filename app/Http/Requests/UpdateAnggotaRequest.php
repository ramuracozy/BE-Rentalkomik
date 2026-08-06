<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnggotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['sometimes', 'required', 'string', 'max:255'],
            'alamat' => ['sometimes', 'required', 'string', 'max:255'],
            'no_hp' => ['sometimes', 'required', 'string', 'max:15'],
            'tanggal_daftar' => ['sometimes', 'required', 'date'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'anggota_id' => ['sometimes', 'integer', 'exists:anggota,id'],
            'komik_id' => ['sometimes', 'integer', 'exists:komiks,id'],
            'tanggal_pinjam' => ['sometimes', 'date'],
            'tanggal_kembali' => ['nullable', 'date'],
            'status' => ['sometimes', 'in:dipinjam,dikembalikan,telat'],
        ];
    }
}

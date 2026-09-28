<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status' => 'required|string|in:Aktif,Nonaktif',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama anggota wajib diisi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'nim.required' => 'NIM wajib diisi.',
            'nim.max' => 'NIM maksimal 20 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'status.required' => 'Status anggota wajib dipilih.',
            'status.in' => 'Pilihan status tidak valid.',
        ];
    }
}
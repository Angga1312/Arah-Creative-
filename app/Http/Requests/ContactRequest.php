<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:25',
            'service_id' => 'nullable|exists:services,id',
            'message' => 'required|string|min:10|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal 100 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.max' => 'Email maksimal 150 karakter.',
            'phone.max' => 'Nomor telepon maksimal 25 karakter.',
            'service_id.exists' => 'Layanan yang dipilih tidak valid.',
            'message.required' => 'Pesan konsultasi proyek wajib diisi.',
            'message.min' => 'Pesan minimal terdiri dari 10 karakter.',
            'message.max' => 'Pesan maksimal 2000 karakter.',
        ];
    }
}

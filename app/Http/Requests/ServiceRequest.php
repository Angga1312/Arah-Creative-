<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $serviceId = $this->route('service')?->id ?? $this->route('service');

        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150',
            'slug' => 'nullable|string|max:160|unique:services,slug,' . $serviceId,
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'status' => 'required|in:published,draft',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori layanan wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'name.required' => 'Nama layanan wajib diisi.',
            'name.max' => 'Nama layanan maksimal 150 karakter.',
            'slug.unique' => 'Slug layanan sudah digunakan, silakan buat yang lain.',
            'short_description.required' => 'Deskripsi singkat wajib diisi.',
            'short_description.max' => 'Deskripsi singkat maksimal 255 karakter.',
            'description.required' => 'Deskripsi lengkap layanan wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, webp, svg.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'status.required' => 'Status layanan wajib dipilih.',
            'status.in' => 'Status layanan harus published atau draft.',
        ];
    }
}

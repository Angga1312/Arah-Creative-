<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoryId = $this->route('category')?->id ?? $this->route('category');

        return [
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:120|unique:categories,slug,' . $categoryId,
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori maksimal 100 karakter.',
            'slug.unique' => 'Slug kategori sudah digunakan, silakan buat yang lain.',
            'description.max' => 'Deskripsi maksimal 1000 karakter.',
        ];
    }
}

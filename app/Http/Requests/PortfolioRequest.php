<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $portfolioId = $this->route('portfolio')?->id ?? $this->route('portfolio');

        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:150',
            'slug' => 'nullable|string|max:160|unique:portfolios,slug,' . $portfolioId,
            'client_name' => 'nullable|string|max:100',
            'project_year' => 'required|numeric|digits:4',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:3072',
            'status' => 'required|in:published,draft',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori portfolio wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'title.required' => 'Judul proyek portfolio wajib diisi.',
            'title.max' => 'Judul proyek maksimal 150 karakter.',
            'slug.unique' => 'Slug portfolio sudah digunakan, silakan buat yang lain.',
            'project_year.required' => 'Tahun proyek wajib diisi.',
            'project_year.numeric' => 'Tahun proyek harus berupa angka.',
            'project_year.digits' => 'Tahun proyek harus terdiri dari 4 digit (contoh: 2026).',
            'description.required' => 'Deskripsi proyek wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, webp, svg.',
            'image.max' => 'Ukuran gambar maksimal 3MB.',
            'status.required' => 'Status portfolio wajib dipilih.',
            'status.in' => 'Status portfolio harus published atau draft.',
        ];
    }
}

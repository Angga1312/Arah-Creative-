@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')
@section('page_title', 'Tambah Kategori Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.categories.index') }}" class="text-secondary text-decoration-none small">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Kategori
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="p-4 p-md-5 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
            <h4 class="text-white font-heading fw-bold mb-4">Form Tambah Kategori</h4>

            <form action="{{ route('admin.categories.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label-editorial">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control form-control-editorial @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}" 
                           placeholder="Contoh: Digital Experience"
                           required>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="slug" class="form-label-editorial">Slug URL (Opsional)</label>
                    <input type="text" 
                           class="form-control form-control-editorial @error('slug') is-invalid @enderror" 
                           id="slug" 
                           name="slug" 
                           value="{{ old('slug') }}" 
                           placeholder="Dibuat otomatis jika dikosongkan (contoh: digital-experience)">
                    <small class="text-secondary">Jika dikosongkan, sistem akan mengenerate slug otomatis dari nama kategori.</small>
                    @error('slug')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label-editorial">Deskripsi Kategori</label>
                    <textarea class="form-control form-control-editorial @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4" 
                              placeholder="Deskripsi singkat mengenai cakupan kategori ini...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-3 pt-3 border-top border-editorial">
                    <button type="submit" class="btn-accent px-4 py-2">
                        <i class="bi bi-save me-1"></i> Simpan Kategori
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="btn-outline-editorial px-4 py-2">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

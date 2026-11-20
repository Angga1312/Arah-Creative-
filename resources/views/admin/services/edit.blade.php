@extends('admin.layouts.app')

@section('title', 'Edit Layanan')
@section('page_title', 'Edit Layanan: ' . $service->name)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.services.index') }}" class="text-secondary text-decoration-none small">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Layanan
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="p-4 p-md-5 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
            <h4 class="text-white font-heading fw-bold mb-4">Form Edit Layanan</h4>

            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <!-- Kategori -->
                    <div class="col-md-6">
                        <label for="category_id" class="form-label-editorial">Kategori Layanan <span class="text-danger">*</span></label>
                        <select class="form-select form-select-editorial @error('category_id') is-invalid @enderror" 
                                id="category_id" 
                                name="category_id" 
                                required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $service->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label for="status" class="form-label-editorial">Status Publikasi <span class="text-danger">*</span></label>
                        <select class="form-select form-select-editorial @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="published" {{ old('status', $service->status) == 'published' ? 'selected' : '' }}>Published (Tampil di Website)</option>
                            <option value="draft" {{ old('status', $service->status) == 'draft' ? 'selected' : '' }}>Draft (Sembunyikan Sementara)</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Layanan -->
                    <div class="col-md-6">
                        <label for="name" class="form-label-editorial">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control form-control-editorial @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $service->name) }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug URL -->
                    <div class="col-md-6">
                        <label for="slug" class="form-label-editorial">Slug URL</label>
                        <input type="text" 
                               class="form-control form-control-editorial @error('slug') is-invalid @enderror" 
                               id="slug" 
                               name="slug" 
                               value="{{ old('slug', $service->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="col-12">
                        <label for="short_description" class="form-label-editorial">Deskripsi Singkat (Ringkasan) <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control form-control-editorial @error('short_description') is-invalid @enderror" 
                               id="short_description" 
                               name="short_description" 
                               value="{{ old('short_description', $service->short_description) }}" 
                               required>
                        @error('short_description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi Lengkap -->
                    <div class="col-12">
                        <label for="description" class="form-label-editorial">Deskripsi Lengkap Layanan <span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-editorial @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="6" 
                                  required>{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar Saat Ini & Ganti Gambar -->
                    <div class="col-12">
                        <label class="form-label-editorial">Foto / Ilustrasi Layanan</label>
                        <div class="d-flex flex-wrap gap-4 align-items-center mb-3">
                            <div>
                                <small class="text-secondary d-block mb-1">Gambar Saat Ini:</small>
                                <img id="currentImage" src="{{ $service->image_url }}" alt="{{ $service->name }}" class="rounded-3 border border-editorial" style="width: 140px; height: 90px; object-fit: cover;">
                            </div>
                            <div class="flex-grow-1">
                                <label for="imageInput" class="form-label-editorial small">Pilih file baru jika ingin mengganti:</label>
                                <input type="file" 
                                       class="form-control form-control-editorial @error('image') is-invalid @enderror" 
                                       id="imageInput" 
                                       name="image" 
                                       accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml">
                                <small class="text-secondary d-block mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            </div>
                        </div>

                        <!-- Live Preview Area -->
                        <div class="mt-2 d-none" id="previewContainer">
                            <label class="form-label-editorial small text-accent">Preview Gambar Pengganti:</label>
                            <div class="rounded-3 overflow-hidden border border-editorial" style="max-width: 240px; aspect-ratio: 16/10; background-color: #121419;">
                                <img id="imagePreview" src="#" alt="Preview" class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>

                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-12 pt-3 border-top border-editorial d-flex gap-3">
                        <button type="submit" class="btn-accent px-4 py-2">
                            <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn-outline-editorial px-4 py-2">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('previewContainer').classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

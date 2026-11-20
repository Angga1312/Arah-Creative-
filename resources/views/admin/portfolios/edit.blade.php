@extends('admin.layouts.app')

@section('title', 'Edit Portfolio')
@section('page_title', 'Edit Portfolio: ' . $portfolio->title)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.portfolios.index') }}" class="text-secondary text-decoration-none small">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Portfolio
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="p-4 p-md-5 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
            <h4 class="text-white font-heading fw-bold mb-4">Form Edit Portfolio</h4>

            <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <!-- Kategori -->
                    <div class="col-md-6">
                        <label for="category_id" class="form-label-editorial">Kategori Proyek <span class="text-danger">*</span></label>
                        <select class="form-select form-select-editorial @error('category_id') is-invalid @enderror" 
                                id="category_id" 
                                name="category_id" 
                                required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $portfolio->category_id) == $cat->id ? 'selected' : '' }}>
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
                            <option value="published" {{ old('status', $portfolio->status) == 'published' ? 'selected' : '' }}>Published (Tampil di Website)</option>
                            <option value="draft" {{ old('status', $portfolio->status) == 'draft' ? 'selected' : '' }}>Draft (Sembunyikan Sementara)</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Judul Proyek -->
                    <div class="col-md-6">
                        <label for="title" class="form-label-editorial">Judul Proyek <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control form-control-editorial @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $portfolio->title) }}" 
                               required>
                        @error('title')
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
                               value="{{ old('slug', $portfolio->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Klien -->
                    <div class="col-md-6">
                        <label for="client_name" class="form-label-editorial">Nama Klien / Perusahaan</label>
                        <input type="text" 
                               class="form-control form-control-editorial @error('client_name') is-invalid @enderror" 
                               id="client_name" 
                               name="client_name" 
                               value="{{ old('client_name', $portfolio->client_name) }}">
                        @error('client_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tahun Proyek -->
                    <div class="col-md-6">
                        <label for="project_year" class="form-label-editorial">Tahun Rilis Proyek <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control form-control-editorial @error('project_year') is-invalid @enderror" 
                               id="project_year" 
                               name="project_year" 
                               value="{{ old('project_year', $portfolio->project_year) }}" 
                               min="2000" 
                               max="2099" 
                               required>
                        @error('project_year')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi / Studi Kasus -->
                    <div class="col-12">
                        <label for="description" class="form-label-editorial">Deskripsi &amp; Cerita Studi Kasus <span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-editorial @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="6" 
                                  required>{{ old('description', $portfolio->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar Saat Ini & Ganti Gambar -->
                    <div class="col-12">
                        <label class="form-label-editorial">Foto / Gambar Portfolio</label>
                        <div class="d-flex flex-wrap gap-4 align-items-center mb-3">
                            <div>
                                <small class="text-secondary d-block mb-1">Gambar Saat Ini:</small>
                                <img id="portfolioCurrentImage" src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="rounded-3 border border-editorial" style="width: 140px; height: 90px; object-fit: cover;">
                            </div>
                            <div class="flex-grow-1">
                                <label for="portfolioImageInput" class="form-label-editorial small">Pilih file baru jika ingin mengganti:</label>
                                <input type="file" 
                                       class="form-control form-control-editorial @error('image') is-invalid @enderror" 
                                       id="portfolioImageInput" 
                                       name="image" 
                                       accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml">
                                <small class="text-secondary d-block mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            </div>
                        </div>

                        <!-- Live Preview Area -->
                        <div class="mt-2 d-none" id="portfolioPreviewContainer">
                            <label class="form-label-editorial small text-accent">Preview Gambar Pengganti:</label>
                            <div class="rounded-3 overflow-hidden border border-editorial" style="max-width: 240px; aspect-ratio: 16/10; background-color: #121419;">
                                <img id="portfolioImagePreview" src="#" alt="Preview" class="w-100 h-100 object-fit-cover">
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
                        <a href="{{ route('admin.portfolios.index') }}" class="btn-outline-editorial px-4 py-2">
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
    document.getElementById('portfolioImageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('portfolioImagePreview').src = e.target.result;
                document.getElementById('portfolioPreviewContainer').classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

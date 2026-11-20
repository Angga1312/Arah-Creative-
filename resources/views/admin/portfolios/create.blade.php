@extends('admin.layouts.app')

@section('title', 'Tambah Portfolio Baru')
@section('page_title', 'Tambah Portfolio Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.portfolios.index') }}" class="text-secondary text-decoration-none small">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Portfolio
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="p-4 p-md-5 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
            <h4 class="text-white font-heading fw-bold mb-4">Form Tambah Portfolio</h4>

            <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="row g-4">
                    <!-- Kategori -->
                    <div class="col-md-6">
                        <label for="category_id" class="form-label-editorial">Kategori Proyek <span class="text-danger">*</span></label>
                        <select class="form-select form-select-editorial @error('category_id') is-invalid @enderror" 
                                id="category_id" 
                                name="category_id" 
                                required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
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
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published (Tampil di Website)</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft (Sembunyikan Sementara)</option>
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
                               value="{{ old('title') }}" 
                               placeholder="Contoh: Nordic Roastery Brand System"
                               required>
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug URL -->
                    <div class="col-md-6">
                        <label for="slug" class="form-label-editorial">Slug URL (Opsional)</label>
                        <input type="text" 
                               class="form-control form-control-editorial @error('slug') is-invalid @enderror" 
                               id="slug" 
                               name="slug" 
                               value="{{ old('slug') }}" 
                               placeholder="Dibuat otomatis jika dikosongkan">
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
                               value="{{ old('client_name') }}" 
                               placeholder="Contoh: Nordic Specialty Coffee">
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
                               value="{{ old('project_year', date('Y')) }}" 
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
                                  placeholder="Jelaskan tantangan proyek, pendekatan solusi kreatif, dan hasil yang dicapai..." 
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Upload Foto / Gambar Portfolio -->
                    <div class="col-12">
                        <label for="image" class="form-label-editorial">Upload Gambar Utama Portfolio</label>
                        <input type="file" 
                               class="form-control form-control-editorial @error('image') is-invalid @enderror" 
                               id="portfolioImageInput" 
                               name="image" 
                               accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml">
                        <small class="text-secondary d-block mt-1">Format: JPG, PNG, WEBP, atau SVG. Maksimal ukuran: 3MB.</small>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror

                        <!-- Live Preview Area -->
                        <div class="mt-3 d-none" id="portfolioPreviewContainer">
                            <label class="form-label-editorial small text-accent">Live Preview Gambar:</label>
                            <div class="rounded-3 overflow-hidden border border-editorial" style="max-width: 320px; aspect-ratio: 16/10; background-color: #121419;">
                                <img id="portfolioImagePreview" src="#" alt="Preview" class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-12 pt-3 border-top border-editorial d-flex gap-3">
                        <button type="submit" class="btn-accent px-4 py-2">
                            <i class="bi bi-save me-1"></i> Simpan Portfolio
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

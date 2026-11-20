@extends('layouts.app')

@section('title', 'Hubungi kami — ARAH Creative | Konsultasi proyek')

@section('content')
<!-- CONTACT HEADER -->
<section class="py-5 py-lg-6" style="background: var(--color-bg); border-bottom: 1px solid var(--color-border-subtle);">
    <div class="container py-4">
        <div style="max-width: 800px;">
            <div class="badge-editorial mb-3">
                <i class="bi bi-chat-square-text"></i> Start a Conversation
            </div>
            <h1 class="display-3 fw-bold mb-4" style="color: var(--color-text); line-height: 1.15;">
                Mari berdiskusi &amp; beri <span class="text-accent">arah nyata</span> untuk ide Anda.
            </h1>
            <p class="fs-5 mb-0" style="color: var(--color-text-muted); line-height: 1.8;">
                Apakah Anda merencanakan rebranding korporat, produksi video komersial, atau rancang bangun antarmuka digital, tim kami siap mendengarkan kebutuhan spesifik Anda.
            </p>
        </div>
    </div>
</section>

<!-- CONTACT CONTENT & FORM -->
<section class="py-5 py-lg-6" style="background: var(--color-bg);">
    <div class="container">
        <!-- Flash Message Success -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-4 rounded-3 mb-5 border-0" role="alert" style="background-color: rgba(198, 243, 107, 0.25); border: 1px solid #7cb318 !important; color: #17191F;">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-check-circle-fill fs-3" style="color: #4d7a07;"></i>
                    <div>
                        <h5 class="font-heading fw-bold mb-1" style="color: #17191F;">Pesan berhasil terkirim!</h5>
                        <p class="mb-0" style="font-size: 0.95rem; color: #374151;">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-5">
            <!-- Left: Company Information -->
            <div class="col-lg-5">
                <div class="clean-card p-4 p-md-5 h-100">
                    <span class="badge-outline text-uppercase mb-3 d-inline-block">Informasi perusahaan</span>
                    <h3 class="display-6 fw-bold mb-4" style="color: var(--color-text);">Kantor pusat</h3>

                    <div class="d-flex flex-column gap-4 mb-5">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="p-2 rounded-2" style="background-color: var(--color-bg); color: var(--color-text); font-size: 1.25rem;">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h6 class="font-heading fw-bold mb-1" style="color: var(--color-text);">Alamat studio</h6>
                                <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.6;">
                                    PT Arah Kreasi Digital<br>
                                    Jl. Imam Bonjol No. 21, Langkapura, Kota Bandar Lampung
                                </p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 align-items-start">
                            <div class="p-2 rounded-2" style="background-color: var(--color-bg); color: var(--color-text); font-size: 1.25rem;">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h6 class="font-heading fw-bold mb-1" style="color: var(--color-text);">Email resmi</h6>
                                <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.6;">
                                    hello@arahcreative.com<br>
                                    partnership@arahcreative.com
                                </p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 align-items-start">
                            <div class="p-2 rounded-2" style="background-color: var(--color-bg); color: var(--color-text); font-size: 1.25rem;">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div>
                                <h6 class="font-heading fw-bold mb-1" style="color: var(--color-text);">Telepon &amp; WhatsApp</h6>
                                <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.6;">
                                    +62 821-4567-8900<br>
                                    +62 721-5567-8899 (Kantor)
                                </p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 align-items-start">
                            <div class="p-2 rounded-2" style="background-color: var(--color-bg); color: var(--color-text); font-size: 1.25rem;">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div>
                                <h6 class="font-heading fw-bold mb-1" style="color: var(--color-text);">Jam operasional</h6>
                                <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.6;">
                                    Senin – Jumat: 09:00 – 18:00 WIB<br>
                                    Sabtu &amp; Minggu: Libur (Panggilan Darurat Klien)
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded-3 border-clean" style="background-color: var(--color-bg);">
                        <h6 class="font-heading fw-bold mb-2" style="color: var(--color-text);">Ingin diskusi langsung?</h6>
                        <p class="small mb-0" style="color: var(--color-text-muted);">
                            Silakan buat janji temu konsultasi tatap muka di kantor studio kami di Bandar Lampung atau melalui Google Meet secara virtual.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right: Project Consultation Form -->
            <div class="col-lg-7">
                <div class="clean-card p-4 p-md-5">
                    <span class="badge-editorial mb-3">Project Brief</span>
                    <h3 class="display-6 fw-bold mb-2" style="color: var(--color-text);">Form konsultasi proyek</h3>
                    <p class="mb-4" style="color: var(--color-text-muted);">
                        Isi formulir di bawah ini dengan lengkap. Data Anda aman dan tim strategic kami akan meninjau kebutuhan proyek Anda.
                    </p>

                    <!-- Server-side validation errors summary -->
                    @if ($errors->any())
                        <div class="alert alert-danger p-3 rounded-3 mb-4 border-0" style="background-color: rgba(239, 68, 68, 0.12); border: 1px solid #EF4444 !important; color: #991B1B;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                <strong class="font-heading">Harap periksa kembali isian form Anda:</strong>
                            </div>
                            <ul class="mb-0 ps-3" style="font-size: 0.88rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="row g-4">
                            <!-- Nama Lengkap -->
                            <div class="col-md-6">
                                <label for="name" class="form-label-editorial">
                                    Nama lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-editorial @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       placeholder="Contoh: Budi Pratama"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label-editorial">
                                    Alamat email bisnis <span class="text-danger">*</span>
                                </label>
                                <input type="email" 
                                       class="form-control form-control-editorial @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="nama@perusahaan.com"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nomor Telepon / WA -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label-editorial">
                                    Nomor WhatsApp / telepon
                                </label>
                                <input type="text" 
                                       class="form-control form-control-editorial @error('phone') is-invalid @enderror" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone') }}" 
                                       placeholder="081234567890">
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Layanan yang Diminati -->
                            <div class="col-md-6">
                                <label for="service_id" class="form-label-editorial">
                                    Layanan yang dibutuhkan
                                </label>
                                <select class="form-select form-select-editorial @error('service_id') is-invalid @enderror" 
                                        id="service_id" 
                                        name="service_id">
                                    <option value="">-- Pilih Layanan Utama --</option>
                                    @foreach($services as $srv)
                                        <option value="{{ $srv->id }}" {{ (old('service_id', request('service')) == $srv->id) ? 'selected' : '' }}>
                                            {{ $srv->name }} ({{ $srv->category->name }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pesan / Brief -->
                            <div class="col-12">
                                <label for="message" class="form-label-editorial">
                                    Deskripsi singkat / brief proyek <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control form-control-editorial @error('message') is-invalid @enderror" 
                                          id="message" 
                                          name="message" 
                                          rows="5" 
                                          placeholder="Jelaskan gambaran umum bisnis Anda, tujuan proyek, target waktu, atau ekspektasi hasil..." 
                                          required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 pt-2">
                                <button type="submit" class="btn-accent w-100 py-3 justify-content-center fs-6">
                                    Kirim permintaan konsultasi <i class="bi bi-send-fill ms-2"></i>
                                </button>
                                <p class="text-center small mt-3 mb-0" style="color: var(--color-text-muted);">
                                    Seluruh informasi brief dijaga kerahasiaannya di bawah standar privasi PT Arah Kreasi Digital.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

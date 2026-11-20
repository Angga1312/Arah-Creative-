@extends('layouts.app')

@section('title', 'ARAH Creative — We give ideas a direction | Creative agency & digital services')

@section('content')
<div class="site-wrapper-clean">
    <!-- 2. HERO SECTION (Dua kolom, konten dibatasi max-width) -->
    <section class="py-5 py-lg-6" style="padding-top: 5rem !important; padding-bottom: 5.5rem !important;">
        <div class="container" style="max-width: 1140px;">
            <div class="row align-items-center g-5">
                <!-- Kolom Kiri: Headline besar + satu tombol -->
                <div class="col-lg-6">
                    <p class="text-uppercase fw-bold text-muted-clean mb-3" style="font-size: 0.82rem; letter-spacing: 0.08em;">
                        Creative agency &bull; Bandar Lampung
                    </p>
                    <h1 class="display-4 fw-bold text-dark-main mb-4" style="line-height: 1.15; letter-spacing: -0.03em;">
                        We give ideas a direction
                    </h1>
                    <p class="fs-5 text-muted-clean mb-4" style="line-height: 1.7; font-weight: 400;">
                        ARAH Creative membantu perusahaan dan organisasi mengembangkan identitas visual, produksi media, serta rancang bangun website yang fungsional dan terarah.
                    </p>
                    <div>
                        <a href="{{ route('contact') }}" class="btn-accent">
                            Mulai proyek
                        </a>
                    </div>
                </div>

                <!-- Kolom Kanan: Gambar showcase milik ARAH -->
                <div class="col-lg-6">
                    <div class="rounded-4 overflow-hidden border border-clean" style="background-color: #FFFFFF; aspect-ratio: 16 / 11;">
                        <img src="{{ asset('images/portfolio/nordic-roastery.jpg') }}" alt="Karya branding ARAH Creative" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. KLIEN / MITRA (Barisan nama klien tanpa dekorasi berlebihan) -->
    <section class="py-4 border-top border-bottom border-clean bg-white-clean">
        <div class="container" style="max-width: 1140px;">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-4 py-2">
                <span class="text-uppercase fw-bold text-muted-clean small" style="letter-spacing: 0.06em;">Klien &amp; mitra:</span>
                <span class="fw-semibold text-muted-clean small">Nordic Specialty Coffee</span>
                <span class="fw-semibold text-muted-clean small">Solaris Capital Global</span>
                <span class="fw-semibold text-muted-clean small">Zenith Media Group</span>
                <span class="fw-semibold text-muted-clean small">Yayasan Budaya Bangsa</span>
                <span class="fw-semibold text-muted-clean small">Lumina Healthcare Tech</span>
                <span class="fw-semibold text-muted-clean small">AeroPulse Mobility</span>
            </div>
        </div>
    </section>

    <!-- 3. SECTION FITUR / LAYANAN ARAH (Grid kartu 3 kolom, seragam, tanpa ikon dekoratif) -->
    <section class="py-5 py-lg-6" style="padding-top: 6rem !important; padding-bottom: 6rem !important;">
        <div class="container" style="max-width: 1140px;">
            <div class="mb-5">
                <h2 class="display-6 fw-bold text-dark-main mb-2">Layanan yang kami kerjakan</h2>
                <p class="text-muted-clean mb-0" style="max-width: 600px;">
                    Pendekatan terpadu untuk kebutuhan identitas visual, konten digital, dan antarmuka web.
                </p>
            </div>

            @php
                $servicesList = \App\Models\Service::published()->with('category')->take(6)->get();
            @endphp

            <div class="row g-4">
                @forelse($servicesList as $index => $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="clean-card {{ $index === 0 ? 'featured' : '' }}">
                            <div class="mb-auto">
                                <span class="badge-outline mb-3 d-inline-block">{{ $service->category->name }}</span>
                                <h3 class="h5 fw-bold text-dark-main mb-3">
                                    {{ $service->name }}
                                </h3>
                                <p class="text-muted-clean mb-4" style="font-size: 0.93rem; line-height: 1.6;">
                                    {{ $service->short_description }}
                                </p>
                            </div>
                            <div class="pt-3 border-top border-clean">
                                <a href="{{ route('services.show', $service->slug) }}" class="fw-bold text-dark-main text-decoration-none small d-inline-flex align-items-center gap-2">
                                    Lihat detail <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted-clean">
                        Belum ada layanan yang dipublikasikan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 4. SECTION TENTANG (Maksimal 2 paragraf pendek dan spesifik) -->
    <section class="py-5 py-lg-6 bg-white-clean border-top border-bottom border-clean">
        <div class="container" style="max-width: 900px;">
            <div class="py-2">
                <p class="text-uppercase fw-bold text-muted-clean mb-3" style="font-size: 0.82rem; letter-spacing: 0.08em;">
                    Tentang perusahaan
                </p>
                <h2 class="display-6 fw-bold text-dark-main mb-4">
                    Memberikan arah yang jelas bagi setiap karya visual
                </h2>
                <p class="fs-5 text-dark-main mb-3" style="line-height: 1.75; font-weight: 400;">
                    PT Arah Kreasi Digital (ARAH Creative) adalah creative agency yang berbasis di Bandar Lampung. Kami mengombinasikan strategi bisnis, riset audiens, dan presisi tipografi untuk membangun identitas brand yang tahan lama.
                </p>
                <p class="fs-5 text-muted-clean mb-4" style="line-height: 1.75; font-weight: 400;">
                    Kami bekerja secara langsung bersama para pendiri bisnis dan tim korporat untuk merancang sistem visual, materi editorial, produksi video, dan pengalaman website yang konsisten di semua saluran komunikasi.
                </p>
                <div>
                    <a href="{{ route('about') }}" class="btn-outline-pill">
                        Pelajari profil lengkap
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CTA PENUTUP (Satu kalimat + satu tombol) -->
    <section class="py-5 py-lg-6 text-center" style="padding-top: 6rem !important; padding-bottom: 6rem !important;">
        <div class="container" style="max-width: 760px;">
            <h2 class="display-5 fw-bold text-dark-main mb-3">
                Siap memberi arah baru untuk brand Anda?
            </h2>
            <p class="fs-5 text-muted-clean mb-4">
                Diskusikan kebutuhan proyek identitas visual, kampanye digital, atau website Anda bersama tim kami.
            </p>
            <div>
                <a href="{{ route('contact') }}" class="btn-dark-pill px-4 py-3 fs-6">
                    Mulai proyek Anda
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

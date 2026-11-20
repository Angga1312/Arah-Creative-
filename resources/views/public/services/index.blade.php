@extends('layouts.app')

@section('title', 'Katalog Layanan Kreatif — ARAH Creative')

@section('content')
<!-- SERVICES HEADER -->
<section class="py-5 py-lg-6" style="background: var(--color-bg); border-bottom: 1px solid var(--color-border-subtle);">
    <div class="container py-4">
        <div style="max-width: 800px;">
            <div class="badge-editorial mb-3">
                <i class="bi bi-grid-3x3-gap"></i> Service Directory
            </div>
            <h1 class="display-3 fw-bold mb-4" style="color: var(--color-text); line-height: 1.15;">
                Layanan Kreatif &amp; <span class="text-accent">Digital</span> Terintegrasi.
            </h1>
            <p class="fs-5 mb-0" style="color: var(--color-text-muted); line-height: 1.8;">
                Seluruh spektrum layanan kami dirancang berbasis metodologi riset dan estetika editorial modern untuk menghadirkan diferensiasi yang kuat bagi bisnis Anda.
            </p>
        </div>
    </div>
</section>

<!-- SERVICES CATALOG & FILTER -->
<section class="py-5" style="background: var(--color-bg);">
    <div class="container">
        <!-- Category Filter Pills -->
        <div class="d-flex flex-wrap gap-2 mb-5 pb-3" style="border-bottom: 1px solid var(--color-border-subtle);">
            <a href="{{ route('services.index') }}" class="filter-pill {{ !request('category') ? 'active' : '' }}">
                Semua Layanan
            </a>
            @foreach($categories as $category)
                <a href="{{ route('services.index', ['category' => $category->slug]) }}" 
                   class="filter-pill {{ request('category') == $category->slug ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Services Grid -->
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="clean-card h-100 d-flex flex-column" style="overflow: hidden;">
                        <!-- Card Image -->
                        <div style="aspect-ratio: 16/10; overflow: hidden; border-radius: 12px 12px 0 0;">
                            <img src="{{ $service->image_url }}" alt="{{ $service->name }}"
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;"
                                 onmouseover="this.style.transform='scale(1.04)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <!-- Card Body -->
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span style="font-size: 0.75rem; font-weight: 600; color: var(--color-text-muted); letter-spacing: 0.06em; text-transform: uppercase;">
                                    {{ $service->category->name }}
                                </span>
                                <span style="font-size: 0.72rem; font-weight: 700; color: var(--color-accent); display: flex; align-items: center; gap: 4px;">
                                    <i class="bi bi-circle-fill" style="font-size: 0.4rem;"></i> Active
                                </span>
                            </div>
                            <h4 class="fw-bold mb-2" style="font-family: var(--font-heading); color: var(--color-text); font-size: 1.1rem;">
                                <a href="{{ route('services.show', $service->slug) }}"
                                   style="color: var(--color-text); text-decoration: none; transition: color 0.2s;"
                                   onmouseover="this.style.color='var(--color-accent)'"
                                   onmouseout="this.style.color='var(--color-text)'">
                                    {{ $service->name }}
                                </a>
                            </h4>
                            <p class="mb-4 flex-grow-1" style="font-size: 0.9rem; color: var(--color-text-muted); line-height: 1.65;">
                                {{ $service->short_description }}
                            </p>
                            <div class="pt-3 mt-auto d-flex justify-content-between align-items-center"
                                 style="border-top: 1px solid var(--color-border-subtle);">
                                <a href="{{ route('services.show', $service->slug) }}"
                                   class="d-inline-flex align-items-center gap-2 fw-bold text-decoration-none"
                                   style="font-size: 0.88rem; color: var(--color-accent); font-family: var(--font-heading);">
                                    Lihat Detail <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="{{ route('contact', ['service' => $service->id]) }}"
                                   class="btn-dark-pill py-1 px-3" style="font-size: 0.8rem;">
                                    Inquire
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 py-5 text-center">
                    <div class="p-5 rounded-4" style="background: var(--color-surface); border: 1px dashed var(--color-border-subtle);">
                        <i class="bi bi-folder-x fs-1 mb-3 d-block" style="color: var(--color-text-muted);"></i>
                        <h4 class="fw-bold mb-2" style="color: var(--color-text); font-family: var(--font-heading);">
                            Tidak ada layanan ditemukan
                        </h4>
                        <p class="mb-4" style="color: var(--color-text-muted);">
                            Belum ada layanan yang sesuai dengan filter kategori yang dipilih.
                        </p>
                        <a href="{{ route('services.index') }}" class="btn-dark-pill">Lihat Semua Layanan</a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5 pt-4">
            {{ $services->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection

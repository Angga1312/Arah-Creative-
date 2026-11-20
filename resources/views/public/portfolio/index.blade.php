@extends('layouts.app')

@section('title', 'Portfolio karya — ARAH Creative')

@section('content')
<!-- PORTFOLIO HEADER -->
<section class="py-5 py-lg-6" style="background: var(--color-bg); border-bottom: 1px solid var(--color-border-subtle);">
    <div class="container py-4">
        <div style="max-width: 800px;">
            <div class="badge-editorial mb-3">
                <i class="bi bi-collection"></i> Selected Works
            </div>
            <h1 class="display-3 fw-bold mb-4" style="color: var(--color-text); line-height: 1.15;">
                Karya pilihan &amp; <span class="text-accent">studi kasus.</span>
            </h1>
            <p class="fs-5 mb-0" style="color: var(--color-text-muted); line-height: 1.8;">
                Jelajahi proyek kreatif yang telah kami kerjakan dalam format grid editorial, mencakup identitas merek, desain grafis, produksi video, dan rancang bangun pengalaman digital.
            </p>
        </div>
    </div>
</section>

<!-- PORTFOLIO CATALOG & FILTER -->
<section class="py-5" style="background: var(--color-bg);">
    <div class="container">
        <!-- Category Filter Pills -->
        <div class="d-flex flex-wrap gap-2 mb-5 pb-3" style="border-bottom: 1px solid var(--color-border-subtle);">
            <a href="{{ route('portfolio.index') }}" class="filter-pill {{ !request('category') ? 'active' : '' }}">
                Semua Proyek
            </a>
            @foreach($categories as $category)
                <a href="{{ route('portfolio.index', ['category' => $category->slug]) }}" 
                   class="filter-pill {{ request('category') == $category->slug ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Portfolio Editorial Grid -->
        <div class="row g-4">
            @forelse($portfolios as $portfolio)
                <div class="col-md-6">
                    <div class="clean-card h-100 d-flex flex-column" style="overflow: hidden;">
                        <div style="aspect-ratio: 16 / 10; overflow: hidden; border-radius: 12px 12px 0 0;">
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}"
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;"
                                 onmouseover="this.style.transform='scale(1.04)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="p-4 p-md-5 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge-outline">{{ $portfolio->category->name }}</span>
                                <span class="font-heading fw-bold" style="font-size: 0.88rem; color: var(--color-text-muted);">
                                    Tahun {{ $portfolio->project_year }}
                                </span>
                            </div>
                            <h3 class="font-heading fw-bold mb-2" style="font-size: 1.25rem;">
                                <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                                   style="color: var(--color-text); text-decoration: none; transition: color 0.2s;"
                                   onmouseover="this.style.color='var(--color-accent)'"
                                   onmouseout="this.style.color='var(--color-text)'">
                                    {{ $portfolio->title }}
                                </a>
                            </h3>
                            <p class="font-heading fw-medium mb-3" style="font-size: 0.92rem; color: var(--color-accent);">
                                Klien: {{ $portfolio->client_name ?? 'Confidential Project' }}
                            </p>
                            <p class="mb-4 flex-grow-1" style="font-size: 0.95rem; color: var(--color-text-muted); line-height: 1.7;">
                                {{ Str::limit($portfolio->description, 140) }}
                            </p>
                            <div class="mt-auto pt-3 border-top border-clean">
                                <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="btn-outline-pill py-2 px-3" style="font-size: 0.88rem;">
                                    Lihat detail studi kasus <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 py-5 text-center">
                    <div class="p-5 rounded-4" style="background: var(--color-surface); border: 1px dashed var(--color-border-subtle);">
                        <i class="bi bi-folder-x fs-1 mb-3 d-block" style="color: var(--color-text-muted);"></i>
                        <h4 class="font-heading fw-bold mb-2" style="color: var(--color-text);">Tidak ada portfolio ditemukan</h4>
                        <p class="mb-4" style="color: var(--color-text-muted);">Belum ada karya untuk kategori yang dipilih saat ini.</p>
                        <a href="{{ route('portfolio.index') }}" class="btn-dark-pill">Lihat semua portfolio</a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5 pt-4">
            {{ $portfolios->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection

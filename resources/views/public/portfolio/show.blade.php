@extends('layouts.app')

@section('title', $portfolio->title . ' — Studi kasus ARAH Creative')

@section('content')
<!-- BREADCRUMB & HEADER -->
<section class="py-5" style="background: var(--color-bg); border-bottom: 1px solid var(--color-border-subtle);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb mb-0" style="font-family: var(--font-heading); font-size: 0.88rem;">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted-clean text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}" class="text-muted-clean text-decoration-none">Portfolio</a></li>
                <li class="breadcrumb-item active" style="color: var(--color-text); font-weight: 600;" aria-current="page">{{ $portfolio->title }}</li>
            </ol>
        </nav>

        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge-editorial mb-3">{{ $portfolio->category->name }}</span>
                <h1 class="display-4 fw-bold mb-2" style="color: var(--color-text);">{{ $portfolio->title }}</h1>
                <p class="font-heading fw-medium fs-5 mb-0" style="color: var(--color-accent);">
                    Klien: {{ $portfolio->client_name ?? 'Confidential Client' }} &bull; Tahun: {{ $portfolio->project_year }}
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn-accent px-4 py-3 fs-6">
                    Mulai proyek serupa <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- MAIN PORTFOLIO DETAIL -->
<section class="py-5 py-lg-6" style="background: var(--color-bg);">
    <div class="container">
        <!-- Hero Showcase Image -->
        <div class="rounded-4 overflow-hidden mb-5 border-clean" style="aspect-ratio: 16 / 9; max-height: 600px;">
            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-100 h-100 object-fit-cover">
        </div>

        <div class="row g-5">
            <!-- Left: Narrative Case Study -->
            <div class="col-lg-8">
                <div class="clean-card p-4 p-md-5">
                    <h3 class="display-6 fw-bold mb-4" style="color: var(--color-text);">Tentang proyek</h3>
                    <div class="fs-5" style="color: var(--color-text-muted); line-height: 1.9; white-space: pre-line;">
                        {{ $portfolio->description }}
                    </div>
                </div>
            </div>

            <!-- Right: Project Metadata Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="clean-card p-4 mb-4">
                        <h5 class="font-heading fw-bold mb-4 pb-3 border-bottom border-clean" style="color: var(--color-text);">
                            Spesifikasi proyek
                        </h5>
                        <ul class="list-unstyled d-flex flex-column gap-3 mb-0" style="font-size: 0.95rem;">
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Nama klien:</span>
                                <span class="font-heading fw-bold" style="color: var(--color-text);">{{ $portfolio->client_name ?? '-' }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Kategori:</span>
                                <span class="font-heading fw-bold" style="color: var(--color-text);">{{ $portfolio->category->name }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Tahun rilis:</span>
                                <span class="font-heading fw-bold" style="color: var(--color-text);">{{ $portfolio->project_year }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Status:</span>
                                <span class="text-accent font-heading fw-bold text-capitalize">{{ $portfolio->status }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Eksekusi:</span>
                                <span class="font-heading fw-bold" style="color: var(--color-text);">ARAH Creative Team</span>
                            </li>
                        </ul>
                    </div>

                    <div class="clean-card p-4">
                        <h6 class="font-heading fw-bold mb-2" style="color: var(--color-text);">Ingin hasil serupa?</h6>
                        <p class="small mb-3" style="color: var(--color-text-muted);">
                            Diskusikan brief ide proyek Anda dengan desainer dan strategist kami.
                        </p>
                        <a href="{{ route('contact') }}" class="btn-outline-pill w-100 justify-content-center">
                            Mulai konsultasi <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OTHER WORKS -->
@if($otherPortfolios->count() > 0)
<section class="py-5 bg-white-clean border-top border-clean">
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <span class="badge-outline text-uppercase mb-2 d-inline-block">Eksplorasi lainnya</span>
                <h3 class="display-6 fw-bold mb-0" style="color: var(--color-text);">Karya lain dari ARAH</h3>
            </div>
            <a href="{{ route('portfolio.index') }}" class="btn-outline-pill py-1 px-3" style="font-size: 0.85rem;">
                Lihat semua
            </a>
        </div>

        <div class="row g-4">
            @foreach($otherPortfolios as $other)
                <div class="col-md-4">
                    <div class="clean-card h-100 d-flex flex-column">
                        <div style="aspect-ratio: 16 / 10; overflow: hidden; border-radius: 12px 12px 0 0;">
                            <img src="{{ $other->image_url }}" alt="{{ $other->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="badge-outline mb-2 align-self-start">{{ $other->category->name }}</span>
                            <h5 class="font-heading fw-bold mb-1">
                                <a href="{{ route('portfolio.show', $other->slug) }}" class="text-decoration-none" style="color: var(--color-text);">
                                    {{ $other->title }}
                                </a>
                            </h5>
                            <small class="mb-3" style="color: var(--color-text-muted);">Tahun {{ $other->project_year }}</small>
                            <a href="{{ route('portfolio.show', $other->slug) }}" class="btn-outline-pill py-1 px-3 mt-auto align-self-start" style="font-size: 0.82rem;">
                                Lihat studi kasus <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

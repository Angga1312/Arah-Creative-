@extends('layouts.app')

@section('title', $service->name . ' — Layanan ARAH Creative')

@section('content')
<!-- BREADCRUMB & HEADER -->
<section class="py-5" style="background: var(--color-bg); border-bottom: 1px solid var(--color-border-subtle);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb mb-0" style="font-family: var(--font-heading); font-size: 0.88rem;">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted-clean text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}" class="text-muted-clean text-decoration-none">Services</a></li>
                <li class="breadcrumb-item active" style="color: var(--color-text); font-weight: 600;" aria-current="page">{{ $service->name }}</li>
            </ol>
        </nav>

        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge-editorial mb-3">{{ $service->category->name }}</span>
                <h1 class="display-4 fw-bold mb-3" style="color: var(--color-text);">{{ $service->name }}</h1>
                <p class="fs-5 mb-0" style="color: var(--color-text-muted); line-height: 1.7;">
                    {{ $service->short_description }}
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn-accent px-4 py-3 fs-6">
                    Mulai proyek layanan ini <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- MAIN SERVICE DETAIL -->
<section class="py-5 py-lg-6" style="background: var(--color-bg);">
    <div class="container">
        <div class="row g-5">
            <!-- Left: Service Visual & Content -->
            <div class="col-lg-8">
                <!-- Main Service Image -->
                <div class="rounded-4 overflow-hidden mb-5 border-clean" style="aspect-ratio: 16 / 9;">
                    <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="w-100 h-100 object-fit-cover">
                </div>

                <!-- Detailed Description -->
                <div class="clean-card p-4 p-md-5">
                    <h3 class="display-6 fw-bold mb-4" style="color: var(--color-text);">Deskripsi layanan</h3>
                    <div class="fs-5" style="color: var(--color-text-muted); line-height: 1.85; white-space: pre-line;">
                        {{ $service->description }}
                    </div>
                </div>
            </div>

            <!-- Right: Service Info Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="clean-card p-4 mb-4">
                        <h5 class="font-heading fw-bold mb-4 pb-3 border-bottom border-clean" style="color: var(--color-text);">
                            Informasi layanan
                        </h5>
                        <ul class="list-unstyled d-flex flex-column gap-3 mb-4" style="font-size: 0.95rem;">
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Kategori:</span>
                                <span class="font-heading fw-bold" style="color: var(--color-text);">{{ $service->category->name }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Status:</span>
                                <span class="text-accent font-heading fw-bold text-capitalize">{{ $service->status }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Format output:</span>
                                <span class="font-heading fw-bold" style="color: var(--color-text);">Master assets &amp; guidelines</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted-clean">Konsultasi:</span>
                                <span class="font-heading fw-bold" style="color: var(--color-text);">Tersedia via briefing</span>
                            </li>
                        </ul>

                        <div class="d-grid gap-2">
                            <a href="{{ route('contact', ['service' => $service->id]) }}" class="btn-accent py-3 text-center justify-content-center">
                                Contact us <i class="bi bi-chat-dots"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Help Box -->
                    <div class="clean-card p-4">
                        <h6 class="font-heading fw-bold mb-2" style="color: var(--color-text);">Butuh solusi custom?</h6>
                        <p class="small mb-3" style="color: var(--color-text-muted);">
                            Tim kami siap menyusun penawaran khusus dan scope pekerjaan terarah sesuai kebutuhan korporat Anda.
                        </p>
                        <a href="mailto:hello@arahcreative.com" class="fw-bold small text-decoration-none" style="color: var(--color-text);">
                            <i class="bi bi-envelope me-1"></i> hello@arahcreative.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RELATED SERVICES -->
@if($relatedServices->count() > 0)
<section class="py-5 bg-white-clean border-top border-clean">
    <div class="container py-3">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <span class="badge-outline text-uppercase mb-2 d-inline-block">Kategori terkait</span>
                <h3 class="display-6 fw-bold mb-0" style="color: var(--color-text);">Layanan serupa</h3>
            </div>
            <a href="{{ route('services.index') }}" class="btn-outline-pill py-1 px-3" style="font-size: 0.85rem;">
                Lihat semua
            </a>
        </div>

        <div class="row g-4">
            @foreach($relatedServices as $related)
                <div class="col-md-4">
                    <div class="clean-card h-100 d-flex flex-column">
                        <div style="aspect-ratio: 16/10; overflow: hidden; border-radius: 12px 12px 0 0;">
                            <img src="{{ $related->image_url }}" alt="{{ $related->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="badge-outline mb-2 align-self-start">{{ $related->category->name }}</span>
                            <h5 class="font-heading fw-bold mb-2" style="color: var(--color-text);">
                                <a href="{{ route('services.show', $related->slug) }}" class="text-decoration-none" style="color: var(--color-text);">
                                    {{ $related->name }}
                                </a>
                            </h5>
                            <p class="small flex-grow-1 mb-3" style="color: var(--color-text-muted);">
                                {{ Str::limit($related->short_description, 85) }}
                            </p>
                            <a href="{{ route('services.show', $related->slug) }}" class="fw-bold text-decoration-none small mt-auto" style="color: var(--color-accent);">
                                Detail layanan <i class="bi bi-arrow-right"></i>
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

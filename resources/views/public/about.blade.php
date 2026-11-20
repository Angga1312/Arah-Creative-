@extends('layouts.app')

@section('title', 'About us — ARAH Creative | Profil & filosofi perusahaan')

@section('content')
<!-- ABOUT HERO -->
<section class="py-5 py-lg-6" style="background: var(--color-bg); border-bottom: 1px solid var(--color-border-subtle);">
    <div class="container py-4">
        <div style="max-width: 800px;">
            <div class="badge-editorial mb-3">
                <i class="bi bi-info-circle"></i> Profil perusahaan
            </div>
            <h1 class="display-3 fw-bold mb-4" style="color: var(--color-text); line-height: 1.15;">
                Membangun identitas visual yang <span class="text-accent">membimbing</span> dan berdampak.
            </h1>
            <p class="fs-5 mb-0" style="color: var(--color-text-muted); line-height: 1.8;">
                PT Arah Kreasi Digital (ARAH Creative) adalah agensi kreatif terpadu yang berfokus pada strategi brand, desain grafis editorial, produksi video, dan rancang bangun pengalaman digital korporat.
            </p>
        </div>
    </div>
</section>

<!-- PHILOSOPHY & STORY -->
<section class="py-5 py-lg-6" style="background: var(--color-bg);">
    <div class="container py-3">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <span class="badge-outline text-uppercase mb-3 d-inline-block">Filosofi kami</span>
                <h2 class="display-5 fw-bold mb-4" style="color: var(--color-text);">
                    Mengapa bernama <span class="text-accent">"ARAH"?</span>
                </h2>
                <p class="fs-5 mb-4" style="color: var(--color-text); line-height: 1.8;">
                    Sebuah ide tanpa kompas hanyalah eksperimen yang tersebar tanpa fokus. Di ARAH Creative, kami percaya bahwa setiap kreasi harus memiliki haluan yang kokoh.
                </p>
                <p class="mb-4" style="color: var(--color-text-muted); line-height: 1.8;">
                    Nama <strong>ARAH</strong> mencerminkan peran kami sebagai navigator visual bagi klien. Kami tidak sekadar mendesain atau memproduksi aset untuk terlihat indah di layar; kami memberikan panduan terukur agar setiap elemen visual berbicara satu bahasa dengan tujuan bisnis Anda.
                </p>
                <div class="p-4 rounded-3 clean-card" style="border-left: 4px solid var(--color-accent) !important;">
                    <p class="font-heading fw-bold fs-5 mb-1" style="color: var(--color-text);">
                        "We Give Ideas a Direction."
                    </p>
                    <small style="color: var(--color-text-muted);">Tagline resmi &amp; komitmen fundamental PT Arah Kreasi Digital.</small>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="clean-card p-4">
                    <div class="rounded-3 mb-4 overflow-hidden" style="aspect-ratio: 16 / 10;">
                        <img src="{{ asset('images/portfolio/nordic-roastery.jpg') }}" alt="Studio ARAH Creative" class="w-100 h-100 object-fit-cover">
                    </div>
                    <div class="row g-3 text-center">
                        <div class="col-4 border-end border-clean">
                            <h4 class="text-accent font-heading fw-bold mb-0">2024</h4>
                            <small style="color: var(--color-text-muted);">Didirikan</small>
                        </div>
                        <div class="col-4 border-end border-clean">
                            <h4 class="font-heading fw-bold mb-0" style="color: var(--color-text);">120+</h4>
                            <small style="color: var(--color-text-muted);">Karya tercipta</small>
                        </div>
                        <div class="col-4">
                            <h4 class="font-heading fw-bold mb-0" style="color: var(--color-text);">100%</h4>
                            <small style="color: var(--color-text-muted);">Karya orisinal</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISION & MISSION -->
<section class="py-5 py-lg-6 bg-white-clean border-top border-bottom border-clean">
    <div class="container py-3">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="clean-card p-5 h-100">
                    <span class="badge-editorial mb-3"><i class="bi bi-eye"></i> Visi kami</span>
                    <h3 class="display-6 fw-bold mb-3" style="color: var(--color-text);">Visi perusahaan</h3>
                    <p class="fs-5 mb-0" style="color: var(--color-text-muted); line-height: 1.8;">
                        Menjadi agensi kreatif dan strategi visual terdepan di Indonesia yang diakui atas keunggulan estetika editorial, ketajaman riset strategis, serta kontribusi nyata dalam mendongkrak reputasi brand klien di kancah nasional maupun internasional.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="clean-card p-5 h-100">
                    <span class="badge-editorial mb-3"><i class="bi bi-rocket-takeoff"></i> Misi kami</span>
                    <h3 class="display-6 fw-bold mb-3" style="color: var(--color-text);">Misi perusahaan</h3>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0" style="color: var(--color-text-muted); font-size: 1.05rem;">
                        <li class="d-flex gap-3 align-items-start">
                            <i class="bi bi-check2-circle text-accent fs-5 mt-1"></i>
                            <span>Menyediakan solusi komunikasi visual yang strategis, relevan, dan terukur bagi korporasi dan wirausaha modern.</span>
                        </li>
                        <li class="d-flex gap-3 align-items-start">
                            <i class="bi bi-check2-circle text-accent fs-5 mt-1"></i>
                            <span>Menerapkan standar desain minimalis dan editorial bertaraf internasional di setiap disiplin karya.</span>
                        </li>
                        <li class="d-flex gap-3 align-items-start">
                            <i class="bi bi-check2-circle text-accent fs-5 mt-1"></i>
                            <span>Membangun kolaborasi jangka panjang yang berakar pada integritas, ketepatan waktu, dan transparansi proses.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CORE VALUES -->
<section class="py-5 py-lg-6" style="background: var(--color-bg);">
    <div class="container py-3">
        <div class="text-center mb-5" style="max-width: 650px; margin: 0 auto;">
            <span class="badge-outline text-uppercase mb-3 d-inline-block">Prinsip fundamental</span>
            <h2 class="display-5 fw-bold mb-3" style="color: var(--color-text);">Nilai-nilai perusahaan</h2>
            <p style="color: var(--color-text-muted);">
                Karakter inti yang menjadi pedoman tim ARAH Creative dalam setiap proyek yang dipercayakan.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="clean-card p-4 h-100">
                    <div class="text-accent fs-2 mb-3"><i class="bi bi-crosshair"></i></div>
                    <h4 class="font-heading fw-bold mb-2" style="color: var(--color-text);">Strategic &amp; Purposeful</h4>
                    <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.65;">
                        Setiap garis, warna, dan kata memiliki alasan logis yang mendukung target pertumbuhan brand.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="clean-card p-4 h-100">
                    <div class="text-accent fs-2 mb-3"><i class="bi bi-bounding-box-circles"></i></div>
                    <h4 class="font-heading fw-bold mb-2" style="color: var(--color-text);">Editorial Minimalism</h4>
                    <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.65;">
                        Kekuatan penyampaian pesan terletak pada kejelasan, proporsi whitespace yang lega, dan keanggunan tipografi.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="clean-card p-4 h-100">
                    <div class="text-accent fs-2 mb-3"><i class="bi bi-stars"></i></div>
                    <h4 class="font-heading fw-bold mb-2" style="color: var(--color-text);">Uncompromising Craft</h4>
                    <p class="mb-0" style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.65;">
                        Perhatian tanpa kompromi terhadap detail mikro, presisi grid tata letak, hingga kualitas keluaran produksi akhir.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5" style="background: var(--color-bg); border-top: 1px solid var(--color-border-subtle);">
    <div class="container text-center py-4">
        <h3 class="display-6 fw-bold mb-3" style="color: var(--color-text);">Ingin berkolaborasi bersama kami?</h3>
        <p class="mb-4" style="color: var(--color-text-muted);">Diskusikan kebutuhan visual korporat Anda bersama tim kami.</p>
        <a href="{{ route('contact') }}" class="btn-accent px-4 py-3">
            Mulai diskusi proyek <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</section>
@endsection

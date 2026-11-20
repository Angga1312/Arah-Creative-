<footer class="footer-arah">
    <div class="container">
        <div class="row g-5 mb-5">
            <!-- Brand Column -->
            <div class="col-lg-5">
                <a href="{{ route('home') }}" class="d-inline-block mb-3">
                    <img src="{{ asset('images/logo-dark.svg') }}" alt="ARAH Creative" height="34">
                </a>
                <p class="text-accent font-heading fw-bold fs-5 mb-3">"We Give Ideas a Direction."</p>
                <p class="text-muted-clean pe-lg-5 mb-4" style="font-size: 0.95rem; line-height: 1.7;">
                    PT Arah Kreasi Digital merupakan creative agency &amp; digital services yang mengombinasikan strategi bisnis dengan estetika visual editorial modern untuk membantu perusahaan berkembang di lanskap digital.
                </p>
                <div class="d-flex gap-3">
                    <a href="https://instagram.com" target="_blank" class="btn-outline-pill p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="btn-outline-pill p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://behance.net" target="_blank" class="btn-outline-pill p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-behance"></i>
                    </a>
                    <a href="https://dribbble.com" target="_blank" class="btn-outline-pill p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-dribbble"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-6 col-lg-2">
                <h6 class="text-dark-main font-heading fw-bold mb-4">Navigasi</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0" style="font-size: 0.92rem;">
                    <li><a href="{{ route('home') }}" class="text-muted-clean text-decoration-none">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-muted-clean text-decoration-none">About us</a></li>
                    <li><a href="{{ route('services.index') }}" class="text-muted-clean text-decoration-none">Services</a></li>
                    <li><a href="{{ route('portfolio.index') }}" class="text-muted-clean text-decoration-none">Portfolio</a></li>
                    <li><a href="{{ route('contact') }}" class="text-muted-clean text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Layanan Kami -->
            <div class="col-6 col-lg-2">
                <h6 class="text-dark-main font-heading fw-bold mb-4">Layanan</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0" style="font-size: 0.92rem;">
                    <li><a href="{{ route('services.index', ['category' => 'brand-strategy-visual-identity']) }}" class="text-muted-clean text-decoration-none">Brand Strategy</a></li>
                    <li><a href="{{ route('services.index', ['category' => 'corporate-publication-editorial-design']) }}" class="text-muted-clean text-decoration-none">Graphic Design</a></li>
                    <li><a href="{{ route('services.index', ['category' => 'cinematic-commercial-video-motion']) }}" class="text-muted-clean text-decoration-none">Video &amp; Motion</a></li>
                    <li><a href="{{ route('services.index', ['category' => 'strategic-social-media-campaign']) }}" class="text-muted-clean text-decoration-none">Digital Content</a></li>
                    <li><a href="{{ route('services.index', ['category' => 'digital-experience-uiux-design']) }}" class="text-muted-clean text-decoration-none">Digital Experience</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3">
                <h6 class="text-dark-main font-heading fw-bold mb-4">Hubungi kami</h6>
                <div class="d-flex flex-column gap-3" style="font-size: 0.92rem; color: var(--color-text-muted);">
                    <div class="d-flex gap-2 align-items-start">
                        <i class="bi bi-geo-alt text-dark-main mt-1"></i>
                        <span>Jl. Imam Bonjol No. 21, Langkapura, Kota Bandar Lampung</span>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <i class="bi bi-envelope text-dark-main"></i>
                        <span>hello@arahcreative.com</span>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <i class="bi bi-telephone text-dark-main"></i>
                        <span>+62 821-4567-8900</span>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <i class="bi bi-clock text-dark-main"></i>
                        <span>Senin – Jumat (09:00 – 18:00 WIB)</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 border-top border-clean d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 text-muted-clean" style="font-size: 0.85rem;">
            <div>
                &copy; {{ date('Y') }} PT Arah Kreasi Digital (ARAH Creative). Seluruh hak cipta dilindungi.
            </div>
            <div>
                Tugas project UTS Pemrograman Web 2 • Laravel 13
            </div>
        </div>
    </div>
</footer>

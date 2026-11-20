<nav class="navbar navbar-expand-lg navbar-light navbar-arah sticky-top">
    <div class="container" style="max-width: 1200px;">
        <!-- Logo ARAH. -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-dark.svg') }}" alt="ARAH Creative" height="28" class="d-inline-block">
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarArah" aria-controls="navbarArah" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-2 text-dark"></i>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarArah">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 py-2 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('portfolio.*') ? 'active' : '' }}" href="{{ route('portfolio.index') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>

            <!-- Header Actions -->
            <div class="d-flex align-items-center gap-3 pt-2 pt-lg-0">
                <a href="{{ route('admin.login') }}" class="btn-outline-pill py-2 px-3 small" title="Akses Admin Dashboard">
                    Admin
                </a>
                <a href="{{ route('contact') }}" class="btn-accent py-2 px-4">
                    Start a project
                </a>
            </div>
        </div>
    </div>
</nav>

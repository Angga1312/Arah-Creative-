<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — ARAH Creative</title>



    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- ARAH Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/arah-theme.css') }}">

    @stack('styles')
</head>
<body style="background-color: #0E1014; color: #FFFFFF;">
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <aside class="admin-sidebar d-flex flex-column flex-shrink-0">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.svg') }}" alt="ARAH Admin" height="26">
                </a>
                <span class="badge-outline text-uppercase mt-2 d-inline-block" style="font-size: 0.65rem; letter-spacing: 1px;">
                    Control Panel
                </span>
            </div>

            <!-- Navigation Links -->
            <ul class="nav nav-pills flex-column mb-auto py-3 list-unstyled">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-folder2"></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <i class="bi bi-grid-3x3-gap"></i> Layanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.portfolios.index') }}" class="nav-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
                        <i class="bi bi-collection"></i> Portfolio
                    </a>
                </li>

                <li class="my-3 border-top border-editorial"></li>

                <li class="nav-item">
                    <a href="{{ route('home') }}" target="_blank" class="nav-link text-white-50">
                        <i class="bi bi-box-arrow-up-right"></i> Lihat Website Publik
                    </a>
                </li>
            </ul>

            <!-- Admin Profile & Logout -->
            <div class="p-3 border-top border-editorial" style="background-color: #111317;">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-accent text-dark d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem;">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <h6 class="font-heading fw-bold mb-0 text-white text-truncate" style="font-size: 0.85rem;">
                                {{ Auth::user()->name ?? 'Admin ARAH' }}
                            </h6>
                            <small class="text-secondary d-block text-truncate" style="font-size: 0.75rem;">
                                {{ Auth::user()->email ?? 'admin@arahcreative.com' }}
                            </small>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger w-100 mt-2 py-1" style="font-size: 0.8rem;">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Body -->
        <div class="d-flex flex-column flex-grow-1 overflow-auto">
            <!-- Topbar -->
            <header class="admin-topbar d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <h5 class="font-heading fw-bold mb-0 text-white">@yield('page_title', 'Dashboard')</h5>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge-editorial">
                        <i class="bi bi-check-circle-fill"></i> Laravel 13 &bull; MySQL
                    </span>
                    <a href="{{ route('home') }}" target="_blank" class="btn-outline-editorial py-1 px-3" style="font-size: 0.82rem;">
                        <i class="bi bi-globe me-1"></i> Live Site
                    </a>
                </div>
            </header>

            <!-- Content Area -->
            <main class="admin-content">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show p-3 rounded-3 mb-4 border-0" role="alert" style="background-color: rgba(198, 243, 107, 0.15); border: 1px solid #C6F36B !important; color: #FFFFFF;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-accent fs-5"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show p-3 rounded-3 mb-4 border-0" role="alert" style="background-color: rgba(239, 68, 68, 0.15); border: 1px solid #EF4444 !important; color: #FCA5A5;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-octagon-fill fs-5"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>

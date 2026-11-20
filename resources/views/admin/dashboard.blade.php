@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page_title', 'Ringkasan Dashboard')

@section('content')
<!-- STATS ROW -->
<div class="row g-4 mb-5">
    <!-- Total Categories -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex justify-content-between align-items-center">
            <div>
                <span class="text-secondary small text-uppercase font-heading fw-bold" style="letter-spacing: 0.5px;">Total Kategori</span>
                <h2 class="display-6 font-heading fw-bold text-white mb-0 mt-1">{{ $totalCategories }}</h2>
                <small class="text-secondary" style="font-size: 0.8rem;">Kategori aktif</small>
            </div>
            <div class="stat-icon" style="background-color: rgba(198, 243, 107, 0.12); color: var(--color-accent);">
                <i class="bi bi-folder2"></i>
            </div>
        </div>
    </div>

    <!-- Total Services -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex justify-content-between align-items-center">
            <div>
                <span class="text-secondary small text-uppercase font-heading fw-bold" style="letter-spacing: 0.5px;">Total Layanan</span>
                <h2 class="display-6 font-heading fw-bold text-accent mb-0 mt-1">{{ $totalServices }}</h2>
                <small class="text-secondary" style="font-size: 0.8rem;">Layanan terpublikasi</small>
            </div>
            <div class="stat-icon" style="background-color: rgba(198, 243, 107, 0.12); color: var(--color-accent);">
                <i class="bi bi-grid-3x3-gap"></i>
            </div>
        </div>
    </div>

    <!-- Total Portfolios -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex justify-content-between align-items-center">
            <div>
                <span class="text-secondary small text-uppercase font-heading fw-bold" style="letter-spacing: 0.5px;">Total Portfolio</span>
                <h2 class="display-6 font-heading fw-bold text-white mb-0 mt-1">{{ $totalPortfolios }}</h2>
                <small class="text-secondary" style="font-size: 0.8rem;">Karya kreatif terpajang</small>
            </div>
            <div class="stat-icon" style="background-color: rgba(59, 130, 246, 0.12); color: #60A5FA;">
                <i class="bi bi-collection"></i>
            </div>
        </div>
    </div>

    <!-- Total Messages -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex justify-content-between align-items-center">
            <div>
                <span class="text-secondary small text-uppercase font-heading fw-bold" style="letter-spacing: 0.5px;">Konsultasi Masuk</span>
                <h2 class="display-6 font-heading fw-bold text-white mb-0 mt-1">{{ $totalContacts }}</h2>
                <small class="text-secondary" style="font-size: 0.8rem;">Pesan kontak klien</small>
            </div>
            <div class="stat-icon" style="background-color: rgba(245, 158, 11, 0.12); color: #FBBF24;">
                <i class="bi bi-chat-left-dots"></i>
            </div>
        </div>
    </div>
</div>

<!-- DATA SUMMARY TABLES -->
<div class="row g-4">
    <!-- Recent Services -->
    <div class="col-lg-6">
        <div class="p-4 rounded-4 h-100" style="background-color: #17191F; border: 1px solid #282E3D;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="text-white font-heading fw-bold mb-0">Layanan Terbaru</h5>
                <a href="{{ route('admin.services.index') }}" class="btn-outline-editorial py-1 px-3" style="font-size: 0.8rem;">
                    Kelola Layanan
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0" style="background: transparent;">
                    <thead>
                        <tr class="text-secondary" style="font-family: var(--font-heading); font-size: 0.8rem; border-color: #282E3D;">
                            <th>LAYANAN</th>
                            <th>KATEGORI</th>
                            <th>STATUS</th>
                            <th class="text-end">AKSI</th>
                        </tr>
                    </thead>
                    <tbody style="border-color: #242A36;">
                        @forelse($recentServices as $srv)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $srv->image_url }}" alt="" class="rounded" style="width: 38px; height: 38px; object-fit: cover;">
                                        <span class="text-white fw-medium font-heading" style="font-size: 0.9rem;">
                                            {{ Str::limit($srv->name, 26) }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge-outline" style="font-size: 0.72rem;">{{ $srv->category->name }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $srv->status == 'published' ? 'success' : 'secondary' }}" style="font-size: 0.72rem;">
                                        {{ $srv->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.services.edit', $srv->id) }}" class="btn btn-sm btn-outline-light py-0 px-2" style="font-size: 0.78rem;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-3">Belum ada layanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Portfolios -->
    <div class="col-lg-6">
        <div class="p-4 rounded-4 h-100" style="background-color: #17191F; border: 1px solid #282E3D;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="text-white font-heading fw-bold mb-0">Portfolio Terbaru</h5>
                <a href="{{ route('admin.portfolios.index') }}" class="btn-outline-editorial py-1 px-3" style="font-size: 0.8rem;">
                    Kelola Portfolio
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0" style="background: transparent;">
                    <thead>
                        <tr class="text-secondary" style="font-family: var(--font-heading); font-size: 0.8rem; border-color: #282E3D;">
                            <th>PROYEK</th>
                            <th>KLIEN</th>
                            <th>TAHUN</th>
                            <th class="text-end">AKSI</th>
                        </tr>
                    </thead>
                    <tbody style="border-color: #242A36;">
                        @forelse($recentPortfolios as $port)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $port->image_url }}" alt="" class="rounded" style="width: 38px; height: 38px; object-fit: cover;">
                                        <span class="text-white fw-medium font-heading" style="font-size: 0.9rem;">
                                            {{ Str::limit($port->title, 24) }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-secondary small">{{ Str::limit($port->client_name ?? '-', 20) }}</span>
                                </td>
                                <td>
                                    <span class="text-accent font-heading fw-bold small">{{ $port->project_year }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.portfolios.edit', $port->id) }}" class="btn btn-sm btn-outline-light py-0 px-2" style="font-size: 0.78rem;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-3">Belum ada portfolio</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Inquiries (Full Width) -->
    <div class="col-12">
        <div class="p-4 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="text-white font-heading fw-bold mb-1">Pesan Konsultasi Masuk dari Website</h5>
                    <small class="text-secondary">Pesan yang dikirimkan klien melalui form kontak publik</small>
                </div>
                <span class="badge-editorial">{{ $totalContacts }} Pesan</span>
            </div>

            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0" style="background: transparent;">
                    <thead>
                        <tr class="text-secondary" style="font-family: var(--font-heading); font-size: 0.8rem; border-color: #282E3D;">
                            <th>NAMA KLIEN</th>
                            <th>EMAIL</th>
                            <th>TELEPON</th>
                            <th>LAYANAN DIMINATI</th>
                            <th>PESAN BRIEF</th>
                            <th>TANGGAL</th>
                        </tr>
                    </thead>
                    <tbody style="border-color: #242A36;">
                        @forelse($recentContacts as $contact)
                            <tr>
                                <td class="text-white fw-bold font-heading">{{ $contact->name }}</td>
                                <td><a href="mailto:{{ $contact->email }}" class="text-accent">{{ $contact->email }}</a></td>
                                <td class="text-secondary">{{ $contact->phone ?? '-' }}</td>
                                <td>
                                    @if($contact->service)
                                        <span class="badge-outline">{{ $contact->service->name }}</span>
                                    @else
                                        <span class="text-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-secondary small" title="{{ $contact->message }}">
                                        {{ Str::limit($contact->message, 45) }}
                                    </span>
                                </td>
                                <td class="text-secondary small">{{ $contact->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary py-4">
                                    <i class="bi bi-inbox text-secondary fs-3 d-block mb-2"></i>
                                    Belum ada pesan konsultasi yang masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

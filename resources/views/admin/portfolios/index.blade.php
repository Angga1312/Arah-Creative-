@extends('admin.layouts.app')

@section('title', 'Manajemen Portfolio')
@section('page_title', 'Daftar Karya & Studi Kasus Portfolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-secondary mb-0">Kelola portofolio karya kreatif, nama klien, tahun rilis, dan status publikasi.</p>
    </div>
    <a href="{{ route('admin.portfolios.create') }}" class="btn-accent py-2 px-3">
        <i class="bi bi-plus-lg"></i> Tambah Portfolio Baru
    </a>
</div>

<div class="p-4 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0" style="background: transparent;">
            <thead>
                <tr class="text-secondary" style="font-family: var(--font-heading); font-size: 0.82rem; border-color: #282E3D;">
                    <th style="width: 50px;">NO</th>
                    <th style="width: 70px;">THUMBNAIL</th>
                    <th>JUDUL PROYEK</th>
                    <th>KLIEN</th>
                    <th>KATEGORI</th>
                    <th>TAHUN</th>
                    <th>STATUS</th>
                    <th class="text-end" style="width: 140px;">AKSI</th>
                </tr>
            </thead>
            <tbody style="border-color: #242A36;">
                @forelse($portfolios as $index => $portfolio)
                    <tr>
                        <td class="text-secondary">{{ $portfolios->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="rounded-2 border border-editorial" style="width: 54px; height: 42px; object-fit: cover;">
                        </td>
                        <td>
                            <span class="text-white fw-bold font-heading fs-6 d-block">{{ $portfolio->title }}</span>
                            <code class="text-accent small">{{ $portfolio->slug }}</code>
                        </td>
                        <td>
                            <span class="text-white small">{{ $portfolio->client_name ?? '-' }}</span>
                        </td>
                        <td>
                            <span class="badge-outline">{{ $portfolio->category->name }}</span>
                        </td>
                        <td>
                            <span class="text-accent font-heading fw-bold small">{{ $portfolio->project_year }}</span>
                        </td>
                        <td>
                            @if($portfolio->status == 'published')
                                <span class="badge bg-success" style="font-size: 0.75rem;">Published</span>
                            @else
                                <span class="badge bg-secondary" style="font-size: 0.75rem;">Draft</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('portfolio.show', $portfolio->slug) }}" target="_blank" class="btn btn-sm btn-outline-info py-1 px-2" title="Lihat di Website Publik">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-outline-warning py-1 px-2" title="Edit Portfolio">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus portfolio \'{{ $portfolio->title }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2" title="Hapus Portfolio">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-secondary py-5">
                            Belum ada karya portfolio yang tersimpan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-editorial">
        <small class="text-secondary">Menampilkan {{ $portfolios->count() }} dari {{ $portfolios->total() }} portfolio</small>
        {{ $portfolios->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

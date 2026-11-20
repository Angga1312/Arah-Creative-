@extends('admin.layouts.app')

@section('title', 'Manajemen Layanan')
@section('page_title', 'Daftar Layanan Kreatif & Digital')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-secondary mb-0">Kelola katalog layanan lengkap beserta deskripsi, gambar, dan status publikasi.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn-accent py-2 px-3">
        <i class="bi bi-plus-lg"></i> Tambah Layanan Baru
    </a>
</div>

<div class="p-4 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0" style="background: transparent;">
            <thead>
                <tr class="text-secondary" style="font-family: var(--font-heading); font-size: 0.82rem; border-color: #282E3D;">
                    <th style="width: 50px;">NO</th>
                    <th style="width: 70px;">GAMBAR</th>
                    <th>NAMA LAYANAN</th>
                    <th>KATEGORI</th>
                    <th>RINGKASAN</th>
                    <th>STATUS</th>
                    <th class="text-end" style="width: 140px;">AKSI</th>
                </tr>
            </thead>
            <tbody style="border-color: #242A36;">
                @forelse($services as $index => $service)
                    <tr>
                        <td class="text-secondary">{{ $services->firstItem() + $index }}</td>
                        <td>
                            <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="rounded-2 border border-editorial" style="width: 54px; height: 42px; object-fit: cover;">
                        </td>
                        <td>
                            <span class="text-white fw-bold font-heading fs-6 d-block">{{ $service->name }}</span>
                            <code class="text-accent small">{{ $service->slug }}</code>
                        </td>
                        <td>
                            <span class="badge-outline">{{ $service->category->name }}</span>
                        </td>
                        <td>
                            <span class="text-secondary small">{{ Str::limit($service->short_description, 55) }}</span>
                        </td>
                        <td>
                            @if($service->status == 'published')
                                <span class="badge bg-success" style="font-size: 0.75rem;">Published</span>
                            @else
                                <span class="badge bg-secondary" style="font-size: 0.75rem;">Draft</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="btn btn-sm btn-outline-info py-1 px-2" title="Lihat Halaman Publik">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-warning py-1 px-2" title="Edit Layanan">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan \'{{ $service->name }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2" title="Hapus Layanan">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-secondary py-5">
                            Belum ada layanan yang tersimpan di database.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-editorial">
        <small class="text-secondary">Menampilkan {{ $services->count() }} dari {{ $services->total() }} layanan</small>
        {{ $services->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

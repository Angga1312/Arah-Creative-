@extends('admin.layouts.app')

@section('title', 'Manajemen Kategori')
@section('page_title', 'Daftar Kategori Layanan & Portfolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-secondary mb-0">Kelola kategori utama untuk pengelompokan layanan dan portfolio.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn-accent py-2 px-3">
        <i class="bi bi-plus-lg"></i> Tambah Kategori
    </a>
</div>

<div class="p-4 rounded-4" style="background-color: #17191F; border: 1px solid #282E3D;">
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0" style="background: transparent;">
            <thead>
                <tr class="text-secondary" style="font-family: var(--font-heading); font-size: 0.82rem; border-color: #282E3D;">
                    <th style="width: 50px;">NO</th>
                    <th>NAMA KATEGORI</th>
                    <th>SLUG</th>
                    <th>DESKRIPSI</th>
                    <th class="text-center">LAYANAN</th>
                    <th class="text-center">PORTFOLIO</th>
                    <th class="text-end" style="width: 140px;">AKSI</th>
                </tr>
            </thead>
            <tbody style="border-color: #242A36;">
                @forelse($categories as $index => $category)
                    <tr>
                        <td class="text-secondary">{{ $categories->firstItem() + $index }}</td>
                        <td>
                            <span class="text-white fw-bold font-heading fs-6">{{ $category->name }}</span>
                        </td>
                        <td>
                            <code class="text-accent" style="font-size: 0.85rem;">{{ $category->slug }}</code>
                        </td>
                        <td>
                            <span class="text-secondary small">{{ Str::limit($category->description, 50) ?? '-' }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge-outline">{{ $category->services_count }} Layanan</span>
                        </td>
                        <td class="text-center">
                            <span class="badge-outline">{{ $category->portfolios_count }} Proyek</span>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning py-1 px-2" title="Edit Kategori">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('PERINGATAN: Menghapus kategori ini juga akan menghapus seluruh data layanan dan portfolio yang terhubung. Apakah Anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2" title="Hapus Kategori">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-secondary py-5">
                            Belum ada kategori yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-editorial">
        <small class="text-secondary">Menampilkan {{ $categories->count() }} dari {{ $categories->total() }} kategori</small>
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

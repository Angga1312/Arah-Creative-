<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.services.create', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan baru berhasil dipublikasikan.');
    }

    public function edit(Service $service)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan "' . $service->name . '" berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $name = $service->name;

        // Bersihkan gambar di storage
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan "' . $name . '" berhasil dihapus.');
    }
}

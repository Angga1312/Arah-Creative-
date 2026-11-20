<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->paginate(10);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.portfolios.create', compact('categories'));
    }

    public function store(PortfolioRequest $request)
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio baru berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio "' . $portfolio->title . '" berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $title = $portfolio->title;

        // Bersihkan gambar di storage
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio "' . $title . '" berhasil dihapus.');
    }
}

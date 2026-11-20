<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Katalog Layanan Publik
     */
    public function index(Request $request)
    {
        $categories = Category::has('services')->get();

        $query = Service::published()->with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $services = $query->latest()->paginate(6)->withQueryString();

        return view('public.services.index', compact('services', 'categories'));
    }

    /**
     * Detail Layanan
     */
    public function show($slug)
    {
        $service = Service::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedServices = Service::published()
            ->with('category')
            ->where('category_id', $service->category_id)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();

        return view('public.services.show', compact('service', 'relatedServices'));
    }
}

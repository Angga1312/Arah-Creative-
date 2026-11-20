<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Homepage ARAH Creative
     */
    public function home()
    {
        $featuredServices = Service::published()
            ->with('category')
            ->latest()
            ->take(4)
            ->get();

        $selectedPortfolios = Portfolio::published()
            ->with('category')
            ->latest()
            ->take(4)
            ->get();

        $categories = Category::withCount(['services', 'portfolios'])->get();

        return view('public.home', compact('featuredServices', 'selectedPortfolios', 'categories'));
    }

    /**
     * About Us ARAH Creative
     */
    public function about()
    {
        $categories = Category::withCount(['services', 'portfolios'])->get();

        return view('public.about', compact('categories'));
    }
}

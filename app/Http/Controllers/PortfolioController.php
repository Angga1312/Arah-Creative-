<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Katalog Portfolio Publik
     */
    public function index(Request $request)
    {
        $categories = Category::has('portfolios')->get();

        $query = Portfolio::published()->with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $portfolios = $query->latest()->paginate(6)->withQueryString();

        return view('public.portfolio.index', compact('portfolios', 'categories'));
    }

    /**
     * Detail Portfolio
     */
    public function show($slug)
    {
        $portfolio = Portfolio::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $otherPortfolios = Portfolio::published()
            ->with('category')
            ->where('id', '!=', $portfolio->id)
            ->latest()
            ->take(3)
            ->get();

        return view('public.portfolio.show', compact('portfolio', 'otherPortfolios'));
    }
}

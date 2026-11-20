<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalServices = Service::count();
        $totalPortfolios = Portfolio::count();
        $totalContacts = Contact::count();

        $recentServices = Service::with('category')->latest()->take(5)->get();
        $recentPortfolios = Portfolio::with('category')->latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalCategories',
            'totalServices',
            'totalPortfolios',
            'totalContacts',
            'recentServices',
            'recentPortfolios',
            'recentContacts'
        ));
    }
}

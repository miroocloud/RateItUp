<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPlaces = Place::published()
            ->with(['category', 'reviews'])
            ->withCount('reviews')
            ->orderByDesc('reviews_count')
            ->limit(6)
            ->get();

        $totalPlaces = Place::published()->count();
        $totalUsers = \App\Models\User::count();
        $totalReviews = \App\Models\Review::published()->count();

        return view('home', compact(
            'featuredPlaces',
            'totalPlaces',
            'totalUsers',
            'totalReviews'
        ));
    }
}

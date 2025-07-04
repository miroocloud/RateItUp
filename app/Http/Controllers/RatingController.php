<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewRating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function store(Request $request, Review $review)
    {
        $request->validate([
            'is_helpful' => 'required|boolean'
        ]);

        ReviewRating::updateOrCreate(
            [
                'user_id' => \Illuminate\Support\Facades\Auth::id(),
                'review_id' => $review->id
            ],
            [
                'is_helpful' => $request->is_helpful
            ]
        );

        $message = $request->is_helpful ? 'Review ditandai sebagai membantu!' : 'Rating berhasil diperbarui!';

        return back()->with('success', $message);
    }
}

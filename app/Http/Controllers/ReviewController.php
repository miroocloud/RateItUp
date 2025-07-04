<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request, Place $place)
    {
        Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10'
        ], [
            'rating.required' => 'Rating wajib diberikan.',
            'rating.min' => 'Rating minimal 1 bintang.',
            'rating.max' => 'Rating maksimal 5 bintang.',
            'comment.required' => 'Komentar wajib diisi.',
            'comment.min' => 'Komentar minimal 10 karakter.'
        ])->validate();

        $userId = \Illuminate\Support\Facades\Auth::id();

        $existingReview = Review::where('user_id', $userId)
            ->where('place_id', $place->id)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'Anda sudah memberikan review untuk tempat ini.');
        }

        Review::create([
            'user_id' => $userId,
            'place_id' => $place->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => 'published'
        ]);

        return back()->with('success', 'Review berhasil ditambahkan!');
    }
}

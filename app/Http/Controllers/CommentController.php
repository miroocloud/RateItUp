<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Review $review)
    {
        Validator::make($request->all(), [
            'comment' => 'required|string|min:5|max:1000'
        ], [
            'comment.required' => 'Komentar wajib diisi.',
            'comment.min' => 'Komentar minimal 5 karakter.',
            'comment.max' => 'Komentar maksimal 1000 karakter.'
        ])->validate();

        ReviewComment::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'review_id' => $review->id,
            'comment' => $request->comment,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan! Menunggu persetujuan moderator.');
    }
}

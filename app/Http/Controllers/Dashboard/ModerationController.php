<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ReviewComment;
use App\Models\Place;
use Illuminate\Http\Request;

class ModerationController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $pendingComments = ReviewComment::pending()
            ->with(['user', 'review.place'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $pendingPlaces = Place::where('status', 'pending')
            ->with(['user', 'category'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.moderation', compact('pendingComments', 'pendingPlaces'));
    }

    public function approveComment(ReviewComment $comment)
    {
        $comment->update([
            'status' => 'approved',
            'moderated_at' => now(),
            'moderated_by' => \Illuminate\Support\Facades\Auth::id()
        ]);

        return back()->with('success', 'Komentar berhasil disetujui.');
    }

    public function rejectComment(ReviewComment $comment)
    {
        $comment->update([
            'status' => 'rejected',
            'moderated_at' => now(),
            'moderated_by' => \Illuminate\Support\Facades\Auth::id()
        ]);

        return back()->with('success', 'Komentar berhasil ditolak.');
    }

    public function approvePlace(Place $place)
    {
        $place->update(['status' => 'published']);
        return back()->with('success', 'Tempat kuliner berhasil disetujui.');
    }

    public function rejectPlace(Place $place)
    {
        $place->update(['status' => 'rejected']);
        return back()->with('success', 'Tempat kuliner berhasil ditolak.');
    }
}

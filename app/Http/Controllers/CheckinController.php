<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Checkin;
use App\Http\Requests\StoreCheckinRequest;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function store(Request $request, Place $place)
    {
        Checkin::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'place_id' => $place->id,
            'note' => $request->note,
            'checked_in_at' => now()
        ]);

        return back()->with('success', 'Check-in berhasil! Terima kasih telah berkunjung.');
    }

    public function index()
    {
        $checkins = auth()->user()->checkins()
            ->with(['place.category'])
            ->orderBy('checked_in_at', 'desc')
            ->paginate(10);

        return view('checkins.index', compact('checkins'));
    }
}

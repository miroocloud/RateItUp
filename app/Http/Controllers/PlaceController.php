<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
    /**
     * Display a listing of the places.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $cities = Place::published()->distinct()->pluck('city');

        $places = Place::published()
            ->with(['category', 'reviews'])
            ->search($request->search)
            ->byCategory($request->category)
            ->byCity($request->city)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('places.index', compact('places', 'categories', 'cities'));
    }

    /**
     * Display the specified place.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\View\View
     */
    public function show(Place $place)
    {
        $place->load(['category', 'reviews.user', 'user']);

        $similarPlaces = Place::published()
            ->where('category_id', $place->category_id)
            ->where('id', '!=', $place->id)
            ->with(['reviews'])
            ->limit(3)
            ->get();

        return view('places.show', compact('place', 'similarPlaces'));
    }

    /**
     * Show the form for creating a new place.
     */
    public function create()
    {
        $categories = Category::all();
        return view('places.create', compact('categories'));
    }

    /**
     * Store a newly created place in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'opening_hours' => 'nullable|string|max:100',
            'price_range' => 'nullable|string|max:100',
            'specialties' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'Nama tempat wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'city.required' => 'Kota wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar maksimal 2MB.'
        ])->validate();

        $data = $request->all();
        $data['user_id'] = \Illuminate\Support\Facades\Auth::id();
        $data['status'] = 'pending';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = now()->format('YmdHis') . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('places', strtolower($filename), 'public');
            $data['image'] = $path;
        }

        Place::create($data);

        return redirect()->route('places.index')
            ->with('success', 'Tempat kuliner berhasil ditambahkan! Menunggu persetujuan admin.');
    }
}

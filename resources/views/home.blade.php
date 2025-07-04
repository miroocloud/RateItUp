@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-orange-50 to-white">
        <!-- Hero Section -->
        <section class="container mx-auto px-4 py-24 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight leading-tight font-montserrat">
                    Cari Rasa, Temukan Cerita
                    <span class="text-orange-500 block">Kuliner Terbaik Ada di Sini</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed tracking-wide">
                    Teman setia penjelajah rasa Indonesia. Jelajahi, rekomendasikan, dan bagikan momen kuliner-mu di sini.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('places.index') }}"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                        Jelajahi Tempat Kuliner
                    </a>
                    <a href="{{ route('places.create') }}"
                        class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-8 py-3 rounded-lg font-medium transition-colors">
                        Tambah Rekomendasi
                    </a>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="container mx-auto px-4 py-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 id="count-places" class="text-3xl font-bold text-gray-900 mb-2">0</h3>
                    <p class="text-gray-600">Tempat Kuliner</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <h3 id="count-users" class="text-3xl font-bold text-gray-900 mb-2">0</h3>
                    <p class="text-gray-600">Pengguna Aktif</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 id="count-reviews" class="text-3xl font-bold text-gray-900 mb-2">0</h3>
                    <p class="text-gray-600">Review Terpercaya</p>
                </div>
            </div>
        </section>

        <!-- Featured Places -->
        <section class="container mx-auto px-4 py-24 mt-12">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Tempat Kuliner Terpopuler</h3>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan tempat-tempat kuliner terbaik yang direkomendasikan oleh komunitas pecinta kuliner Indonesia
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach ($featuredPlaces as $place)
                    <div class="bg-white rounded-lg shadow-sm border overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-video bg-gray-200 relative">
                            @if ($place->image)
                                <img src="{{ Storage::url($place->image) }}" alt="{{ $place->name }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-orange-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-3 left-3 bg-orange-500 text-white px-2 py-1 rounded text-sm">
                                {{ $place->category->name }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">{{ $place->name }}</h4>
                            <p class="text-gray-600 flex items-center gap-1 mb-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $place->city }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400 fill-yellow-400" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                    <span class="font-semibold">{{ number_format($place->average_rating, 1) }}</span>
                                    <span class="text-gray-500">({{ $place->total_reviews }} review)</span>
                                </div>
                                <a href="{{ route('places.show', $place) }}"
                                    class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('places.index') }}"
                    class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-8 py-3 rounded-lg font-medium transition-colors">
                    Lihat Semua Tempat
                </a>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-orange-500 text-white py-32 shadow-lg mt-24">
            <div class="container mx-auto px-4 text-center">
                <h3 class="text-3xl font-bold mb-4">Bagikan Cerita Kuliner Versimu</h3>
                <p class="text-xl mb-8 opacity-90">
                    Bantu orang lain <span class="font-semibold">"Cari Rasa"</span> lewat cerita dan rekomendasi tempat
                    makan favoritmu.
                </p>
                <a href="#places.create"
                    class="bg-white text-orange-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium transition-colors">
                    Tambahkan Tempat Favoritmu
                </a>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new CountUp('count-places', 300).start();
            new CountUp('count-users', 1000).start();
            new CountUp('count-reviews', 566).start();
        });
    </script>
@endpush

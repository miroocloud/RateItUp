@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-orange-50 to-white">
        <!-- Hero Section -->
        <section class="container mx-auto px-4 py-16 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight leading-tight font-montserrat">
                    Cari Rasa, Temukan Cerita
                    <span class="text-orange-500 block">Kuliner Terbaik Ada di Sini</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed tracking-wide">
                    Teman setia penjelajah rasa Indonesia. Jelajahi, rekomendasikan, dan bagikan momen kuliner-mu di sini.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#places.index"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                        Jelajahi Tempat Kuliner
                    </a>
                    <a href="#places.create"
                        class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-8 py-3 rounded-lg font-medium transition-colors">
                        Tambah Rekomendasi
                    </a>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="container mx-auto px-4 py-12">
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
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">300+</h3>
                    <p class="text-gray-600">Tempat Kuliner</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">1000+</h3>
                    <p class="text-gray-600">Pengguna Aktif</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">566+</h3>
                    <p class="text-gray-600">Review Terpercaya</p>
                </div>
            </div>
        </section>

        <!-- Featured Places -->
        <section class="container mx-auto px-4 py-16">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Tempat Kuliner Terpopuler</h3>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Temukan tempat-tempat kuliner terbaik yang direkomendasikan oleh komunitas pecinta kuliner Indonesia
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                {{--  --}}
            </div>

            <div class="text-center mt-8">
                <a href="#places.index"
                    class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-8 py-3 rounded-lg font-medium transition-colors">
                    Lihat Semua Tempat
                </a>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-orange-500 text-white py-32 shadow-lg">
            <div class="container mx-auto px-4 text-center">
                <h3 class="text-3xl font-bold mb-4">Mulai Berbagi Pengalaman Kuliner Anda</h3>
                <p class="text-xl mb-8 opacity-90">
                    Bergabunglah dengan komunitas pecinta kuliner dan bantu orang lain menemukan tempat makan terbaik
                </p>
                <a href="#places.create"
                    class="bg-white text-orange-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium transition-colors">
                    Tambah Tempat Kuliner
                </a>
            </div>
        </section>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Riwayat Check-in Saya</h1>
                <p class="text-gray-600">Lihat semua tempat kuliner yang pernah Anda kunjungi</p>
            </div>

            @if ($checkins->count() > 0)
                <!-- Check-ins List -->
                <div class="space-y-6">
                    @foreach ($checkins as $checkin)
                        <div class="bg-white rounded-lg shadow-sm border p-6">
                            <div class="flex items-start gap-4">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                    @if ($checkin->place->image)
                                        <img src="{{ Storage::url($checkin->place->image) }}"
                                            alt="{{ $checkin->place->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                                <a href="{{ route('places.show', $checkin->place) }}"
                                                    class="hover:text-orange-600 transition-colors">
                                                    {{ $checkin->place->name }}
                                                </a>
                                            </h3>
                                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-2">
                                                <div class="flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    {{ $checkin->place->city }}
                                                </div>
                                                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs">
                                                    {{ $checkin->place->category->name }}
                                                </span>
                                            </div>
                                            @if ($checkin->note)
                                                <p class="text-gray-700 mb-2">{{ $checkin->note }}</p>
                                            @endif
                                        </div>

                                        <div class="text-right">
                                            <div class="text-sm text-gray-500 mb-1">
                                                {{ $checkin->checked_in_at->format('d M Y') }}
                                            </div>
                                            <div class="text-xs text-gray-400">
                                                {{ $checkin->checked_in_at->format('H:i') }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 mt-4">
                                        <div class="flex items-center gap-1 text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-yellow-400 fill-yellow-400" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                            </svg>
                                            <span>{{ number_format($checkin->place->average_rating, 1) }}</span>
                                            <span>({{ $checkin->place->total_reviews }} review)</span>
                                        </div>

                                        <a href="{{ route('places.show', $checkin->place) }}"
                                            class="text-orange-600 hover:text-orange-700 text-sm font-medium">
                                            Lihat Detail →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($checkins->hasPages())
                    <div class="mt-8 flex justify-center">
                        {{ $checkins->links() }}
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Check-in</h3>
                    <p class="text-gray-500 mb-6">Anda belum pernah check-in ke tempat kuliner manapun</p>
                    <a href="{{ route('places.index') }}"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                        Jelajahi Tempat Kuliner
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

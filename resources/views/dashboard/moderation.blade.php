@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Panel Moderasi</h1>
                <p class="text-gray-600">Kelola komentar dan tempat kuliner yang memerlukan persetujuan</p>
            </div>

            <!-- Pending Comments -->
            <div class="bg-white rounded-lg shadow-sm border mb-8">
                <div class="p-6 border-b">
                    <h2 class="text-xl font-semibold text-gray-900">Komentar Menunggu Persetujuan
                        ({{ $pendingComments->total() }})</h2>
                </div>
                <div class="divide-y">
                    @forelse($pendingComments as $comment)
                        <div class="p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="font-medium text-gray-900">{{ $comment->user->name }}</span>
                                        <span
                                            class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-700 mb-2">{{ $comment->comment }}</p>
                                    <p class="text-sm text-gray-500">
                                        Review di: <a href="{{ route('places.show', $comment->review->place) }}"
                                            class="text-orange-600 hover:text-orange-700">{{ $comment->review->place->name }}</a>
                                    </p>
                                </div>
                                <div class="flex gap-2">
                                    <form action="{{ route('admin.comments.approve', $comment) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                            Setujui
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.comments.reject', $comment) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            Tidak ada komentar yang menunggu persetujuan.
                        </div>
                    @endforelse
                </div>
                @if ($pendingComments->hasPages())
                    <div class="p-6 border-t">
                        {{ $pendingComments->links() }}
                    </div>
                @endif
            </div>

            <!-- Pending Places -->
            <div class="bg-white rounded-lg shadow-sm border">
                <div class="p-6 border-b">
                    <h2 class="text-xl font-semibold text-gray-900">Tempat Kuliner Menunggu Persetujuan
                        ({{ $pendingPlaces->total() }})</h2>
                </div>
                <div class="divide-y">
                    @forelse($pendingPlaces as $place)
                        <div class="p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h3 class="font-semibold text-gray-900">{{ $place->name }}</h3>
                                        <span
                                            class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs">{{ $place->category->name }}</span>
                                    </div>
                                    <p class="text-gray-600 mb-2">{{ Str::limit($place->description, 150) }}</p>
                                    <div class="flex items-center gap-4 text-sm text-gray-500">
                                        <span>📍 {{ $place->city }}</span>
                                        <span>👤 {{ $place->user->name }}</span>
                                        <span>📅 {{ $place->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('places.show', $place) }}"
                                        class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-3 py-1 rounded text-sm font-medium transition-colors">
                                        Lihat
                                    </a>
                                    <form action="{{ route('admin.places.approve', $place) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                            Setujui
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.places.reject', $place) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-medium transition-colors">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            Tidak ada tempat kuliner yang menunggu persetujuan.
                        </div>
                    @endforelse
                </div>
                @if ($pendingPlaces->hasPages())
                    <div class="p-6 border-t">
                        {{ $pendingPlaces->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

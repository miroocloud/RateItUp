@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Place Header -->
            <div class="bg-white rounded-lg shadow-sm border overflow-hidden mb-8">
                <div class="aspect-video bg-gray-200 relative">
                    @if ($place->image)
                        <img src="{{ Storage::url($place->image) }}" alt="{{ $place->name }}"
                            class="w-full h-full object-cover">
                    @else
                        <div
                            class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                            <svg class="w-24 h-24 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <span class="absolute top-4 left-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                        {{ $place->category->name }}
                    </span>
                </div>

                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $place->name }}</h1>
                            <div class="flex items-center gap-4 text-gray-600 mb-4">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $place->city }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400 fill-yellow-400" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                    </svg>
                                    <span class="font-semibold">{{ number_format($place->average_rating, 1) }}</span>
                                    <span>({{ $place->total_reviews }} review)</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                                    </svg>
                                    <span>{{ $place->total_checkins }} check-in</span>
                                </div>
                            </div>
                        </div>

                        @auth
                            <div class="flex gap-2">
                                <form action="{{ route('checkins.store', $place) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        Check-in
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Deskripsi</h3>
                            <p class="text-gray-600 mb-4">{{ $place->description }}</p>

                            @if ($place->specialties)
                                <h3 class="font-semibold text-gray-900 mb-2">Spesialisasi</h3>
                                <p class="text-gray-600 mb-4">{{ $place->specialties }}</p>
                            @endif
                        </div>

                        <div>
                            @if ($place->address)
                                <div class="mb-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Alamat</h3>
                                    <p class="text-gray-600">{{ $place->address }}</p>
                                </div>
                            @endif

                            @if ($place->phone)
                                <div class="mb-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Telepon</h3>
                                    <p class="text-gray-600">{{ $place->phone }}</p>
                                </div>
                            @endif

                            @if ($place->opening_hours)
                                <div class="mb-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Jam Buka</h3>
                                    <p class="text-gray-600">{{ $place->opening_hours }}</p>
                                </div>
                            @endif

                            @if ($place->price_range)
                                <div class="mb-4">
                                    <h3 class="font-semibold text-gray-900 mb-2">Kisaran Harga</h3>
                                    <p class="text-gray-600">{{ $place->price_range }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Check-ins -->
            @if ($place->recent_checkins->count() > 0)
                <div class="bg-white rounded-lg shadow-sm border p-6 mb-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Check-in Terbaru</h3>
                    <div class="space-y-3">
                        @foreach ($place->recent_checkins as $checkin)
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                    <span
                                        class="text-orange-600 font-medium text-sm">{{ substr($checkin->user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-sm">
                                        <span class="font-medium">{{ $checkin->user->name }}</span>
                                        check-in {{ $checkin->checked_in_at->diffForHumans() }}
                                    </p>
                                    @if ($checkin->note)
                                        <p class="text-xs text-gray-600">{{ $checkin->note }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Reviews Section -->
            <div class="bg-white rounded-lg shadow-sm border p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-900">Review ({{ $place->total_reviews }})</h3>
                    @auth
                        @if (!$place->reviews()->where('user_id', auth()->id())->exists())
                            <button onclick="toggleReviewForm()"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Tulis Review
                            </button>
                        @endif
                    @endauth
                </div>

                <!-- Review Form -->
                @auth
                    @if (!$place->reviews()->where('user_id', auth()->id())->exists())
                        <div id="reviewForm" class="hidden mb-8 p-4 bg-gray-50 rounded-lg">
                            <form action="{{ route('reviews.store', $place) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                    <div class="flex gap-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <button type="button" onclick="setRating({{ $i }})"
                                                class="rating-star text-2xl text-gray-300 hover:text-yellow-400 transition-colors">
                                                ★
                                            </button>
                                        @endfor
                                    </div>
                                    <input type="hidden" name="rating" id="rating" required>
                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Komentar</label>
                                    <textarea name="comment" id="comment" rows="4" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                        placeholder="Bagikan pengalaman Anda..."></textarea>
                                </div>
                                <div class="flex gap-2">
                                    <button type="submit"
                                        class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                        Kirim Review
                                    </button>
                                    <button type="button" onclick="toggleReviewForm()"
                                        class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg font-medium transition-colors">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                @endauth

                <!-- Reviews List -->
                <div class="space-y-6">
                    @forelse($place->reviews()->published()->with(['user', 'approvedComments.user', 'ratings'])->latest()->get() as $review)
                        <div class="border-b border-gray-200 pb-6 last:border-b-0">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                    <span
                                        class="text-orange-600 font-medium">{{ substr($review->user->name, 0, 1) }}</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h4 class="font-medium text-gray-900">{{ $review->user->name }}</h4>
                                        <div class="flex items-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300' }}"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <span
                                            class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-700 mb-4">{{ $review->comment }}</p>

                                    <!-- Review Actions -->
                                    @auth
                                        <div class="flex items-center gap-4 mb-4">
                                            <form action="{{ route('review-ratings.store', $review) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <input type="hidden" name="is_helpful" value="1">
                                                <button type="submit"
                                                    class="text-sm text-gray-600 hover:text-green-600 transition-colors">
                                                    👍 Membantu ({{ $review->helpful_ratings_count }})
                                                </button>
                                            </form>
                                            <form action="{{ route('review-ratings.store', $review) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <input type="hidden" name="is_helpful" value="0">
                                                <button type="submit"
                                                    class="text-sm text-gray-600 hover:text-red-600 transition-colors">
                                                    👎 Tidak Membantu ({{ $review->not_helpful_ratings_count }})
                                                </button>
                                            </form>
                                            <button onclick="toggleCommentForm({{ $review->id }})"
                                                class="text-sm text-gray-600 hover:text-orange-600 transition-colors">
                                                💬 Komentar
                                            </button>
                                        </div>
                                    @endauth

                                    <!-- Comment Form -->
                                    @auth
                                        <div id="commentForm{{ $review->id }}" class="hidden mb-4">
                                            <form action="{{ route('review-comments.store', $review) }}" method="POST">
                                                @csrf
                                                <div class="flex gap-2">
                                                    <input type="text" name="comment" placeholder="Tulis komentar..."
                                                        required
                                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                                    <button type="submit"
                                                        class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endauth

                                    <!-- Comments -->
                                    @if ($review->approvedComments->count() > 0)
                                        <div class="space-y-3">
                                            @foreach ($review->approvedComments as $comment)
                                                <div class="bg-gray-50 rounded-lg p-3">
                                                    <div class="flex items-center gap-2 mb-1">
                                                        <span
                                                            class="font-medium text-sm text-gray-900">{{ $comment->user->name }}</span>
                                                        <span
                                                            class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="text-sm text-gray-700">{{ $comment->comment }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada review untuk tempat ini.</p>
                            @auth
                                <button onclick="toggleReviewForm()"
                                    class="mt-2 text-orange-600 hover:text-orange-700 font-medium">
                                    Jadilah yang pertama menulis review!
                                </button>
                            @endauth
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleReviewForm() {
            const form = document.getElementById('reviewForm');
            form.classList.toggle('hidden');
        }

        function setRating(rating) {
            document.getElementById('rating').value = rating;
            const stars = document.querySelectorAll('.rating-star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                }
            });
        }

        function toggleCommentForm(reviewId) {
            const form = document.getElementById('commentForm' + reviewId);
            form.classList.toggle('hidden');
        }
    </script>
@endsection

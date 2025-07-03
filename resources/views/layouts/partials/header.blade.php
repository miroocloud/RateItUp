<header class="border-b bg-white sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="#" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white fill-white" viewBox="0 0 24 24">
                    <path
                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                </svg>
            </div>
            <h1 class="text-xl font-bold text-orange-900">Rate it Up</h1>
        </a>

        <nav class="hidden md:flex items-center gap-6">
            <a href="#places.index" class="text-gray-600 hover:text-orange-600 transition-colors">
                Jelajahi
            </a>
            @auth
                <a href="#places.create" class="text-gray-600 hover:text-orange-600 transition-colors">
                    Tambah Tempat
                </a>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Halo, {{ auth()->user()->name }}</span>
                    <form method="POST" action="#logout" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-orange-600 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="#login"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Masuk
                </a>
            @endauth
        </nav>
    </div>
</header>

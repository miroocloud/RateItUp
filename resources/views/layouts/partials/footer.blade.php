<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center hidden">
                        {{-- Logo --}}
                    </div>
                    <h4 class="text-xl font-bold">Rate it Up</h4>
                </div>
                <p class="text-gray-400">Teman setia penjelajah rasa Indonesia. Jelajahi, rekomendasikan, dan bagikan
                    momen kuliner-mu di sini.</p>
            </div>
            <div>
                <h5 class="font-semibold mb-4">Jelajahi</h5>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('places.index') }}" class="hover:text-white transition-colors">Semua
                            Tempat</a></li>
                    <li><a href="{{ route('places.index', ['category' => 1]) }}"
                            class="hover:text-white transition-colors">Traditional</a></li>
                    <li><a href="{{ route('places.index', ['category' => 2]) }}"
                            class="hover:text-white transition-colors">Street Food</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-semibold mb-4">Komunitas</h5>
                <ul class="space-y-2 text-gray-400">
                    @auth
                        <li><a href="{{ route('places.create') }}" class="hover:text-white transition-colors">Tambah
                                Tempat</a></li>
                        <li><a href="{{ route('checkins.index') }}" class="hover:text-white transition-colors">Check-in
                                Saya</a></li>
                    @else
                        <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Daftar</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Masuk</a></li>
                    @endauth
                </ul>
            </div>
            <div>
                <h5 class="font-semibold mb-4">Bantuan</h5>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Kontak</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Rate it Up.</p>
        </div>
    </div>
</footer>

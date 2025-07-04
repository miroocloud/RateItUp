<header class="border-b bg-white sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center hidden">
                {{-- Logo --}}
            </div>
            <h1 class="text-xl font-bold text-orange-700">Rate it Up</h1>
        </a>

        <nav class="hidden md:flex items-center gap-6">
            <a href="{{ route('places.index') }}"
                class="text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('places.*') ? 'text-orange-600 font-medium' : '' }}">
                Jelajahi
            </a>
            @auth
                <a href="{{ route('places.create') }}"
                    class="text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('places.create') ? 'text-orange-600 font-medium' : '' }}">
                    Tambah Tempat
                </a>
                <a href="{{ route('checkins.index') }}"
                    class="text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('checkins.*') ? 'text-orange-600 font-medium' : '' }}">
                    Check-in Saya
                </a>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.moderation.index') }}"
                        class="text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('admin.*') ? 'text-orange-600 font-medium' : '' }}">
                        Moderasi
                    </a>
                @endif
                <div class="relative group">
                    <button class="flex items-center gap-2 text-gray-600 hover:text-orange-600 transition-colors">
                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                            <span
                                class="text-orange-600 font-medium text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="py-2">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-orange-600 transition-colors">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Daftar
                </a>
            @endauth
        </nav>

        <!-- Mobile Menu Button -->
        <button class="md:hidden p-2" onclick="toggleMobileMenu()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden border-t bg-white">
        <div class="px-4 py-2 space-y-2">
            <a href="{{ route('places.index') }}"
                class="block py-2 text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('places.*') ? 'text-orange-600 font-medium' : '' }}">
                Jelajahi
            </a>
            @auth
                <a href="{{ route('places.create') }}"
                    class="block py-2 text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('places.create') ? 'text-orange-600 font-medium' : '' }}">
                    Tambah Tempat
                </a>
                <a href="{{ route('checkins.index') }}"
                    class="block py-2 text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('checkins.*') ? 'text-orange-600 font-medium' : '' }}">
                    Check-in Saya
                </a>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.moderation.index') }}"
                        class="block py-2 text-gray-600 hover:text-orange-600 transition-colors {{ request()->routeIs('admin.*') ? 'text-orange-600 font-medium' : '' }}">
                        Moderasi
                    </a>
                @endif
                <a href="{{ route('profile.edit') }}"
                    class="block py-2 text-gray-600 hover:text-orange-600 transition-colors">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit"
                        class="w-full text-left py-2 text-gray-600 hover:text-orange-600 transition-colors">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-2 text-gray-600 hover:text-orange-600 transition-colors">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="block py-2 text-gray-600 hover:text-orange-600 transition-colors">
                    Daftar
                </a>
            @endauth
        </div>
    </div>
</header>

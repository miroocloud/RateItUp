@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8 max-w-4xl">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Tambah Tempat Kuliner</h1>
                <p class="text-gray-600">Bagikan tempat kuliner favorit Anda dengan komunitas</p>
            </div>

            <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Basic Information -->
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900">Informasi Dasar</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Masukkan informasi dasar tentang tempat kuliner</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Tempat *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Contoh: Warung Gudeg Bu Sari" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                            <select id="category_id" name="category_id" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }}">
                                <option value="">Pilih kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Kota/Daerah *</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}"
                                placeholder="Contoh: Yogyakarta" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('city') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price_range" class="block text-sm font-medium text-gray-700 mb-2">Kisaran
                                Harga</label>
                            <input type="text" id="price_range" name="price_range" value="{{ old('price_range') }}"
                                placeholder="Contoh: Rp 15.000 - 25.000"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('price_range') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('price_range')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                        <textarea id="description" name="description" rows="4"
                            placeholder="Ceritakan tentang tempat kuliner ini, makanan yang disajikan, suasana, dll." required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Location Details -->
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900">Detail Lokasi</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Informasi lokasi dan kontak tempat kuliner</p>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap tempat kuliner"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }}">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                placeholder="Contoh: 0274-123456"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="opening_hours" class="block text-sm font-medium text-gray-700 mb-2">Jam Buka</label>
                            <input type="text" id="opening_hours" name="opening_hours"
                                value="{{ old('opening_hours') }}" placeholder="Contoh: 08:00 - 22:00"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('opening_hours') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('opening_hours')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Informasi Tambahan</h2>
                    <p class="text-gray-600 mb-6">Informasi tambahan yang dapat membantu pengunjung</p>

                    <div class="space-y-6">
                        <div>
                            <label for="specialties" class="block text-sm font-medium text-gray-700 mb-2">Menu
                                Andalan</label>
                            <textarea id="specialties" name="specialties" rows="3"
                                placeholder="Sebutkan menu-menu andalan atau yang paling direkomendasikan"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 {{ $errors->has('specialties') ? 'border-red-500' : 'border-gray-300' }}">{{ old('specialties') }}</textarea>
                            @error('specialties')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Foto Tempat</label>
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-orange-400 transition-colors">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="text-gray-600 mb-2">Klik untuk upload foto atau drag & drop</p>
                                <p class="text-sm text-gray-400 mb-4">PNG, JPG hingga 2MB</p>
                                <input type="file" id="image" name="image" accept="image/*" class="hidden"
                                    onchange="previewImage(this)">
                                <button type="button" onclick="document.getElementById('image').click()"
                                    class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg font-medium transition-colors">
                                    Pilih Foto
                                </button>
                            </div>
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="preview" class="w-full h-48 object-cover rounded-lg">
                            </div>
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end">
                    <a href="{{ route('places.index') }}"
                        class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg font-medium transition-colors text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                        Tambah Tempat Kuliner
                    </button>
                </div>
            </form>

            <!-- Guidelines -->
            <div class="bg-orange-50 border border-orange-200 rounded-lg p-6 mt-8">
                <h3 class="text-lg font-semibold text-orange-800 mb-4">Panduan Menambah Tempat</h3>
                <ul class="space-y-2 text-sm text-orange-700">
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-1">•</span>
                        <span>Pastikan tempat kuliner belum ada dalam database kami</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-1">•</span>
                        <span>Berikan informasi yang akurat dan terkini</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-1">•</span>
                        <span>Upload foto yang berkualitas baik dan menarik</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-1">•</span>
                        <span>Tulis deskripsi yang informatif dan membantu</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-orange-500 mt-1">•</span>
                        <span>Semua informasi akan diverifikasi sebelum dipublikasikan</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

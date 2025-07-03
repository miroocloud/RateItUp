<?php

namespace Database\Seeders;

use App\Models\Place;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $categories = Category::all();

        $places = [
            [
                'name' => 'Warung Gudeg Yu Djum',
                'description' => 'Gudeg legendaris dengan cita rasa autentik Yogyakarta yang telah berdiri sejak puluhan tahun. Menggunakan resep turun temurun dengan bumbu rempah pilihan.',
                'address' => 'Jl. Wijilan No. 167, Panembahan, Kraton, Yogyakarta',
                'city' => 'Yogyakarta',
                'phone' => '0274-123456',
                'opening_hours' => '06:00 - 22:00',
                'price_range' => 'Rp 15.000 - 25.000',
                'specialties' => 'Gudeg Kering, Gudeg Basah, Ayam Kampung, Telur Pindang',
                'category' => 'Traditional',
                'status' => 'published'
            ],
            [
                'name' => 'Sate Klatak Pak Pong',
                'description' => 'Sate kambing bakar dengan bumbu khas yang menggugah selera. Dibakar menggunakan arang dan disajikan dengan lontong serta sambal kecap.',
                'address' => 'Jl. Imogiri Timur Km 5, Bantul, Yogyakarta',
                'city' => 'Yogyakarta',
                'phone' => '0274-789012',
                'opening_hours' => '17:00 - 23:00',
                'price_range' => 'Rp 20.000 - 35.000',
                'specialties' => 'Sate Klatak Kambing, Tongseng, Gulai Kambing',
                'category' => 'Street Food',
                'status' => 'published'
            ],
            [
                'name' => 'Bebek Bengil',
                'description' => 'Bebek crispy dengan sambal matah yang pedas dan segar. Tempat makan dengan suasana tradisional Bali yang nyaman.',
                'address' => 'Jl. Hanoman, Ubud, Gianyar, Bali',
                'city' => 'Bali',
                'phone' => '0361-345678',
                'opening_hours' => '11:00 - 22:00',
                'price_range' => 'Rp 45.000 - 75.000',
                'specialties' => 'Bebek Crispy, Sambal Matah, Nasi Putih, Es Kelapa Muda',
                'category' => 'Restaurant',
                'status' => 'published'
            ],
            [
                'name' => 'Pempek Palembang Candy',
                'description' => 'Pempek asli Palembang dengan kuah cuko yang autentik. Dibuat dari ikan tenggiri segar dengan resep turun temurun.',
                'address' => 'Jl. Sudirman No. 45, Palembang',
                'city' => 'Palembang',
                'phone' => '0711-234567',
                'opening_hours' => '08:00 - 21:00',
                'price_range' => 'Rp 12.000 - 30.000',
                'specialties' => 'Pempek Kapal Selam, Pempek Lenjer, Tekwan, Es Kacang Merah',
                'category' => 'Traditional',
                'status' => 'published'
            ],
            [
                'name' => 'Bakso President',
                'description' => 'Bakso jumbo dengan kuah kaldu sapi yang gurih. Bakso berukuran besar dengan isian telur puyuh dan daging cincang.',
                'address' => 'Jl. Ijen No. 12, Malang, Jawa Timur',
                'city' => 'Malang',
                'phone' => '0341-567890',
                'opening_hours' => '10:00 - 22:00',
                'price_range' => 'Rp 18.000 - 28.000',
                'specialties' => 'Bakso Jumbo, Bakso Urat, Mie Ayam, Es Jeruk',
                'category' => 'Street Food',
                'status' => 'published'
            ],
            [
                'name' => 'Nasi Padang Sederhana',
                'description' => 'Nasi Padang dengan lauk pauk lengkap dan bumbu yang kaya rempah. Sajian autentik Minangkabau di Jakarta.',
                'address' => 'Jl. Sabang No. 28, Menteng, Jakarta Pusat',
                'city' => 'Jakarta',
                'phone' => '021-3456789',
                'opening_hours' => '07:00 - 21:00',
                'price_range' => 'Rp 25.000 - 50.000',
                'specialties' => 'Rendang, Ayam Pop, Gulai Tunjang, Sambal Ijo',
                'category' => 'Restaurant',
                'status' => 'published'
            ]
        ];

        foreach ($places as $placeData) {
            $category = $categories->where('name', $placeData['category'])->first();
            
            Place::create([
                'name' => $placeData['name'],
                'description' => $placeData['description'],
                'address' => $placeData['address'],
                'city' => $placeData['city'],
                'phone' => $placeData['phone'],
                'opening_hours' => $placeData['opening_hours'],
                'price_range' => $placeData['price_range'],
                'specialties' => $placeData['specialties'],
                'category_id' => $category->id,
                'user_id' => $user->id,
                'status' => $placeData['status']
            ]);
        }
    }
}

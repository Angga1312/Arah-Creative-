<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Branding & Identity',
                'description' => 'Pengembangan identitas visual yang strategis, menyeluruh, dan berdaya saing tinggi untuk brand modern.',
            ],
            [
                'name' => 'Graphic Design',
                'description' => 'Desain visual presisi tinggi untuk kebutuhan editorial, kemasan produk, dan materi promosi korporat.',
            ],
            [
                'name' => 'Video & Motion',
                'description' => 'Produksi visual bergerak, video komersial sinematik, dan animasi 2D/3D bernarasi kuat.',
            ],
            [
                'name' => 'Digital Content',
                'description' => 'Pengembangan strategi konten digital, kurasi media sosial, dan kampanye interaktif berkala.',
            ],
            [
                'name' => 'Digital Experience',
                'description' => 'Desain antarmuka UI/UX dan arsitektur website interaktif berbasis kenyamanan dan konversi pengguna.',
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'description' => $cat['description'],
                ]
            );
        }
    }
}

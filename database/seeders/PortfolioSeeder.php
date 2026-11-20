<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $branding = Category::where('slug', 'branding-identity')->first();
        $graphic = Category::where('slug', 'graphic-design')->first();
        $video = Category::where('slug', 'video-motion')->first();
        $content = Category::where('slug', 'digital-content')->first();
        $experience = Category::where('slug', 'digital-experience')->first();

        $portfolios = [
            [
                'category_id' => $branding?->id,
                'title' => 'Nordic Roastery Brand System',
                'client_name' => 'Nordic Specialty Coffee',
                'project_year' => '2026',
                'description' => "Penyegaran total identitas visual dan sistem kemasan ramah lingkungan untuk jaringan kedai specialty coffee terkemuka di Skandinavia dan Asia Tenggara. Proyek ini mencakup pengembangan logotype modular, palet warna bumi (earthy tones), dan pedoman packaging zero-waste.",
                'image' => 'images/portfolio/nordic-roastery.jpg',
                'status' => 'published',
            ],
            [
                'category_id' => $experience?->id,
                'title' => 'Solaris Capital Digital Platform',
                'client_name' => 'Solaris Capital Global',
                'project_year' => '2025',
                'description' => "Desain antarmuka web korporat dan portal investor digital untuk firma venture capital global. Menghadirkan navigasi berbasis arsitektur data real-time, visualisasi grafik performa portofolio yang interaktif, dan tipografi berstandar editorial finansial.",
                'image' => 'images/portfolio/solaris-capital.jpg',
                'status' => 'published',
            ],
            [
                'category_id' => $graphic?->id,
                'title' => 'Zenith Lifestyle Editorial Edition 04',
                'client_name' => 'Zenith Media Group',
                'project_year' => '2025',
                'description' => "Penyusunan tata letak editorial majalah cetak dan digital berkonsep minimalis avant-garde. Mengintegrasikan tipografi presisi tinggi, kurasi fotografi arsitektural, dan sistem grid modular untuk memberikan pengalaman membaca premium.",
                'image' => 'images/portfolio/zenith-editorial.jpg',
                'status' => 'published',
            ],
            [
                'category_id' => $video?->id,
                'title' => 'Karya Nusantara Heritage Docuseries',
                'client_name' => 'Yayasan Budaya Bangsa',
                'project_year' => '2026',
                'description' => "Produksi serial dokumenter visual sinematik dan motion graphics interaktif yang mengangkat cerita para perajin warisan nusantara. Ditayangkan dalam 6 episode digital dengan jangkauan lebih dari 2.5 juta penonton.",
                'image' => 'images/portfolio/karya-nusantara.jpg',
                'status' => 'published',
            ],
            [
                'category_id' => $experience?->id,
                'title' => 'Lumina Health Mobile Experience',
                'client_name' => 'Lumina Healthcare Tech',
                'project_year' => '2026',
                'description' => "Riset pengguna, prototipe interaktif, dan desain sistem UI/UX komprehensif untuk platform kesehatan telemedisin modern. Mengutamakan kemudahan aksesibilitas bagi pasien lansia dan kecepatan navigasi dokter.",
                'image' => 'images/portfolio/digital-experience.jpg',
                'status' => 'published',
            ],
            [
                'category_id' => $content?->id,
                'title' => 'AeroPulse Global EV Launch Campaign',
                'client_name' => 'AeroPulse Mobility',
                'project_year' => '2025',
                'description' => "Kampanye peluncuran digital multi-saluran terintegrasi untuk lini kendaraan listrik masa depan. Meliputi strategi pilar konten, filter AR interaktif, dan video teaser 3D yang meningkatkan daftar inden hingga 180%.",
                'image' => 'images/portfolio/digital-content.jpg',
                'status' => 'published',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(
                ['slug' => Str::slug($portfolio['title'])],
                [
                    'category_id' => $portfolio['category_id'],
                    'title' => $portfolio['title'],
                    'client_name' => $portfolio['client_name'],
                    'project_year' => $portfolio['project_year'],
                    'description' => $portfolio['description'],
                    'image' => $portfolio['image'],
                    'status' => $portfolio['status'],
                ]
            );
        }
    }
}

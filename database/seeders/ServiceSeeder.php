<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $branding = Category::where('slug', 'branding-identity')->first();
        $graphic = Category::where('slug', 'graphic-design')->first();
        $video = Category::where('slug', 'video-motion')->first();
        $content = Category::where('slug', 'digital-content')->first();
        $experience = Category::where('slug', 'digital-experience')->first();

        $services = [
            [
                'category_id' => $branding?->id,
                'name' => 'Brand Strategy & Visual Identity',
                'short_description' => 'Perumusan identitas visual komprehensif mulai dari filosofi logo, tipografi eksklusif, hingga brand guideline lengkap.',
                'description' => "Layanan Brand Strategy & Visual Identity dari ARAH Creative dirancang untuk mentransformasi persepsi audiens terhadap bisnis Anda. Kami menggabungkan riset mendalam terhadap pasar dan kompetitor dengan eksplorasi kreatif bernilai artistik tinggi.

Setiap elemen identitas yang kami kembangkan—mulai dari logo mark, logotype, sistem warna pantone dan RGB, tipografi hirarkis, hingga aplikasi kemasan dan stationery—dirancang secara fungsional untuk memastikan konsistensi brand di setiap titik kontak pelanggan.

Deliverables meliputi:
- Brand Positioning & Narrative Book
- Primary & Secondary Logo Suite (SVG, PNG, AI, EPS)
- Comprehensive Brand Guidelines (PDF & Digital Styleguide)
- Design System for Collateral & Stationary",
                'image' => 'services/branding-identity.svg',
                'status' => 'published',
            ],
            [
                'category_id' => $graphic?->id,
                'name' => 'Corporate Publication & Editorial Design',
                'short_description' => 'Penyusunan company profile, annual report, dan materi publikasi korporat dengan layout editorial modern dan elegan.',
                'description' => "Komunikasi korporat membutuhkan keseimbangan antara keakuratan data dan daya tarik estetika. Melalui layanan Editorial Design, kami menyulap laporan tahunan (annual report), proposal tender, dan company profile perusahaan Anda menjadi dokumen berkelas majalah editorial terkemuka dunia.

Pendekatan kami menitikberatkan pada ruang kosong (whitespace) yang lega, tipografi tegas, infografik data yang mudah dipahami, serta pemilihan material cetak maupun digital yang ramah pembaca.

Deliverables meliputi:
- Interactive Digital PDF & Print-Ready Artwork
- Infographic Systems & Data Visualization
- Custom Grid & Modular Layout Templates",
                'image' => 'services/graphic-design.svg',
                'status' => 'published',
            ],
            [
                'category_id' => $video?->id,
                'name' => 'Cinematic Commercial Video & Motion',
                'short_description' => 'Pembuatan video profil korporat, video iklan komersial, dan motion graphics berstandar siaran profesional.',
                'description' => "Di era dominasi konten audio visual, video berkualitas tinggi adalah aset terpenting dalam mengomunikasikan visi perusahaan. Tim produksi ARAH Creative menghadirkan storytelling yang menggugah emosi melalui sinematografi sinematik, color grading profesional, serta efek visual dan motion graphic 3D yang dinamis.

Dari perumusan storyboard naskah hingga pascaproduksi audio mastering, kami mengawal setiap detik video Anda agar meninggalkan impresi mendalam bagi audiens.

Deliverables meliputi:
- Master Video Commercial (4K Resolution)
- Short Cuts & Re-framing for Vertical Platforms (Instagram Reels / TikTok)
- Dynamic Motion Graphic Package & Lower Thirds",
                'image' => 'services/video-motion.svg',
                'status' => 'published',
            ],
            [
                'category_id' => $content?->id,
                'name' => 'Strategic Social Media Campaign',
                'short_description' => 'Manajemen dan produksi aset konten digital terpadu untuk membangun engagement dan awareness brand yang berkelanjutan.',
                'description' => "Media sosial bukan sekadar tempat mengunggah gambar promosi harian; itu adalah representasi digital langsung dari citra merek Anda. Kami merancang strategi pilar konten bulanan, kalender editorial terencana, dan aset visual interaktif (carousel, infografik, mikro-animasi).

Kami membantu brand Anda tidak hanya sekadar dilihat, melainkan dibicarakan dan dibagikan secara organik oleh target audiens potensial.

Deliverables meliputi:
- Monthly Social Media Content Blueprint & Moodboard
- Static & Carousel Visual Assets Design
- Engaging Copywriting & Call-to-Action Sequences
- Performance Reporting & Creative Evaluation",
                'image' => 'services/digital-content.svg',
                'status' => 'published',
            ],
            [
                'category_id' => $experience?->id,
                'name' => 'Digital Experience & UI/UX Design',
                'short_description' => 'Perancangan pengalaman digital melalui desain web interaktif, sistem desain terstruktur, dan riset interaksi pengguna.',
                'description' => "Kami membangun antarmuka website dan aplikasi digital yang tidak hanya memukau secara visual, namun juga mulus dan intuitif digunakan. Memadukan estetika minimalis modern dengan prinsip usability standar internasional, kami merancang alur interaksi pengguna (user journey) yang mengoptimalkan konversi.

Dari riset wireframe, pembuatan prototipe interaktif di Figma, hingga sistem komponen desain yang mudah diintegrasikan ke platform backend Laravel.

Deliverables meliputi:
- Wireframes & High-Fidelity UI Interactive Prototypes
- Comprehensive Component Design System & Tokens
- Responsive Mobile, Tablet, & Desktop Screen Assets",
                'image' => 'services/digital-experience.svg',
                'status' => 'published',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => Str::slug($service['name'])],
                [
                    'category_id' => $service['category_id'],
                    'name' => $service['name'],
                    'short_description' => $service['short_description'],
                    'description' => $service['description'],
                    'image' => $service['image'],
                    'status' => $service['status'],
                ]
            );
        }
    }
}

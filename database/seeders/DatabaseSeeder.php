<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Artisan;
use App\Models\BusinessGroup;
use App\Models\HomeContent;
use App\Models\AboutContent;
use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default Admin User if not already exists
        if (!User::where('email', 'gonoharjo@admin.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'gonoharjo@admin.com',
                'password' => bcrypt('123'),
            ]);
        }

        // Seed Home Content
        if (!HomeContent::exists()) {
            HomeContent::create([
                'hero_image' => null,
                'tagline' => 'Kemurnian Manis Alami dari Lereng Gunung Ungaran',
                'village_summary' => 'Desa Gonoharjo di Kecamatan Limbangan terkenal dengan udara pegunungan yang bersih, mata air alami, dan pepohonan aren yang tumbuh subur. Pengrajin lokal kami telah secara turun-temurun memproduksi gula aren secara tradisional dengan menjaga kelestarian alam dan kualitas produk nira murni.',
            ]);
        }

        // Seed About Content
        if (!AboutContent::exists()) {
            AboutContent::create([
                'history' => 'Kelompok pengrajin Gula Aren di Desa Gonoharjo didirikan dengan tujuan meningkatkan kesejahteraan para petani nira dan menjaga standar pengolahan tradisional yang higienis. Dari generasi ke generasi, kami terus mempertahankan penyadapan nira aren murni tanpa campuran bahan kimia untuk menghasilkan rasa karamel alami yang khas.',
                'vision' => 'Menjadi produsen gula aren organik premium terdepan yang menyejahterakan komunitas petani lokal dan melestarikan warisan tradisi pedesaan.',
                'mission' => "1. Menerapkan praktik pertanian nira aren organik dan berkelanjutan.\n2. Menjaga kualitas rasa, keaslian, dan kebersihan pengolahan nira aren.\n3. Memperluas pasar UMKM lokal melalui pemasaran digital dan pemberdayaan pengrajin.",
                'production_gallery_json' => [
                    ['title' => 'Penyadapan Nira', 'desc' => 'Petani memanjat pohon aren pagi hari untuk menyadap nira segar.'],
                    ['title' => 'Penyaringan Nira', 'desc' => 'Nira aren segar disaring secara higienis sebelum dimasak.'],
                    ['title' => 'Pemasakan Nira', 'desc' => 'Nira dimasak berjam-jam di tungku kayu tradisional hingga mengental.'],
                    ['title' => 'Pencetakan Gula', 'desc' => 'Nira pekat dituangkan ke cetakan bambu kelapa alami.'],
                ],
            ]);
        }

        // Seed Contact Info
        if (!ContactInfo::exists()) {
            ContactInfo::create([
                'address' => 'Desa Gonoharjo, RT 02 RW 01, Kecamatan Limbangan, Kabupaten Kendal, Jawa Tengah 51383',
                'phone' => '081234567890',
                'email' => 'aren@gonoharjo.desa.id',
                'operating_hours' => 'Setiap Hari: 08:00 - 17:00 WIB',
                'map_lat' => -7.1189,
                'map_lng' => 110.3168,
                'whatsapp_number' => '6281234567890',
            ]);
        }

        // Seed Business Group
        if (!BusinessGroup::exists()) {
            BusinessGroup::create([
                'group_name' => 'Kelompok Tani Lestari Aren Gonoharjo',
                'description' => 'Kelompok tani terpadu yang memayungi 18 pengrajin gula aren tradisional di kawasan Gonoharjo, berdedikasi menjaga kualitas produk dan kelestarian ekosistem hutan aren lokal.',
                'structure_json' => [
                    ['jabatan' => 'Ketua Kelompok', 'nama' => 'Pak Suwarno'],
                    ['jabatan' => 'Sekretaris', 'nama' => 'Ibu Marni'],
                    ['jabatan' => 'Bendahara', 'nama' => 'Pak Supardi'],
                    ['jabatan' => 'Koordinator Produksi', 'nama' => 'Pak Hartono'],
                ],
                'logo' => null,
            ]);
        }

        // Seed Products
        if (!Product::exists()) {
            Product::create([
                'name' => 'Gula Aren Semut Organik',
                'category' => 'gula_semut',
                'price' => 18000,
                'description' => 'Gula aren bentuk bubuk/kristal halus yang mudah larut. Sangat cocok untuk pemanis kopi, teh, bumbu dapur, pemanis kue, dan minuman kekinian. Diproses higienis dan dikeringkan secara optimal.',
                'image' => null,
                'is_active' => true,
            ]);
            Product::create([
                'name' => 'Gula Aren Cetak Tradisional',
                'category' => 'gula_cetak',
                'price' => 14000,
                'description' => 'Gula aren cetak padat tradisional yang menggunakan cetakan tempurung kelapa atau bambu alami. Memiliki cita rasa legit khas karamel aren dan aroma wangi alami nira kelapa/aren.',
                'image' => null,
                'is_active' => true,
            ]);
            Product::create([
                'name' => 'Sirup Gula Aren Cair Premium',
                'category' => 'gula_cair',
                'price' => 22000,
                'description' => 'Gula aren cair kental premium siap pakai. Sangat praktis untuk topping es cendol, es krim, boba, pancakes, maupun campuran kopi susu gula aren.',
                'image' => null,
                'is_active' => true,
            ]);
        }

        // Seed 18 Artisans
        if (!Artisan::exists()) {
            $artisanNames = [
                'Pak Warno', 'Mbah Darmi', 'Pak Hartono', 'Ibu Minah', 'Mbah Rejo',
                'Pak Slamet', 'Ibu Yanti', 'Mbah Seno', 'Pak Bowo', 'Ibu Sri',
                'Pak Joko', 'Mbah Parto', 'Ibu Atik', 'Pak Tugimin', 'Mbah Sumi',
                'Pak Kardi', 'Ibu Rusni', 'Pak Sugeng'
            ];

            $stories = [
                'Telah menyadap nira selama lebih dari 30 tahun. Bagi beliau, nira aren adalah denyut nadi kehidupan keluarga.',
                'Menjaga resep dapur tungku kayu tradisional agar aroma gula aren tetap wangi dan legit alami.',
                'Koordinator pengrajin yang berfokus pada kebersihan proses penyaringan nira aren.',
                'Spesialis pembuat gula aren semut kristal dengan tingkat pengeringan terbaik di desa.',
                'Sesepuh pengrajin aren yang selalu mengajarkan pentingnya kelestarian pohon aren muda.',
                'Petani aren yang mengandalkan keahlian memanjat pohon aren setinggi 15 meter setiap pagi.',
                'Mengolah nira menjadi gula aren cetak tempurung dengan kelembutan tekstur yang khas.',
                'Memiliki pohon aren warisan keluarga yang menghasilkan nira termanis di lereng Ungaran.',
                'Sangat teliti dalam mengatur suhu bara api kayu agar nira tidak hangus saat dimasak.',
                'Membuat inovasi kemasan ramah lingkungan dari daun aren kering untuk produk cetak.',
                'Petani muda yang meneruskan usaha keluarga menyadap aren demi melestarikan tradisi.',
                'Menyadap nira aren di kebun belakang sejak masa mudanya hingga kini dengan gembira.',
                'Ahli dalam mengaduk nira aren pekat hingga membentuk kristal gula semut berkualitas.',
                'Menggunakan kayu bakar khusus untuk menghasilkan panas stabil dalam memasak nira.',
                'Nenek penyadap aren yang rajin membersihkan serabut ijuk pohon aren demi nira yang bersih.',
                'Selalu memastikan nira aren disadap segar tanpa tambahan pengawet kimia sintetis.',
                'Memadukan nira kelapa dan aren lokal untuk menghasilkan cita rasa unik gula tradisional.',
                'Pengrajin aren yang berdedikasi mengajarkan cara penyadapan nira yang aman kepada pemuda desa.'
            ];

            for ($i = 0; $i < 18; $i++) {
                Artisan::create([
                    'name' => $artisanNames[$i],
                    'photo' => null,
                    'story' => $stories[$i],
                    'order_position' => $i + 1,
                ]);
            }
        }
    }
}


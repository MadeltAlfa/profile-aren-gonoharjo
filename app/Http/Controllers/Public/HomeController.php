<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $homeContent = HomeContent::first() ?? new HomeContent([
            'tagline' => 'Kemurnian Manis Alami dari Lereng Gunung Ungaran',
            'village_summary' => 'Desa Gonoharjo di Kecamatan Limbangan terkenal dengan udara pegunungan yang bersih, mata air alami, dan pepohonan aren yang tumbuh subur. Pengrajin lokal kami telah secara turun-temurun memproduksi gula aren secara tradisional dengan menjaga kelestarian alam dan kualitas produk nira murni.'
        ]);

        $featuredProducts = Product::where('is_active', true)->inRandomOrder()->take(3)->get();

        return view('public.home', compact('homeContent', 'featuredProducts'));
    }
}

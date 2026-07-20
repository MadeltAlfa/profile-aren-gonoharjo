<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $aboutContent = AboutContent::first() ?? new AboutContent([
            'history' => 'Kelompok pengrajin Gula Aren di Desa Gonoharjo didirikan dengan tujuan meningkatkan kesejahteraan para petani nira dan menjaga standar pengolahan tradisional yang higienis.',
            'vision' => 'Menjadi produsen gula aren organik premium terdepan yang menyejahterakan komunitas petani lokal.',
            'mission' => "1. Menerapkan praktik pertanian organik.\n2. Menjaga kualitas rasa.\n3. Memperluas pasar UMKM.",
            'production_gallery_json' => []
        ]);

        return view('public.about', compact('aboutContent'));
    }
}

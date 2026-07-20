@extends('public.layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[80vh] flex items-center bg-[#422812] text-[#F7F1E1] overflow-hidden py-24">
    <!-- Grid Overlay background for design depth -->
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, #F7F1E1 1px, transparent 0); background-size: 24px 24px;"></div>
    
    @if($homeContent->hero_image)
        <div class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat opacity-40 mix-blend-overlay" style="background-image: url('{{ asset('storage/' . $homeContent->hero_image) }}')"></div>
    @else
        <div class="absolute inset-0 z-0 bg-gradient-to-tr from-[#422812] via-[#6F4520] to-[#4A6B3D] opacity-40"></div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#4A6B3D]/30 border border-[#4A6B3D]/50 text-xs font-bold uppercase tracking-wider text-[#F7F1E1] shadow-sm animate-pulse">
                    <i class="fa-solid fa-seedling text-sm text-[#D0A97A]"></i> 100% Organik & Alami
                </span>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold font-serif-display leading-tight">
                    {{ $homeContent->tagline }}
                </h1>
                
                <p class="text-lg text-[#F7F1E1]/85 max-w-xl mx-auto lg:mx-0 font-light leading-relaxed">
                    Menghubungkan Anda langsung ke tradisi pembuatan gula aren legendaris di lereng Gunung Ungaran. Higienis, bergizi tinggi, dan diproses dengan penuh dedikasi.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('products') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#4A6B3D] hover:bg-[#5C7A4A] text-[#F7F1E1] font-bold uppercase tracking-wider rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                        Lihat Katalog Produk <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('about') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 border border-[#F7F1E1]/30 hover:border-[#F7F1E1]/75 hover:bg-[#F7F1E1]/10 text-[#F7F1E1] font-bold uppercase tracking-wider rounded-lg transition-all duration-300">
                        Pelajari Proses Kami
                    </a>
                </div>
            </div>

            <!-- Visual element -->
            <div class="lg:col-span-5 hidden lg:flex justify-center relative">
                <div class="absolute -inset-4 bg-[#4A6B3D]/25 rounded-full blur-xl animate-pulse"></div>
                <div class="relative w-80 h-80 rounded-2xl bg-gradient-to-b from-[#8B5A2B] to-[#422812] border-4 border-[#D0A97A] shadow-2xl flex items-center justify-center overflow-hidden transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <div class="absolute inset-0 bg-[#4A6B3D]/10"></div>
                    <i class="fa-solid fa-bucket text-8xl text-[#D0A97A] opacity-25 absolute right-4 bottom-4"></i>
                    <div class="p-8 text-center space-y-4">
                        <i class="fa-solid fa-leaf text-5xl text-[#D0A97A]"></i>
                        <h3 class="font-serif-display text-2xl font-bold">Tradisi Asli</h3>
                        <p class="text-xs text-[#F7F1E1]/80 font-light leading-relaxed">
                            Nira disadap segar setiap subuh dan sore hari oleh 18 pengrajin pilihan Desa Gonoharjo.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-24 bg-[#FAF7EE] border-t border-[#6F4520]/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-bold uppercase tracking-widest text-[#4A6B3D]">Produk Pilihan</span>
            <h2 class="text-3xl sm:text-4xl font-bold font-serif-display text-[#6F4520]">Produk Gula Aren Unggulan</h2>
            <div class="w-16 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
            <p class="text-[#756C5C] font-light text-sm sm:text-base leading-relaxed">
                Temukan variasi olahan gula aren murni dari pengrajin kami, diproduksi alami tanpa zat tambahan sintetis.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
                <div class="bg-[#F7F1E1] rounded-xl overflow-hidden border border-[#6F4520]/10 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col group">
                    
                    <!-- Product Image -->
                    <div class="relative h-64 bg-gradient-to-br from-[#EFE8D3] to-[#E5DCBE] overflow-hidden flex items-center justify-center">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="text-center p-6 space-y-3 text-[#6F4520]/60">
                                <i class="fa-solid fa-box-open text-5xl"></i>
                                <span class="block text-xs uppercase font-semibold tracking-wider">Foto belum diunggah</span>
                            </div>
                        @endif
                        <span class="absolute top-4 right-4 px-3 py-1 bg-[#4A6B3D] text-[#F7F1E1] text-[10px] font-bold uppercase tracking-wider rounded-full shadow-sm">
                            @if($product->category == 'gula_semut')
                                Gula Semut
                            @elseif($product->category == 'gula_cetak')
                                Gula Cetak
                            @else
                                Gula Cair
                            @endif
                        </span>
                    </div>

                    <!-- Details -->
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div class="space-y-3">
                            <h3 class="font-sans-display font-bold text-lg text-[#6F4520] group-hover:text-[#4A6B3D] transition-colors duration-200">
                                {{ $product->name }}
                            </h3>
                            <p class="text-xs text-[#756C5C] leading-relaxed line-clamp-3 font-light">
                                {{ $product->description }}
                            </p>
                        </div>
                        
                        <div class="pt-6 mt-6 border-t border-[#6F4520]/5 flex items-center justify-between">
                            <span class="text-base font-bold text-[#6F4520] font-sans-display">
                                Rp {{ number_format($product->price, 0, ',', '.') }}<span class="text-xs text-[#756C5C] font-normal"> / pcs</span>
                            </span>
                            <a href="{{ route('products') }}" class="text-xs font-bold text-[#4A6B3D] hover:text-[#6F4520] transition-colors flex items-center gap-1">
                                Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('products') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-[#6F4520] hover:bg-[#8B5A2B] text-[#F7F1E1] text-xs font-bold uppercase tracking-wider rounded-lg shadow transition-all">
                Lihat Semua Produk <i class="fa-solid fa-boxes-stacked"></i>
            </a>
        </div>

    </div>
</section>

<!-- About Brief Section -->
<section class="py-24 bg-[#F7F1E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="absolute -inset-4 bg-[#D0A97A]/20 rounded-2xl blur-lg"></div>
                <div class="relative bg-[#E5DCBE] rounded-2xl p-8 border border-[#6F4520]/15 space-y-6 shadow-md">
                    <h3 class="font-serif-display text-2xl font-bold text-[#6F4520] flex items-center gap-2">
                        <i class="fa-solid fa-mountain text-[#4A6B3D]"></i> Profil Singkat Desa
                    </h3>
                    <p class="text-sm text-[#36200F] font-light leading-relaxed">
                        Desa Gonoharjo terletak di ketinggian sejuk di bawah Gunung Ungaran. Keindahan bentang alam ini mendukung kelestarian ratusan pohon aren organik yang nira segarnya kami manfaatkan setiap hari.
                    </p>
                    <div class="border-t border-[#6F4520]/10 pt-4 flex justify-between items-center text-xs text-[#6F4520] font-bold">
                        <span>Lembangan, Kendal</span>
                        <span class="flex items-center gap-1 text-[#4A6B3D]"><i class="fa-solid fa-certificate"></i> Sentra Lokal</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-[#4A6B3D]">Profil Komunitas</span>
                <h2 class="text-3xl sm:text-4xl font-bold font-serif-display text-[#6F4520]">Dari Kebun Aren ke Meja Anda</h2>
                <div class="w-12 h-1 bg-[#4A6B3D] rounded"></div>
                <p class="text-sm sm:text-base text-[#756C5C] font-light leading-relaxed">
                    {{ $homeContent->village_summary }}
                </p>
                <div class="pt-4">
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#4A6B3D] hover:text-[#6F4520] transition-colors group">
                        Baca Selengkapnya Tentang Kami 
                        <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

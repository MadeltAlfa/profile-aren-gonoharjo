@extends('public.layouts.app')

@section('title', 'Kisah Pengrajin')

@section('content')
<!-- Page Header -->
<section class="bg-[#422812] text-[#F7F1E1] py-16 relative">
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, #F7F1E1 1px, transparent 0); background-size: 20px 20px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
        <span class="text-xs font-bold uppercase tracking-widest text-[#D0A97A]">Pilar Komunitas Kami</span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-serif-display">Kisah Pengrajin Aren</h1>
        <div class="w-12 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
    </div>
</section>

<!-- Artisans Grid Section -->
<section class="py-24 bg-[#F7F1E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-20 space-y-3">
            <span class="text-xs font-bold uppercase tracking-widest text-[#4A6B3D]">Dedikasi Petani Lokal</span>
            <h2 class="text-3xl sm:text-4xl font-bold font-serif-display text-[#6F4520]">Mengenal 18 Pengrajin Gonoharjo</h2>
            <div class="w-16 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
            <p class="text-[#756C5C] font-light text-sm sm:text-base leading-relaxed">
                Setiap butir gula aren yang Anda nikmati adalah hasil cucuran keringat dan kearifan lokal dari para pengrajin andalan kami di lereng Gunung Ungaran.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($artisans as $artisan)
                <div class="bg-[#FAF7EE] rounded-xl overflow-hidden border border-[#6F4520]/10 shadow-sm p-8 text-center space-y-6 hover:shadow-md hover:border-[#6F4520]/25 transition-all duration-300 relative flex flex-col justify-between">
                    
                    <!-- Decorative leaf element -->
                    <span class="absolute top-4 right-4 text-[#4A6B3D]/15 text-2xl pointer-events-none">
                        <i class="fa-solid fa-leaf"></i>
                    </span>

                    <div class="space-y-6">
                        <!-- Photo or Placeholder -->
                        <div class="w-24 h-24 mx-auto rounded-full bg-[#E5DCBE] border-2 border-[#8B5A2B] overflow-hidden flex items-center justify-center shadow-md">
                            @if($artisan->photo)
                                <img src="{{ asset('storage/' . $artisan->photo) }}" alt="{{ $artisan->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-[#6F4520]/60 text-center">
                                    <i class="fa-solid fa-user text-4xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="space-y-2">
                            <h3 class="font-sans-display font-bold text-lg text-[#6F4520]">{{ $artisan->name }}</h3>
                            <span class="inline-block px-3 py-1 bg-[#4A6B3D]/10 text-[#4A6B3D] text-[9px] font-bold uppercase tracking-wider rounded-full">
                                Pengrajin Aren #{{ $artisan->order_position }}
                            </span>
                        </div>

                        <!-- Story/Testimony Quote -->
                        <p class="text-xs text-[#756C5C] italic leading-relaxed font-light before:content-['“'] after:content-['”'] before:text-lg after:text-lg before:text-[#4A6B3D] after:text-[#4A6B3D]">
                            {{ $artisan->story }}
                        </p>
                    </div>

                    <!-- Footer card spacer -->
                    <div class="pt-4 border-t border-[#6F4520]/5 text-[10px] text-[#756C5C]/65 font-medium tracking-wide uppercase">
                        Kemitraan Sejak Lama
                    </div>

                </div>
            @empty
                <div class="col-span-3 text-center py-24 text-[#756C5C]">
                    <i class="fa-solid fa-people-group text-5xl mb-4 opacity-50"></i>
                    <p class="text-base font-light">Data pengrajin sedang diperbarui oleh administrator.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection

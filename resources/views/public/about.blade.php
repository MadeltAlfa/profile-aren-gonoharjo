@extends('public.layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Page Header -->
<section class="bg-[#422812] text-[#F7F1E1] py-16 relative">
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, #F7F1E1 1px, transparent 0); background-size: 20px 20px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
        <span class="text-xs font-bold uppercase tracking-widest text-[#D0A97A]">Profil Kelompok</span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-serif-display">Tentang Kami</h1>
        <div class="w-12 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
    </div>
</section>

<!-- History Section -->
<section class="py-20 bg-[#F7F1E1]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
            
            <div class="md:col-span-4 flex justify-center">
                <div class="w-56 h-56 rounded-full bg-[#4A6B3D] text-[#F7F1E1] flex items-center justify-center shadow-lg border-4 border-[#E5DCBE]">
                    <i class="fa-solid fa-clock-rotate-left text-7xl"></i>
                </div>
            </div>

            <div class="md:col-span-8 space-y-6">
                <h2 class="text-2xl sm:text-3xl font-bold font-serif-display text-[#6F4520]">Sejarah & Asal Usul</h2>
                <p class="text-base text-[#756C5C] font-light leading-relaxed">
                    {{ $aboutContent->history }}
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="py-20 bg-[#FAF7EE] border-t border-[#6F4520]/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Vision -->
            <div class="bg-[#F7F1E1] p-10 rounded-xl border border-[#6F4520]/10 shadow-sm space-y-6">
                <div class="w-12 h-12 bg-[#4A6B3D]/10 rounded-lg flex items-center justify-center text-[#4A6B3D]">
                    <i class="fa-solid fa-eye text-xl"></i>
                </div>
                <h3 class="text-xl font-bold font-serif-display text-[#6F4520]">Visi Kami</h3>
                <p class="text-sm text-[#756C5C] leading-relaxed font-light">
                    {{ $aboutContent->vision }}
                </p>
            </div>

            <!-- Mission -->
            <div class="bg-[#F7F1E1] p-10 rounded-xl border border-[#6F4520]/10 shadow-sm space-y-6">
                <div class="w-12 h-12 bg-[#4A6B3D]/10 rounded-lg flex items-center justify-center text-[#4A6B3D]">
                    <i class="fa-solid fa-bullseye text-xl"></i>
                </div>
                <h3 class="text-xl font-bold font-serif-display text-[#6F4520]">Misi Kami</h3>
                <ul class="space-y-4">
                    @php
                        $missions = explode("\n", $aboutContent->mission);
                    @endphp
                    @foreach($missions as $m)
                        @if(trim($m) !== '')
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[#4A6B3D] text-[#F7F1E1] text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">
                                    {{ $loop->iteration }}
                                </span>
                                <span class="text-sm text-[#756C5C] leading-relaxed font-light">
                                    {{ ltrim($m, "0123456789.- ") }}
                                </span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- Production Process Section -->
<section class="py-24 bg-[#F7F1E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-20 space-y-3">
            <span class="text-xs font-bold uppercase tracking-widest text-[#4A6B3D]">Proses Produksi</span>
            <h2 class="text-3xl sm:text-4xl font-bold font-serif-display text-[#6F4520]">Tahapan Pembuatan Gula Aren</h2>
            <div class="w-16 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
            <p class="text-[#756C5C] font-light text-sm sm:text-base leading-relaxed">
                Kami bangga menjaga keaslian cara pengolahan nira segar secara higienis dan alami dari awal hingga menjadi produk akhir.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @if($aboutContent->production_gallery_json && is_array($aboutContent->production_gallery_json))
                @foreach($aboutContent->production_gallery_json as $index => $step)
                    <div class="bg-[#FAF7EE] p-8 rounded-xl border border-[#6F4520]/10 shadow-sm text-center relative group flex flex-col justify-between">
                        <!-- Step Counter -->
                        <span class="absolute -top-4 left-1/2 -translate-x-1/2 w-10 h-10 bg-[#4A6B3D] text-[#F7F1E1] font-bold text-sm rounded-full flex items-center justify-center shadow">
                            0{{ $index + 1 }}
                        </span>

                        <div class="space-y-4 pt-4">
                            <!-- Image or Placeholder -->
                            <div class="w-20 h-20 mx-auto rounded-full bg-[#4A6B3D]/10 text-[#4A6B3D] flex items-center justify-center mb-6">
                                @if(isset($step['image']) && $step['image'])
                                    <img src="{{ asset('storage/' . $step['image']) }}" alt="{{ $step['title'] }}" class="w-full h-full rounded-full object-cover">
                                @else
                                    <i class="fa-solid fa-bowl-rice text-3xl"></i>
                                @endif
                            </div>

                            <h3 class="font-sans-display font-bold text-base text-[#6F4520]">{{ $step['title'] }}</h3>
                            <p class="text-xs text-[#756C5C] leading-relaxed font-light">
                                {{ $step['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-4 text-center py-12 text-[#756C5C]">
                    <i class="fa-solid fa-image text-4xl mb-4 opacity-55"></i>
                    <p class="text-sm">Tahapan proses produksi belum diunggah.</p>
                </div>
            @endif
        </div>

    </div>
</section>
@endsection

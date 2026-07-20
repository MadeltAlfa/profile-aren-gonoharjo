@extends('public.layouts.app')

@section('title', 'Kelompok Usaha')

@section('content')
<!-- Page Header -->
<section class="bg-[#422812] text-[#F7F1E1] py-16 relative">
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, #F7F1E1 1px, transparent 0); background-size: 20px 20px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
        <span class="text-xs font-bold uppercase tracking-widest text-[#D0A97A]">Kolektif UMKM</span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-serif-display">Kelompok Usaha</h1>
        <div class="w-12 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
    </div>
</section>

<!-- Main Group Profiling -->
<section class="py-24 bg-[#F7F1E1]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Description Plaque -->
        <div class="bg-[#FAF7EE] p-8 md:p-12 rounded-xl border border-[#6F4520]/15 shadow-sm space-y-6 text-center md:text-left relative overflow-hidden">
            <!-- Decorative logo placeholder or background circle -->
            <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-[#4A6B3D]/5 rounded-full pointer-events-none"></div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 items-center">
                <div class="md:col-span-1 flex justify-center">
                    <div class="w-28 h-28 rounded-xl bg-[#4A6B3D] text-[#F7F1E1] flex items-center justify-center shadow border-2 border-[#E5DCBE]">
                        @if($group->logo)
                            <img src="{{ asset('storage/' . $group->logo) }}" alt="{{ $group->group_name }}" class="w-full h-full object-cover rounded-xl">
                        @else
                            <i class="fa-solid fa-people-carry-box text-5xl"></i>
                        @endif
                    </div>
                </div>
                
                <div class="md:col-span-3 space-y-4">
                    <h2 class="text-2xl font-bold font-serif-display text-[#6F4520]">{{ $group->group_name }}</h2>
                    <p class="text-sm text-[#756C5C] leading-relaxed font-light">
                        {{ $group->description }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Structure Section -->
        <div class="space-y-8">
            <div class="text-center space-y-2">
                <h3 class="text-2xl font-bold font-serif-display text-[#6F4520]">Struktur Kepengurusan</h3>
                <div class="w-12 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
            </div>

            <!-- Structure Grid / Table -->
            <div class="bg-[#FAF7EE] rounded-xl overflow-hidden border border-[#6F4520]/10 shadow-sm">
                @if($group->structure_json && is_array($group->structure_json))
                    <div class="divide-y divide-[#6F4520]/10">
                        @foreach($group->structure_json as $official)
                            <div class="p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 hover:bg-[#EFE8D3]/30 transition-colors">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-[#4A6B3D]/10 text-[#4A6B3D] flex items-center justify-center">
                                        <i class="fa-solid fa-user-tie text-xs"></i>
                                    </div>
                                    <span class="text-xs uppercase font-bold tracking-wider text-[#4A6B3D]">{{ $official['jabatan'] ?? '' }}</span>
                                </div>
                                <span class="text-sm font-semibold text-[#6F4520] sm:text-right">{{ $official['nama'] ?? '' }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-12 text-center text-[#756C5C] space-y-2">
                        <i class="fa-solid fa-sitemap text-3xl opacity-50 block"></i>
                        <p class="text-xs">Struktur kepengurusan belum dikonfigurasi.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Extra Info (UMKM legality/standards) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-8">
            <div class="bg-[#FAF7EE] p-6 rounded-xl border border-[#6F4520]/10 text-center space-y-3 shadow-xs">
                <i class="fa-solid fa-file-shield text-2xl text-[#4A6B3D]"></i>
                <h4 class="font-bold text-xs uppercase text-[#6F4520] tracking-wider">Legalitas Terdaftar</h4>
                <p class="text-[11px] text-[#756C5C] leading-relaxed font-light">PIRT & Sertifikasi Halal proses pengajuan berkelanjutan untuk kenyamanan konsumen.</p>
            </div>
            
            <div class="bg-[#FAF7EE] p-6 rounded-xl border border-[#6F4520]/10 text-center space-y-3 shadow-xs">
                <i class="fa-solid fa-leaf text-2xl text-[#4A6B3D]"></i>
                <h4 class="font-bold text-xs uppercase text-[#6F4520] tracking-wider">Kelestarian Hutan</h4>
                <p class="text-[11px] text-[#756C5C] leading-relaxed font-light">Petani menerapkan konservasi tanah untuk kelangsungan anakan pohon aren di desa.</p>
            </div>

            <div class="bg-[#FAF7EE] p-6 rounded-xl border border-[#6F4520]/10 text-center space-y-3 shadow-xs">
                <i class="fa-solid fa-handshake-angle text-2xl text-[#4A6B3D]"></i>
                <h4 class="font-bold text-xs uppercase text-[#6F4520] tracking-wider">Koperasi Bersama</h4>
                <p class="text-[11px] text-[#756C5C] leading-relaxed font-light">Hasil penjualan dikelola bersama secara koperasi demi memajukan kesejahteraan pengrajin.</p>
            </div>
        </div>

    </div>
</section>
@endsection

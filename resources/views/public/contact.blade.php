@extends('public.layouts.app')

@section('title', 'Kontak & Pemesanan')

@section('styles')
<style>
    #map {
        height: 400px;
        width: 100%;
        border-radius: 12px;
        border: 2px solid var(--c-brown);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<section class="bg-[#422812] text-[#F7F1E1] py-16 relative">
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, #F7F1E1 1px, transparent 0); background-size: 20px 20px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
        <span class="text-xs font-bold uppercase tracking-widest text-[#D0A97A]">Hubungi Kami</span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-serif-display">Kontak & Pemesanan</h1>
        <div class="w-12 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
    </div>
</section>

<!-- Content Body -->
<section class="py-24 bg-[#F7F1E1]" id="pesan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Alerts and WA redirect -->
        <div class="max-w-4xl mx-auto mb-12">
            @if(session('success') && !session('whatsapp_url'))
                <div class="p-4 bg-[#EAEFE6] border border-[#4A6B3D] text-[#4A6B3D] rounded-xl text-sm font-semibold text-center shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('whatsapp_url'))
                <div class="p-6 bg-[#EAEFE6] border-2 border-[#4A6B3D] text-[#36200F] rounded-xl text-center space-y-4 shadow-md">
                    <div class="w-12 h-12 bg-[#4A6B3D] text-[#F7F1E1] rounded-full flex items-center justify-center mx-auto text-xl shadow">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <h3 class="font-bold text-lg text-[#4A6B3D]">Pesanan Tersimpan di Sistem!</h3>
                    <p class="text-sm font-light leading-relaxed max-w-md mx-auto">
                        Pesanan Anda berhasil tercatat di database kami. Silakan klik tombol hijau di bawah ini untuk mengirim detail pesanan langsung ke nomor WhatsApp pengelola.
                    </p>
                    <a href="{{ session('whatsapp_url') }}" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 bg-[#25D366] hover:bg-[#128C7E] text-white font-bold uppercase tracking-wider rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                        <i class="fa-brands fa-whatsapp text-xl"></i> Kirim WhatsApp Sekarang
                    </a>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Column: Map & Info -->
            <div class="lg:col-span-6 space-y-8">
                
                <!-- Contact info cards -->
                <div class="bg-[#FAF7EE] p-8 rounded-xl border border-[#6F4520]/10 shadow-sm space-y-6">
                    <h3 class="font-serif-display text-xl font-bold text-[#6F4520]">Informasi Kontak</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-[#4A6B3D]/10 text-[#4A6B3D] flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <span class="block text-xs uppercase font-bold tracking-wider text-[#756C5C]">Alamat</span>
                                <span class="text-sm text-[#36200F] font-light leading-relaxed">{{ $contact->address }}</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-[#4A6B3D]/10 text-[#4A6B3D] flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <span class="block text-xs uppercase font-bold tracking-wider text-[#756C5C]">Telepon</span>
                                <span class="text-sm text-[#36200F] font-semibold">{{ $contact->phone }}</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-[#4A6B3D]/10 text-[#4A6B3D] flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <span class="block text-xs uppercase font-bold tracking-wider text-[#756C5C]">Email</span>
                                <span class="text-sm text-[#36200F] font-light">{{ $contact->email }}</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-[#4A6B3D]/10 text-[#4A6B3D] flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div>
                                <span class="block text-xs uppercase font-bold tracking-wider text-[#756C5C]">Jam Operasional</span>
                                <span class="text-sm text-[#36200F] font-light">{{ $contact->operating_hours }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leaflet Map Container -->
                <div class="space-y-3">
                    <span class="block text-xs uppercase font-bold tracking-widest text-[#4A6B3D] text-center lg:text-left">Lokasi Kami</span>
                    <div id="map"></div>
                </div>

            </div>

            <!-- Right Column: Booking/Order Form -->
            <div class="lg:col-span-6">
                <div class="bg-[#FAF7EE] p-8 md:p-10 rounded-xl border border-[#6F4520]/15 shadow-md space-y-6">
                    <div class="space-y-2 text-center md:text-left">
                        <h3 class="font-serif-display text-2xl font-bold text-[#6F4520]">Formulir Pemesanan</h3>
                        <p class="text-xs text-[#756C5C] font-light leading-relaxed">Isi formulir berikut untuk memesan produk. Kami akan merekam data Anda dan mempersiapkan pesanan sebelum Anda mengirimkannya ke WhatsApp kami.</p>
                    </div>

                    <form method="POST" action="{{ route('contact.order.store') }}" class="space-y-5">
                        @csrf
                        
                        <!-- Customer Name -->
                        <div class="space-y-1">
                            <label for="customer_name" class="text-[11px] font-bold uppercase tracking-wider text-[#6F4520]">Nama Lengkap</label>
                            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" placeholder="Masukkan nama lengkap Anda" required class="w-full text-sm p-3 rounded-lg border border-[#6F4520]/25 bg-white focus:outline-none focus:border-[#4A6B3D] text-[#36200F]">
                            @error('customer_name')
                                <span class="text-xs text-red-600 block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="space-y-1">
                            <label for="phone" class="text-[11px] font-bold uppercase tracking-wider text-[#6F4520]">No. HP / WhatsApp</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Contoh: 08123456789" required class="w-full text-sm p-3 rounded-lg border border-[#6F4520]/25 bg-white focus:outline-none focus:border-[#4A6B3D] text-[#36200F]">
                            @error('phone')
                                <span class="text-xs text-red-600 block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Product selection -->
                        <div class="space-y-1">
                            <label for="product_id" class="text-[11px] font-bold uppercase tracking-wider text-[#6F4520]">Pilih Produk</label>
                            <select name="product_id" id="product_id" required class="w-full text-sm p-3 rounded-lg border border-[#6F4520]/25 bg-white focus:outline-none focus:border-[#4A6B3D] text-[#36200F]">
                                <option value="" disabled selected>-- Pilih Produk --</option>
                                @foreach($products as $prod)
                                    <option value="{{ $prod->id }}" {{ old('product_id') == $prod->id ? 'selected' : '' }}>
                                        {{ $prod->name }} - Rp {{ number_format($prod->price, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <span class="text-xs text-red-600 block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="space-y-1">
                            <label for="quantity" class="text-[11px] font-bold uppercase tracking-wider text-[#6F4520]">Jumlah Pembelian (pcs)</label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', 1) }}" min="1" required class="w-full text-sm p-3 rounded-lg border border-[#6F4520]/25 bg-white focus:outline-none focus:border-[#4A6B3D] text-[#36200F]">
                            @error('quantity')
                                <span class="text-xs text-red-600 block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Note -->
                        <div class="space-y-1">
                            <label for="note" class="text-[11px] font-bold uppercase tracking-wider text-[#6F4520]">Catatan Tambahan</label>
                            <textarea name="note" id="note" rows="3" placeholder="Tulis alamat kirim atau detail pemesanan khusus jika ada" class="w-full text-sm p-3 rounded-lg border border-[#6F4520]/25 bg-white focus:outline-none focus:border-[#4A6B3D] text-[#36200F]">{{ old('note') }}</textarea>
                            @error('note')
                                <span class="text-xs text-red-600 block mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="w-full py-4 bg-[#6F4520] hover:bg-[#8B5A2B] text-[#F7F1E1] font-bold text-xs uppercase tracking-wider rounded-lg shadow-md transition-colors">
                            <i class="fa-solid fa-basket-shopping"></i> Proses & Pesan Sekarang
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Leaflet Map
        var lat = {{ $contact->map_lat ?? -7.1189 }};
        var lng = {{ $contact->map_lng ?? 110.3168 }};
        
        var map = L.map('map').setView([lat, lng], 15);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        L.marker([lat, lng]).addTo(map)
            .bindPopup('<b>Gula Aren Gonoharjo</b><br>{{ $contact->address }}')
            .openPopup();
    });
</script>
@endsection

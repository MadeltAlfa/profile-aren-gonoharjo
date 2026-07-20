<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Gula Aren Gonoharjo') - Cita Rasa Alami Lereng Ungaran</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,700;1,600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Leaflet.js for open maps (only loaded if necessary, or loaded globally for ease) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom styling utilities for colors -->
    <style>
        :root {
            --c-cream: #F7F1E1;
            --c-cream-light: #FAF7EE;
            --c-brown-dark: #422812;
            --c-brown: #6F4520;
            --c-brown-light: #8B5A2B;
            --c-brown-soft: #D0A97A;
            --c-green: #4A6B3D;
            --c-green-light: #5C7A4A;
            --c-green-pale: #EAEFE6;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--c-cream);
            color: var(--c-brown-dark);
        }

        .font-serif-display {
            font-family: 'Playfair Display', serif;
        }

        .font-sans-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Responsive menu animations */
        .mobile-nav-active {
            transform: translateX(0);
        }
    </style>
    @yield('styles')
</head>
<body class="min-h-screen flex flex-col antialiased">
    
    <!-- Header / Navigation -->
    <header class="sticky top-0 z-40 bg-[#F7F1E1]/90 backdrop-blur-md border-b border-[#6F4520]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-[#4A6B3D] text-[#F7F1E1] rounded-full flex items-center justify-center shadow-md group-hover:scale-105 transition-transform duration-300">
                        <i class="fa-solid fa-leaf text-xl"></i>
                    </div>
                    <div>
                        <span class="block font-sans-display font-bold text-lg tracking-wider text-[#6F4520] leading-none">AREN</span>
                        <span class="block text-[#4A6B3D] text-xs font-semibold uppercase tracking-widest mt-0.5">Gonoharjo</span>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-semibold tracking-wide hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('home') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="text-sm font-semibold tracking-wide hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('about') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Tentang Kami</a>
                    <a href="{{ route('products') }}" class="text-sm font-semibold tracking-wide hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('products') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Katalog Produk</a>
                    <a href="{{ route('artisans') }}" class="text-sm font-semibold tracking-wide hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('artisans') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Kisah Pengrajin</a>
                    <a href="{{ route('group') }}" class="text-sm font-semibold tracking-wide hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('group') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Kelompok Usaha</a>
                    <a href="{{ route('contact') }}" class="text-sm font-semibold tracking-wide hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('contact') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Kontak & Pesan</a>
                </nav>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="{{ route('contact') }}#pesan" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#6F4520] hover:bg-[#8B5A2B] text-[#F7F1E1] text-xs font-bold uppercase tracking-wider rounded-lg shadow transition-colors duration-300">
                        <i class="fa-solid fa-cart-shopping"></i> Pesan Sekarang
                    </a>
                </div>

                <!-- Hamburger Button (Mobile) -->
                <button id="mobile-menu-btn" class="md:hidden p-2 text-[#6F4520] hover:text-[#4A6B3D] focus:outline-none" aria-label="Toggle Menu">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>

            </div>
        </div>
    </header>

    <!-- Mobile Nav Drawer -->
    <div id="mobile-nav" class="fixed inset-0 z-50 overflow-hidden pointer-events-none transition-opacity duration-300 opacity-0" aria-modal="true" role="dialog">
        <!-- Backdrop -->
        <div id="mobile-nav-backdrop" class="absolute inset-0 bg-black/40 transition-opacity duration-300 opacity-0"></div>

        <div class="absolute inset-y-0 right-0 max-w-xs w-full bg-[#F7F1E1] shadow-xl flex flex-col pointer-events-auto transform translate-x-full transition-transform duration-300 ease-in-out" id="mobile-nav-panel">
            <div class="flex items-center justify-between px-6 h-20 border-b border-[#6F4520]/10">
                <span class="font-sans-display font-bold text-lg text-[#6F4520]">MENU</span>
                <button id="mobile-menu-close" class="p-2 text-[#6F4520] hover:text-[#4A6B3D] focus:outline-none">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>
            
            <nav class="flex-1 px-6 py-8 flex flex-col gap-6">
                <a href="{{ route('home') }}" class="text-lg font-bold hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('home') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Beranda</a>
                <a href="{{ route('about') }}" class="text-lg font-bold hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('about') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Tentang Kami</a>
                <a href="{{ route('products') }}" class="text-lg font-bold hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('products') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Katalog Produk</a>
                <a href="{{ route('artisans') }}" class="text-lg font-bold hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('artisans') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Kisah Pengrajin</a>
                <a href="{{ route('group') }}" class="text-lg font-bold hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('group') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Kelompok Usaha</a>
                <a href="{{ route('contact') }}" class="text-lg font-bold hover:text-[#4A6B3D] transition-colors duration-250 {{ request()->routeIs('contact') ? 'text-[#4A6B3D]' : 'text-[#6F4520]' }}">Kontak & Pesan</a>
                
                <div class="mt-8 pt-8 border-t border-[#6F4520]/10">
                    <a href="{{ route('contact') }}#pesan" class="w-full flex items-center justify-center gap-2 py-3 bg-[#6F4520] hover:bg-[#8B5A2B] text-[#F7F1E1] font-bold rounded-lg shadow transition-colors duration-300">
                        <i class="fa-solid fa-cart-shopping"></i> Pesan Sekarang
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#422812] text-[#F7F1E1] border-t-4 border-[#4A6B3D] pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                
                <!-- Info Kolom -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#4A6B3D] text-[#F7F1E1] rounded-full flex items-center justify-center shadow-md">
                            <i class="fa-solid fa-leaf text-lg"></i>
                        </div>
                        <span class="font-sans-display font-bold text-lg tracking-wider text-[#F7F1E1]">AREN GONOHARJO</span>
                    </div>
                    <p class="text-sm text-[#F7F1E1]/85 leading-relaxed font-light">
                        Membawa kebaikan rasa manis alami langsung dari lereng Gunung Ungaran, Kendal, Jawa Tengah. Kami melestarikan nira murni secara tradisional.
                    </p>
                </div>

                <!-- Link Cepat -->
                <div>
                    <h3 class="font-sans-display font-bold text-sm tracking-wider uppercase mb-6 text-[#D0A97A]">Tautan Cepat</h3>
                    <ul class="space-y-3 text-sm text-[#F7F1E1]/85 font-light">
                        <li><a href="{{ route('home') }}" class="hover:text-[#D0A97A] transition-colors">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#D0A97A] transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('products') }}" class="hover:text-[#D0A97A] transition-colors">Katalog Produk</a></li>
                        <li><a href="{{ route('artisans') }}" class="hover:text-[#D0A97A] transition-colors">Kisah Pengrajin</a></li>
                    </ul>
                </div>

                <!-- Kelompok Usaha & Kontak -->
                <div>
                    <h3 class="font-sans-display font-bold text-sm tracking-wider uppercase mb-6 text-[#D0A97A]">Info Kontak</h3>
                    <ul class="space-y-3 text-sm text-[#F7F1E1]/85 font-light">
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-location-dot mt-1 text-[#D0A97A]"></i>
                            <span>Desa Gonoharjo, Limbangan, Kab. Kendal, Jawa Tengah</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-phone text-[#D0A97A]"></i>
                            <span>0812-3456-7890</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-envelope text-[#D0A97A]"></i>
                            <span>aren@gonoharjo.desa.id</span>
                        </li>
                    </ul>
                </div>

                <!-- Admin Link -->
                <div>
                    <h3 class="font-sans-display font-bold text-sm tracking-wider uppercase mb-6 text-[#D0A97A]">Kemitraan & Admin</h3>
                    <p class="text-xs text-[#F7F1E1]/70 leading-relaxed mb-4">
                        Akses khusus pengelola kelompok untuk memperbarui katalog produk, profil pengrajin, dan data pesanan.
                    </p>
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-[#D0A97A] hover:bg-[#D0A97A] hover:text-[#422812] text-xs font-semibold tracking-wider uppercase rounded transition-all duration-300">
                        <i class="fa-solid fa-lock"></i> Portal Admin
                    </a>
                </div>

            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-[#F7F1E1]/10 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-[#F7F1E1]/60 font-light gap-4">
                <p>&copy; {{ date('Y') }} Gula Aren Gonoharjo. All Rights Reserved. Kelompok Tani Lestari.</p>
                <p class="flex items-center gap-1">
                    Dibuat dengan <i class="fa-solid fa-heart text-red-500"></i> untuk UMKM Indonesia
                </p>
            </div>
        </div>
    </footer>

    <!-- Mobile Drawer JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openBtn = document.getElementById('mobile-menu-btn');
            const closeBtn = document.getElementById('mobile-menu-close');
            const nav = document.getElementById('mobile-nav');
            const backdrop = document.getElementById('mobile-nav-backdrop');
            const panel = document.getElementById('mobile-nav-panel');

            function openNav() {
                nav.classList.remove('pointer-events-none');
                nav.classList.add('opacity-100');
                backdrop.classList.add('opacity-100');
                panel.classList.remove('translate-x-full');
            }

            function closeNav() {
                nav.classList.add('pointer-events-none');
                nav.classList.remove('opacity-100');
                backdrop.classList.remove('opacity-100');
                panel.classList.add('translate-x-full');
            }

            openBtn.addEventListener('click', openNav);
            closeBtn.addEventListener('click', closeNav);
            backdrop.addEventListener('click', closeNav);
        });
    </script>
    @yield('scripts')
</body>
</html>

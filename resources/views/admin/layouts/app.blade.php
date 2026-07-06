<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/auth.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Overlay for mobile sidebar -->
    <div id="mobile-overlay" class="mobile-overlay"></div>

    <div id="admin-screen" class="screen visible" style="display: flex;">
        <!-- Mobile Topbar (visible only on small screens) -->
        <div class="mobile-topbar">
            <div style="font-family: var(--f-display); font-weight: 700; font-size: 16px; letter-spacing: 2px; color: var(--on-ink);">
                AREN <span style="font-size: 10px; color: var(--on-ink-mut); letter-spacing: .5px; text-transform: uppercase;">Gonoharjo</span>
            </div>
            <button id="hamburger-btn" style="background: none; border: none; color: var(--brass-lt); font-size: 20px; cursor: pointer; padding: 4px;">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        @include('admin.components.sidebar')
        
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Script to toggle mobile sidebar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('hamburger-btn');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('mobile-overlay');

            if(btn && sidebar && overlay) {
                btn.addEventListener('click', () => {
                    sidebar.classList.add('open');
                    overlay.classList.add('show');
                });
                overlay.addEventListener('click', () => {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('show');
                });
            }
        });
    </script>
</body>
</html>

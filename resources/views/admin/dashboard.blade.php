@extends('admin.layouts.app')

@section('content')
    <style>
        @keyframes slideUpCard {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .anim-slide-up {
            animation: slideUpCard 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        .delay-1 { animation-delay: 0.05s; }
        .delay-2 { animation-delay: 0.15s; }
        .delay-3 { animation-delay: 0.25s; }
    </style>
    <div class="pg-header">
        <h1 class="pg-title">Dashboard Admin</h1>
        <div class="pg-sub">Ringkasan sistem dan status terkini</div>
    </div>

    <!-- Status Hero -->
    <div class="status-hero anim-slide-up delay-1" id="status-hero">
      <div class="status-label">Status Akun</div>
      <div class="status-word s-aman" id="status-word">LOGGED IN</div>
      <div class="status-desc" id="status-desc">Selamat datang, {{ Auth::user()->name }}. Anda berhasil masuk ke dalam sistem.</div>
      <div class="status-pill">
        <span><i class="fa-regular fa-clock"></i></span>
        <span id="last-fill">Sistem Manajemen Aktif</span>
      </div>
    </div>

    <!-- Dashboard Content Placeholder (based on the reference) -->
    <div class="mon-grid2">
        <div class="glass-card anim-slide-up delay-2">
          <div class="gc-title"><span class="gc-title-icon"><i class="fa-solid fa-user"></i></span>Profil Pengguna</div>
          <div style="font-size: 14px; margin-bottom: 10px; font-family: var(--f-body);"><strong>Nama:</strong> {{ Auth::user()->name }}</div>
          <div style="font-size: 14px; margin-bottom: 10px; font-family: var(--f-body);"><strong>Email:</strong> {{ Auth::user()->email }}</div>
          
          <a href="{{ route('profile.edit') }}" style="display:inline-block; padding:8px 16px; background:var(--ink); color:var(--brass-lt); border-radius:4px; font-size:12px; font-weight:bold; text-decoration:none; margin-top:10px; font-family: var(--f-mono); text-transform: uppercase;"><i class="fa-solid fa-user-pen"></i> Edit Profil</a>
        </div>
        
        <div class="glass-card anim-slide-up delay-3">
          <div class="gc-title"><span class="gc-title-icon"><i class="fa-solid fa-circle-info"></i></span>Informasi Sistem</div>
          <p style="font-size: 14px; line-height: 1.6; font-family: var(--f-body);">Ini adalah dashboard admin untuk mengelola konten website profil Gula Aren Gonoharjo.</p>
        </div>
    </div>
@endsection

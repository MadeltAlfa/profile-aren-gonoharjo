@extends('layouts.app')

@section('content')
<div id="monitor-screen" class="screen visible">
  <!-- Header -->
  <div class="monitor-header">
    <div class="mh-brand">
      <div class="brand-icon"><i class="fa-solid fa-seedling"></i></div>
      <div>
        <div class="brand-name">AREN GONOHARJO</div>
        <div class="brand-sub">Admin Panel</div>
      </div>
    </div>
    <div class="mh-right">
      <div class="conn-pill">
        <div class="conn-dot"></div>{{ Auth::user()->name }}
      </div>
      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
          @csrf
          <button type="submit" class="mon-logout-btn" style="cursor: pointer;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</button>
      </form>
    </div>
  </div>

  <div class="monitor-body">
    <!-- Status Hero -->
    <div class="status-hero" id="status-hero">
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
        <div class="glass-card">
          <div class="gc-title"><span class="gc-title-icon"><i class="fa-solid fa-user"></i></span>Profil Pengguna</div>
          <div style="font-size: 14px; margin-bottom: 10px; font-family: var(--f-body);"><strong>Nama:</strong> {{ Auth::user()->name }}</div>
          <div style="font-size: 14px; margin-bottom: 10px; font-family: var(--f-body);"><strong>Email:</strong> {{ Auth::user()->email }}</div>
          
          <a href="{{ route('profile.edit') }}" style="display:inline-block; padding:8px 16px; background:var(--ink); color:var(--brass-lt); border-radius:4px; font-size:12px; font-weight:bold; text-decoration:none; margin-top:10px; font-family: var(--f-mono); text-transform: uppercase;"><i class="fa-solid fa-user-pen"></i> Edit Profil</a>
        </div>
        
        <div class="glass-card">
          <div class="gc-title"><span class="gc-title-icon"><i class="fa-solid fa-circle-info"></i></span>Informasi Sistem</div>
          <p style="font-size: 14px; line-height: 1.6; font-family: var(--f-body);">Ini adalah dashboard admin untuk mengelola konten website profil Gula Aren Gonoharjo.</p>
        </div>
    </div>
  </div>
</div>
@endsection

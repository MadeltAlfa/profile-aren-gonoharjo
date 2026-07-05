@extends('layouts.guest')

@section('content')
<div id="login-screen" class="screen visible">
  <div class="login-box">
    <span class="plaque-bolt tl"></span>
    <span class="plaque-bolt tr"></span>
    <span class="plaque-bolt bl"></span>
    <span class="plaque-bolt br"></span>

    <div class="login-logo">
      <div class="logo-wrap"><i class="fa-solid fa-seedling"></i></div>
      <h1>Daftar Akun</h1>
      <p>GULA AREN GONOHARJO<br>Panel Administrasi Website Profil</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="form-group">
        <label for="name">Nama</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-user"></i></span>
          <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required autofocus autocomplete="name">
        </div>
        @error('name')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autocomplete="username">
        </div>
        @error('email')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="new-password">
        </div>
        @error('password')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required autocomplete="new-password">
        </div>
        @error('password_confirmation')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="login-btn"><i class="fa-solid fa-user-plus"></i> Daftar</button>

      <div style="text-align: center; margin-top: 15px; font-size: 11px; font-family: var(--f-mono);">
          <a href="{{ route('login') }}" style="color: var(--brass-dk); text-decoration: none;">Sudah punya akun? Masuk</a>
      </div>
    </form>
  </div>
</div>
@endsection

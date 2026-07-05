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
      <h1>AREN GONOHARJO</h1>
      <p>GULA AREN GONOHARJO<br>Panel Administrasi Website Profil</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="login-hint" style="margin-bottom: 20px; text-align: center; color: var(--ok);">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus autocomplete="username">
        </div>
        @error('email')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="current-password">
        </div>
        @error('password')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
        <label style="display: flex; align-items: center; font-size: 11px; color: var(--muted); font-family: var(--f-mono);">
            <input type="checkbox" name="remember" style="margin-right: 8px;"> Ingat Saya
        </label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="font-size: 11px; color: var(--brass-dk); text-decoration: none; font-family: var(--f-mono);">Lupa Password?</a>
        @endif
      </div>

      <button type="submit" class="login-btn"><i class="fa-solid fa-power-off"></i> Masuk ke Sistem</button>

      <div style="text-align: center; margin-top: 15px; font-size: 11px; font-family: var(--f-mono);">
          <a href="{{ route('register') }}" style="color: var(--brass-dk); text-decoration: none;">Belum punya akun? Daftar di sini</a>
      </div>
    </form>
  </div>
</div>
@endsection

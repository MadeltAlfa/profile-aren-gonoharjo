@extends('layouts.guest')

@section('content')
<div id="login-screen" class="screen visible">
  <div class="login-box">
    <span class="plaque-bolt tl"></span>
    <span class="plaque-bolt tr"></span>
    <span class="plaque-bolt bl"></span>
    <span class="plaque-bolt br"></span>

    <div class="login-logo">
      <div class="logo-wrap"><i class="fa-solid fa-key"></i></div>
      <h1>Lupa Password</h1>
      <p style="text-align:left; margin-top:10px;">Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi melalui email.</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="login-hint" style="margin-bottom: 20px; text-align: center; color: var(--ok);">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>
        </div>
        @error('email')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="login-btn"><i class="fa-solid fa-paper-plane"></i> Kirim Tautan</button>

      <div style="text-align: center; margin-top: 15px; font-size: 11px; font-family: var(--f-mono);">
          <a href="{{ route('login') }}" style="color: var(--brass-dk); text-decoration: none;">Kembali ke Halaman Login</a>
      </div>
    </form>
  </div>
</div>
@endsection

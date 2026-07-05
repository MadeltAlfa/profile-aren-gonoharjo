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
      <h1>Reset Password</h1>
      <p style="text-align:left; margin-top:10px;">Silakan masukkan password baru Anda.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
      @csrf

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <div class="form-group">
        <label for="email">Email</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-envelope"></i></span>
          <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
        </div>
        @error('email')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password Baru</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" id="password" name="password" required autocomplete="new-password">
        </div>
        @error('password')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password Baru</label>
        <div class="input-wrap">
          <span class="inp-icon"><i class="fa-solid fa-lock"></i></span>
          <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
        </div>
        @error('password_confirmation')
          <div class="login-error" style="display:block;">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="login-btn"><i class="fa-solid fa-save"></i> Reset Password</button>
    </form>
  </div>
</div>
@endsection

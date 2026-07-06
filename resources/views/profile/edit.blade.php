@extends('admin.layouts.app')

@section('content')
    <div class="pg-header">
        <h1 class="pg-title">Edit Profil</h1>
        <div class="pg-sub">Perbarui informasi akun dan kata sandi Anda</div>
    </div>

    <div style="display:flex; flex-direction:column; gap:24px;">
        <!-- Update Profile Information -->
        <div class="form-card">
            <h2 class="sec-title" style="margin-bottom: 5px;">Informasi Profil</h2>
            <p style="font-size: 12.5px; color: var(--muted); margin-bottom: 24px;">Perbarui nama akun dan alamat email Anda.</p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="a-form-row">
                    <label for="name" class="a-form-lbl">Nama</label>
                    <input id="name" name="name" type="text" class="a-form-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" style="color: var(--danger); font-size: 12px; margin-top: 5px;" />
                </div>

                <div class="a-form-row">
                    <label for="email" class="a-form-lbl">Email</label>
                    <input id="email" name="email" type="email" class="a-form-input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" style="color: var(--danger); font-size: 12px; margin-top: 5px;" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div style="margin-top: 10px;">
                            <p style="font-size: 12.5px; color: var(--ink-text);">
                                Email Anda belum diverifikasi.
                                <button form="send-verification" style="background: none; border: none; padding: 0; color: var(--water-dk); text-decoration: underline; cursor: pointer; font-size: 12.5px;">
                                    Klik di sini untuk mengirim ulang email verifikasi.
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p style="font-size: 12.5px; color: var(--ok); font-weight: 500; margin-top: 5px;">Tautan verifikasi baru telah dikirim ke alamat email Anda.</p>
                            @endif
                        </div>
                    @endif
                </div>

                <div style="display:flex; align-items:center; gap:16px;">
                    <button type="submit" class="a-save-btn" style="width: auto; padding: 12px 24px;">Simpan Perubahan</button>
                    @if (session('status') === 'profile-updated')
                        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" style="font-size: 12px; color: var(--ok); font-weight: 600;">Tersimpan.</span>
                    @endif
                </div>
            </form>
        </div>

        <!-- Update Password -->
        <div class="form-card">
            <h2 class="sec-title" style="margin-bottom: 5px;">Perbarui Kata Sandi</h2>
            <p style="font-size: 12.5px; color: var(--muted); margin-bottom: 24px;">Pastikan akun Anda menggunakan kata sandi acak yang panjang agar tetap aman.</p>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="a-form-row">
                    <label for="update_password_current_password" class="a-form-lbl">Kata Sandi Saat Ini</label>
                    <input id="update_password_current_password" name="current_password" type="password" class="a-form-input" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" style="color: var(--danger); font-size: 12px; margin-top: 5px;" />
                </div>

                <div class="a-form-row">
                    <label for="update_password_password" class="a-form-lbl">Kata Sandi Baru</label>
                    <input id="update_password_password" name="password" type="password" class="a-form-input" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" style="color: var(--danger); font-size: 12px; margin-top: 5px;" />
                </div>

                <div class="a-form-row">
                    <label for="update_password_password_confirmation" class="a-form-lbl">Konfirmasi Kata Sandi</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="a-form-input" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" style="color: var(--danger); font-size: 12px; margin-top: 5px;" />
                </div>

                <div style="display:flex; align-items:center; gap:16px;">
                    <button type="submit" class="a-save-btn" style="width: auto; padding: 12px 24px;">Simpan Perubahan</button>
                    @if (session('status') === 'password-updated')
                        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" style="font-size: 12px; color: var(--ok); font-weight: 600;">Tersimpan.</span>
                    @endif
                </div>
            </form>
        </div>

        <!-- Delete Account -->
        <div class="form-card" style="border-color: rgba(166,57,45,.4);">
            <h2 class="sec-title" style="margin-bottom: 5px; color: var(--danger);">Hapus Akun</h2>
            <p style="font-size: 12.5px; color: var(--muted); margin-bottom: 24px;">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.</p>

            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="a-save-btn" style="background: var(--danger); color: #fff; border-color: var(--danger); width: auto; padding: 12px 24px;">Hapus Akun</button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900">Apakah Anda yakin ingin menghapus akun Anda?</h2>
                    <p class="mt-1 text-sm text-gray-600">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Harap masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.</p>

                    <div class="mt-6">
                        <label for="password" class="a-form-lbl sr-only">Kata Sandi</label>
                        <input id="password" name="password" type="password" class="a-form-input w-3/4" placeholder="Kata Sandi" />
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" style="color: var(--danger); font-size: 12px;" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="button" x-on:click="$dispatch('close')" class="ck-btn" style="margin-right: 12px;">Batal</button>
                        <button type="submit" class="ck-btn bad-active">Hapus Akun</button>
                    </div>
                </form>
            </x-modal>
        </div>
    </div>
@endsection

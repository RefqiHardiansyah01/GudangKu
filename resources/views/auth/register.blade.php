@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center fw-bold" style="border-radius: 12px 12px 0 0;">
                    📝 Daftar Akun Baru
                </div>

                <div class="card-body p-4">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- NAME --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autofocus
                                   placeholder="Masukkan nama Anda">

                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required
                                   placeholder="contoh@mail.com">

                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Kata Sandi</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required
                                   placeholder="Minimal 8 karakter">

                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- PASSWORD CONFIRM --}}
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">Konfirmasi Kata Sandi</label>
                            <input id="password-confirm" type="password"
                                   class="form-control" name="password_confirmation" required
                                   placeholder="Tulis ulang kata sandi">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            Daftar
                        </button>

                    </form>

                </div>

                <div class="card-footer bg-light text-center" style="border-radius: 0 0 12px 12px;">
                    <small class="text-muted">Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-primary fw-semibold">Masuk</a>
                    </small>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

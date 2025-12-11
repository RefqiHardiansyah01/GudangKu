@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center fw-bold" style="border-radius: 12px 12px 0 0;">
                    🔐 Masuk ke GudangKu
                </div>

                <div class="card-body p-4">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Alamat Email</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="Masukkan email Anda">

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
                                   placeholder="Masukkan kata sandi">

                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- BUTTON --}}
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            Masuk
                        </button>

                    </form>

                </div>

                <div class="card-footer bg-light text-center" style="border-radius: 0 0 12px 12px;">
                    <small class="text-muted">Belum punya akun?
                        <a href="{{ route('register') }}" class="text-primary fw-semibold">Daftar</a>
                    </small>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', isset($barang) ? 'Edit Barang' : 'Tambah Barang')

@section('content')
<div class="container py-4">

    {{-- TOMBOL KEMBALI --}}
    <div class="mb-3">
        <a href="javascript:history.back()" 
        class="btn btn-light d-inline-flex align-items-center gap-2 px-4 py-2 fw-semibold shadow-sm tombol-kembali">
            <i class="bi bi-arrow-left"><- Kembali</i>
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0 rounded-4">

                {{-- HEADER --}}
                <div class="card-header text-white rounded-top-4"
                    style="background: linear-gradient(135deg, #0d6efd, #2563eb);">
                    <h4 class="mb-0 fw-semibold">
                        {{ isset($barang) ? 'Edit Barang' : 'Tambah Barang' }}
                    </h4>
                </div>

                <div class="card-body p-4">

                    <form 
                        action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}"
                        method="POST">

                        @csrf
                        @if(isset($barang))
                            @method('PUT')
                        @endif

                        {{-- NAMA --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Barang</label>
                            <input 
                                type="text"
                                name="nama"
                                class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $barang->nama ?? '') }}"
                                placeholder="Masukkan nama barang"
                                style="border-radius: 12px">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- STOK --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Stok</label>
                            <input 
                                type="number"
                                name="stok"
                                class="form-control form-control-lg @error('stok') is-invalid @enderror"
                                value="{{ old('stok', $barang->stok ?? 0) }}"
                                placeholder="Masukkan jumlah stok"
                                style="border-radius: 12px">
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <input 
                                type="text"
                                name="deskripsi"
                                class="form-control form-control-lg @error('deskripsi') is-invalid @enderror"
                                value="{{ old('deskripsi', $barang->deskripsi ?? '') }}"
                                placeholder="Masukkan deskripsi (opsional)"
                                style="border-radius: 12px">
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- BUTTON --}}
                        <button 
                            class="btn btn-primary w-100 py-2 fs-5 mt-3"
                            style="border-radius: 14px; background: linear-gradient(135deg,#0d6efd,#2563eb);">
                            Simpan
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- STYLE TAMBAHAN --}}
<style>
    input.form-control {
        transition: 0.2s ease;
    }
    input.form-control:focus {
        border-color: #4b8bfd !important;
        box-shadow: 0 0 6px rgba(59,130,246,0.4) !important;
    }

        .tombol-kembali {
        border-radius: 12px;
        background: linear-gradient(135deg, #dbeafe, #f3e8ff);
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(6px);
        color: #1e3a8a;
        padding: 8px 14px;
        transition: all 0.25s ease;
    }

    .tombol-kembali:hover {
        background: linear-gradient(135deg, #bfdbfe, #e9d5ff);
        transform: translateY(-3px);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.18);
    }

    .tombol-kembali i {
        font-size: 1.2rem;
        margin-right: 4px;
    }
</style>
@endsection

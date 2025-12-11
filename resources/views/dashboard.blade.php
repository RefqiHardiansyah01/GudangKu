@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container">

    {{-- GREETING CARD --}}
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white rounded-top">
                    <h5 class="mb-0 fw-bold">👋 Hallo, Selamat Datang!</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <p class="text-secondary mb-0 fs-6">
                        Di website <strong>GudangKu</strong>, Anda dapat dengan mudah mencatat, memantau,
                        dan mengelola data barang pribadi Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4">
            <div class="card stat-card shadow-sm text-center p-3">
                <h6 class="text-primary fw-bold m-0">Total Barang Dalam Gudang</h6>
                <h2 class="fw-bold mt-2">{{ $totalBarang }}</h2>
            </div>
        </div>
    </div>

    {{-- DATA BARANG --}}
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">📦 Daftar Barang</h5>
            <a href="{{ route('barang.create') }}" class="btn btn-primary shadow-sm px-3">
                + Tambah Barang
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Masuk</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($barangs->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <div class="py-3">
                                        <div class="fs-1">📭</div>
                                        <div class="fw-bold mt-2">Belum Ada Barang</div>
                                        <small>Silakan tambahkan barang baru terlebih dahulu.</small>

                                        <div class="mt-3">
                                            <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                                                + Tambah Barang
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach($barangs as $b)
                            <tr>
                                <td class="fw-semibold">{{ $b->nama }}</td>
                                <td>{{ $b->stok }}</td>
                                <td>{{ $b->deskripsi ?? 'Tidak ada' }}</td>
                                <td>{{ $b->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm px-3">Edit</a>

                                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm px-3"
                                                onclick="return confirm('Hapus barang?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-3">
            {{ $barangs->links() }}
        </div>
    </div>

</div>
@endsection

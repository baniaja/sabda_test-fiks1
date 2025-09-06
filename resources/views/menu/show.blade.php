@extends('layouts.app')

@section('title', 'Detail Menu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4><i class="bi bi-eye me-2"></i>Detail Menu</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">ID Menu</h6>
                        <p class="fs-5">{{ $menu->id }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Nama Menu</h6>
                        <p class="fs-5">{{ $menu->nama_makanan }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Kategori</h6>
                        <p>
                            <span class="badge bg-{{ $menu->kategori == 'makanan' ? 'success' : 'info' }} fs-6">
                                {{ ucfirst($menu->kategori) }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Harga</h6>
                        <p class="fs-5 text-success">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted">Deskripsi</h6>
                        <p>{{ $menu->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Stok</h6>
                        <p class="fs-6">{{ $menu->stok }}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Gambar</h6>
                    @if($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_makanan }}" class="img-fluid rounded">
                    @else
                        <p>Tidak ada gambar tersedia.</p>
                    @endif
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('menu.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar Menu
                    </a>
                    <div>
                        <a href="{{ route('menu.edit', $menu) }}" class="btn btn-warning me-2">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                <i class="bi bi-trash me-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

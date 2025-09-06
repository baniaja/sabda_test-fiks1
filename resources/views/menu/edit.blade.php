@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4><i class="bi bi-pencil me-2"></i>Edit Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('menu.update', $menu) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_makanan" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control @error('nama_makanan') is-invalid @enderror"
                               id="nama_makanan" name="nama_makanan" value="{{ old('nama_makanan', $menu->nama_makanan) }}" required>
                        @error('nama_makanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="makanan" {{ old('kategori', $menu->kategori) == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ old('kategori', $menu->kategori) == 'minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="dessert" {{ old('kategori', $menu->kategori) == 'dessert' ? 'selected' : '' }}>Dessert</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                               id="harga" name="harga" value="{{ old('harga', $menu->harga) }}" min="0" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                  id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar (opsional)</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                               id="gambar" name="gambar" accept="image/*">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror"
                               id="stok" name="stok" value="{{ old('stok', $menu->stok) }}" min="0" required>
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ old('status', $menu->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Aktif</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('menu.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-circle me-1"></i>Perbarui Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

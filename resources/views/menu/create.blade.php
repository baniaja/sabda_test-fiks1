@extends('layouts.app')

@section('title', 'Tambah Menu Baru')

@section('content')
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4><i class="bi bi-plus-circle me-2"></i>Tambah Menu Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_makanan" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" value="{{ old('nama_makanan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="makanan" {{ old('kategori') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ old('kategori') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="dessert" {{ old('kategori') == 'dessert' ? 'selected' : '' }}>Dessert</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar (opsional)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', 0) }}" min="0" required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Aktif</label>
                    </div>

                    <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Simpan</button>
                    <a href="{{ route('menu.index') }}" class="btn btn-secondary ms-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

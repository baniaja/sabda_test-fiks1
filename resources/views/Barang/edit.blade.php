@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4">Edit Barang</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode_supplier" class="form-label">Kode Supplier</label>
                    <input type="text" name="kode_supplier" id="kode_supplier" class="form-control"
                        value="{{ old('kode_supplier', $barang->kode_supplier) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="nama_supplier" class="form-control"
                        value="{{ old('nama_supplier', $barang->nama_supplier) }}" required>
                </div>

                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" class="form-control"
                        value="{{ old('kode_barang', $barang->kode_barang) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                        value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" min="0"
                        value="{{ old('jumlah_barang', $barang->jumlah_barang) }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga_dasar" class="form-label">Harga Dasar</label>
                    <input type="number" step="0.01" name="harga_dasar" id="harga_dasar" class="form-control" min="0"
                        value="{{ old('harga_dasar', $barang->harga_dasar) }}" required>
                </div>

                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" step="0.01" name="harga_jual" id="harga_jual" class="form-control" min="0"
                        value="{{ old('harga_jual', $barang->harga_jual) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

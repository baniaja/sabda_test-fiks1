@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4">Form Input Barang</h3>

            <form action="{{ route('barang.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="kode_supplier" class="form-label">Kode Supplier</label>
                    <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" value="{{ old('kode_supplier') }}">
                    @error('kode_supplier')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ old('nama_supplier') }}">
                    @error('nama_supplier')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ old('kode_barang') }}">
                    @error('kode_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ old('jumlah_barang') }}">
                    @error('jumlah_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_dasar" class="form-label">Harga Dasar</label>
                    <input type="number" step="0.01" class="form-control" id="harga_dasar" name="harga_dasar" value="{{ old('harga_dasar') }}">
                    @error('harga_dasar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" step="0.01" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}">
                    @error('harga_jual')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

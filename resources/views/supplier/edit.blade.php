@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-pencil me-2"></i>Edit Supplier
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kode_supplier" class="form-label">
                                <i class="bi bi-tag me-1"></i>Kode Supplier
                            </label>
                            <input type="text" id="kode_supplier" name="kode_supplier" class="form-control @error('kode_supplier') is-invalid @enderror" value="{{ old('kode_supplier', $supplier->kode_supplier) }}" required>
                            @error('kode_supplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name_pt" class="form-label">
                                <i class="bi bi-building me-1"></i>Nama Perusahaan
                            </label>
                            <input type="text" id="name_pt" name="name_pt" class="form-control @error('name_pt') is-invalid @enderror" value="{{ old('name_pt', $supplier->name_pt) }}" required>
                            @error('name_pt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">
                                <i class="bi bi-geo-alt me-1"></i>Alamat
                            </label>
                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $supplier->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">
                                <i class="bi bi-telephone me-1"></i>Telepon
                            </label>
                            <input type="text" id="telepon" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $supplier->telepon) }}">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>Update
                            </button>
                            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

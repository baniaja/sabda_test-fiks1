@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-pencil me-2"></i>Edit Customer
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kode_customer" class="form-label">
                                    <i class="bi bi-tag me-1"></i>Kode Customer
                                </label>
                                <input type="text" class="form-control @error('kode_customer') is-invalid @enderror"
                                       id="kode_customer" name="kode_customer"
                                       value="{{ old('kode_customer', $customer->kode_customer) }}" required>
                                @error('kode_customer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nama_customer" class="form-label">
                                    <i class="bi bi-person me-1"></i>Nama Customer
                                </label>
                                <input type="text" class="form-control @error('nama_customer') is-invalid @enderror"
                                       id="nama_customer" name="nama_customer"
                                       value="{{ old('nama_customer', $customer->nama_customer) }}" required>
                                @error('nama_customer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">
                                <i class="bi bi-geo-alt me-1"></i>Alamat
                            </label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                   id="alamat" name="alamat"
                                   value="{{ old('alamat', $customer->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="telepon" class="form-label">
                                    <i class="bi bi-telephone me-1"></i>Telepon
                                </label>
                                <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                       id="telepon" name="telepon"
                                       value="{{ old('telepon', $customer->telepon) }}">
                                @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope me-1"></i>Email
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email"
                                       value="{{ old('email', $customer->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
                            </button>
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 0.5rem;
    }
    .card-header {
        border-bottom: 1px solid #dee2e6;
        padding: 1rem 1.25rem;
    }
    .form-label {
        font-weight: 500;
        color: #495057;
    }
    .btn {
        border-radius: 0.375rem;
        padding: 0.5rem 1rem;
    }
</style>
@endsection

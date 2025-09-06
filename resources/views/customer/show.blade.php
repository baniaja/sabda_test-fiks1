@extends('layouts.app')

@section('title', 'Detail Customer')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-person-circle me-2"></i>Detail Customer
                        </h5>
                        <div class="btn-group">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus customer ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="bi bi-tag me-1"></i>Kode Customer
                                </label>
                                <p class="form-control-plaintext fw-bold">{{ $customer->kode_customer }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="bi bi-person me-1"></i>Nama Customer
                                </label>
                                <p class="form-control-plaintext">{{ $customer->nama_customer }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="bi bi-telephone me-1"></i>Telepon
                                </label>
                                <p class="form-control-plaintext">{{ $customer->telepon ?? '-' }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted">
                                    <i class="bi bi-envelope me-1"></i>Email
                                </label>
                                <p class="form-control-plaintext">{{ $customer->email ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="bi bi-geo-alt me-1"></i>Alamat
                        </label>
                        <p class="form-control-plaintext">{{ $customer->alamat ?? '-' }}</p>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali ke Daftar
                        </a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-1"></i>Edit Data
                        </a>
                    </div>
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
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }
    .form-control-plaintext {
        padding: 0.375rem 0;
        font-size: 1rem;
        min-height: 2.5rem;
        border-bottom: 1px solid #f8f9fa;
    }
    .btn {
        border-radius: 0.375rem;
        padding: 0.5rem 1rem;
    }
    .btn-group .btn {
        border-radius: 0.375rem;
    }
</style>
@endsection

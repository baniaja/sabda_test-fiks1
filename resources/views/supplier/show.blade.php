@extends('layouts.app')

@section('title', 'Detail Supplier')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-truck me-2"></i>{{ $supplier->name_pt }}
                    </h5>
                    <p><strong>Kode Supplier:</strong> {{ $supplier->kode_supplier }}</p>
                    <p><strong>Alamat:</strong> {{ $supplier->alamat ?? '-' }}</p>
                    <p><strong>Telepon:</strong> {{ $supplier->telepon ?? '-' }}</p>
                </div>
            </div>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mt-3">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>
    </div>
</div>
@endsection
